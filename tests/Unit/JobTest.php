<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

test('job belong to an employer', function () {
    $employer=Employer::factory()->create();
    $job=Job::factory()->create([
        'employer_id'=>$employer->id
    ]);

    expect($job->employer->is($employer))->toBeTrue();
});

test('employer belong to a user', function()
{
  $user=User::factory()->create();
  $employer=Employer::factory()->create([
     'user_id'=>$user->id,
  ]);

  expect($employer->user->is($user))->toBeTrue();
});

test('user has one employer', function()
{
  $user=User::factory()->create();
  $employer=Employer::factory()->create([
     'user_id'=>$user->id,
  ]);

  expect($employer->user->is($user))->toBeTrue();
});


test('employer has many jobs',function (){
    $employer=Employer::factory()->create();
    $jobs=Job::factory(5)->create([
        'employer_id'=>$employer->id
    ]);
    foreach ($jobs as $job)
    {
    expect($job->employer->is($employer))->toBeTrue();
    }
});

test('jobs have tags',function (){
    $job=Job::factory()->create();
    $job->tag('Web');
    expect($job->tags)->toHaveCount(1);
});

