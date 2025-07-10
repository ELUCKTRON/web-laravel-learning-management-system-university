<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Task;
use App\Models\Solution;
use App\Http\Requests\StoreSolutionRequest;
use App\Http\Requests\UpdateSolutionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SolutionController extends Controller
{
    use AuthorizesRequests;

    public function create(Subject $subject, Task $task)
    {
        $user = auth()->user();

        if ($user->role === 'student') {
            return view('student.solution.create', [
                'subject' => $subject,
                'task' => $task
            ]);
        }

        return redirect('/unauthorized');
    }

    public function store(StoreSolutionRequest $request, Subject $subject, Task $task)
    {

        $this->authorize('access', $task->subject);

        $user = auth()->user();
        $validated = $request->validated();

        $filePath = null;

        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('solutions', $filename, 'public');
        }

        $task->solutions()->create([
            'user_id' => $user->id,
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'] ?? null,
            'file_path' => $filePath,
            'grade' => null,
        ]);

        return redirect()->route('tasks.show', ['task' => $task->id]);
    }

    public function show(Solution $solution)
    {
        //

    }

    public function edit(Solution $solution)
    {
        $this->authorize('access', $solution);

        return view('student.solution.edit', [
            'solution' => $solution,
        ]);
    }

    public function update(UpdateSolutionRequest $request, Solution $solution)
    {
        $this->authorize('access', $solution);

        $validated = $request->validated();

        $solution->title = $validated['title'] ?? $solution->title;
        $solution->content = $validated['content'] ?? $solution->content;

        if ($request->hasFile('file')) {
            $basename = basename($solution->file_path);
            if (!in_array($basename, ['sample.pdf', 'sample.png', 'sample.zip']) && Storage::disk('public')->exists($solution->file_path)) {
                Storage::disk('public')->delete($solution->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $solution->file_path = $file->storeAs('solutions', $fileName, 'public');
        }

        $solution->save();

        return redirect()->route('tasks.show', ['task' => $solution->task_id]);
    }


    public function destroy(Solution $solution)
    {
        $this->authorize('access', $solution);

        if (
            $solution->file_path &&
            Storage::disk('public')->exists($solution->file_path)
        ) {

            $filename = basename($solution->file_path);
            $protectedSamples = ['sample.png', 'sample.zip', 'sample.pdf'];

            if (!in_array($filename, $protectedSamples)) {
                Storage::disk('public')->delete($solution->file_path);
            }
        }

        $solution->delete();

        return redirect()->route('tasks.show', ['task' => $solution->task_id]);
    }

    public function grade(Request $request, Solution $solution)
    {
        $this->authorize('access', $solution);

        $validated = $request->validate([
            'grade' => 'required|integer|between:1,5',
        ]);

        $solution->grade = $validated['grade'];
        $solution->save();

        return redirect()->route('tasks.show', ['task' => $solution->task_id]);
    }
}
