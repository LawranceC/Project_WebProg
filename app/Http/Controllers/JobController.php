<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function createJob(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'salary' => 'required|numeric',
            'deadline' => 'required|date|after:tomorrow',
        ]);
        
        Job::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'salary' => $request->input('salary'),
            'deadline' => $request->input('deadline'),
        ]);
    }

    public function updateJob(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:jobs,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'salary' => 'required|numeric',
            'deadline' => 'required|date|after:tomorrow',
        ]);
        
        $job = Job::find($request->input('id'));
        $job->category_id = $request->input('category_id');
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->salary = $request->input('salary');
        $job->deadline = $request->input('deadline');
        $job->save();
    }

    public function deleteJob(Request $request)
    {
        Job::destroy($request->input('id'));
    }
}
