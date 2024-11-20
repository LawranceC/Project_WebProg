<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function createApplication(Request $request)
    {
        $this->validate($request, [
            'job_id' => 'required|exists:jobs,id',
            'application_letter' => 'required',
        ]);

        Application::create([
            'user_id' => Auth::user()->id,
            'job_id' => $request->job_id,
            'application_letter' => $request->application_letter,
            'status' => 'pending',
        ]);
    }

    public function updateApplication(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:applications,id',
            'job_id' => 'required|exists:jobs,id',
            'application_letter' => 'required',
        ]);

        $application = Application::find($request->input('id'));
        $application->job_id = $request->input('job_id');
        $application->application_letter = $request->input('application_letter');
        $application->save();
    }

    public function updateStatus(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:applications,id',
            'status' => 'required|in:pending,accepted,expired',
        ]);

        $application = Application::find($request->input('id'));
        $application->status = $request->input('status');
        $application->save();
    }

    public function deleteApplication(Request $request)
    {
        Application::destroy($request->input('id'));
    }
}
