<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobTag;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs=Job::latest()->with('employer','tags')->get()->groupBy('Featured');
        return view('jobs.index',[
            'FeaturedJobs'=>$jobs[1],
            'jobs'=> $jobs[0],
            'tags'=> Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes=$request->validate([
                'title' => ['required'],
                'salary' => ['required'],
                'location' => ['required'],
                'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
                'url' => [''],
                'tags' => ['nullable'],

        ]);
        $attributes['aboutUs']='xd';
        $attributes['requirements']='xd';
        $attributes['responsibilities']='xd';
        $attributes['featured'] = $request->has('featured');
        $job=Auth::user()->employer->jobs()->create(Arr::except($attributes,'tags'));

        if($attributes['tags'])
        {
            foreach (explode(',',$attributes['tags']) as $tag)
            {
                $job->tag($tag);
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {

        return view('jobs.show',[
            'job'=>$job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {

        return view('jobs.edit',
        [
            'job'=>$job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $attributes=$request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => [''],
            'tags' => ['nullable'],
        ]);
        $attributes['featured'] = $request->has('featured');
        $job->update(Arr::except($attributes,'tags'));
        $tags='xd';
        if($attributes['tags'])
        {
            JobTag::select()->where('job_id',$job->id)->delete();
            foreach (explode(',',$attributes['tags']) as $tag)
            {
                $job->tag($tag);
            }
        }
        return view('jobs.show',[
            'job'=>$job
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/');
    }
}
