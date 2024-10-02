<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use function dd;
use function request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $jobs = Job::latest()->Filter(request(['job']))->get();
        return view('result', [
            'jobs' => $jobs,
            'tags' => Tag::all(),
        ]);

    }
}
