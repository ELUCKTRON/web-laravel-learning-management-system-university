<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use AuthorizesRequests;

    public function create(){
        $user = auth()->user();

        if($user->role === 'teacher'){
            return view('general.subject.create');
        }else{
            $subjects = Subject::all();
            return view('general.subject.create',["allSubjects"=>$subjects]);
        }

        ;
    }


    public function index() {

        $user = auth()->user();

        $subjects = [];
        if($user->role === 'teacher'){
            $subjects = $user->subjects;
        }else{
            $subjects = $user->enrolledSubjects;
        }

        return view('general.index', [
            'subjects' => $subjects,
        ]);
    }


    public function store(Request $request){

        $user = auth()->user();

        if($user->role === 'teacher'){
            $validatedData = $request->validate([
                'name' => 'required|string|min:3',
                'description' => 'nullable|string|max:400',
                'credit' => 'required|integer|between:1,5',
            ]);

             auth()->user()->subjects()->create($validatedData);
        }else{

            $validated = $request->validate([
                'subject_id' => 'required|exists:subjects,id',
            ]);

            $subjectId = $validated['subject_id'];

            if (!$user->enrolledSubjects->contains($subjectId)) {
                $user->enrolledSubjects()->attach($subjectId);
            }

        }

        return redirect()->route("subjects.index");
    }

    public function update(Request $request,Subject $subject){


        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string|max:400',
            'credit' => 'required|integer|between:1,5',
        ]);

        $this->authorize('access',$subject);
        // $subject = Subject::findOrFail($id);
        $subject->update($validatedData);
        return redirect()->route("subjects.show",["subject"=> $subject->id]);
    }

    public function destroy(Subject $subject)
    {
        $user = auth()->user();

        $this->authorize('access',$subject);

        if ($user->role === 'teacher') {
            $subject->delete();
        } else {
            $user->enrolledSubjects()->detach($subject->id);
        }

        return redirect()->route('subjects.index');
    }


    public function show(Subject $subject){

      //  $subject = Subject::findOrFail($id);


        $this->authorize('access',$subject);

        return view('general.subject.details',[
            "subject"=>$subject,
            "tasks"=>$subject->tasks,
        ]);
    }

    public function edit(Subject $subject){
        // $subject = Subject::findOrFail($id);
        $this->authorize('access',$subject);
        return view('teacher.subject.edit',["subject"=>$subject]);
    }



}
