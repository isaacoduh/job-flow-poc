<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index');
    }

    public function getAllJobs()
    {
        $jobs = Job::all();
        return response()->json(['jobs' => $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


        $job = Job::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description']
        ]);

        return response()->json([
            'job' => $job
        ]);
    }

    public function show($id)
    {
        return view('jobs.job')->with('jobId', $id);
    }

    public function getJobById($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        return response()->json(['job' => $job]);
    }

}
