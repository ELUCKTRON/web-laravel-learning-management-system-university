<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TaskController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subject $subject)
    {
        $this->authorize('access',$subject);

        return view('teacher.task.create',[
            "subject" => $subject,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request,Subject $subject)
    {
        $this->authorize('access',$subject);

        $subject->tasks()->create($request->validated());

        return redirect()->route("subjects.show",["subject"=>$subject]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('access', $task);

        $user = auth()->user();

        if ($user->role === 'teacher') {
            $solutions = $task->solutions()->with('user')->get();
            return view('general.task.details', [
                'task' => $task,
                'solutions' => $solutions
            ]);
        } else {
            $solution = $task->solutions()->where('user_id', $user->id)->first(); 
            return view('general.task.details', [
                'task' => $task,
                'solution' => $solution
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('access',$task);
        return view('teacher.task.edit',[
            "task" => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {

        $this->authorize('access',$task);

        $task->update($request->validated());
        return redirect()->route("subjects.show",["subject"=>$task->subject_id]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Task $task)
    {
        $this->authorize('access',$task);

        $subjectId = $task->subject_id;
        $task->delete();
        return redirect()->route("subjects.show",["subject"=> $subjectId]);
    }
}
