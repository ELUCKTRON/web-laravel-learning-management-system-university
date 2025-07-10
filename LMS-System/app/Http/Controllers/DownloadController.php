<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{


    public function show($filename)
    {
        $path = 'solutions/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File not found.');
        }

        return Storage::disk('public')->download($path);
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|file|max:2048',
    //     ]);

    //     $file = $request->file('file');
    //     $path = $file->storeAs('solutions', $file->getClientOriginalName(), 'public');

    //     return back()->with('success', 'File uploaded successfully! Path: ' . $path);
    // }

    public function destroy($filename)
    {
        $path = 'solutions/' . $filename;

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return back()->with('success', 'File deleted successfully!');
        }

        return back()->with('error', 'File not found.');
    }

}
