@props(['job'])
<x-panel class="flex-cols  text-center ">
    <div class=" text-left text-sm">
        {{$job->employer->name}}
    </div>
    <div class="p-10">
        <h3 class="group-hover:text-blue-800 font-bold text-xl">
            <a href="jobs/{{$job->id}}" >
                {{$job->title}}
            </a>
        </h3>
        <p class="text-sm mt-5">{{$job->schedule}} - {{$job->salary}}</p>
    </div>
    <div class="flex justify-between items-center">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :tag="$tag" size="small"/>
            @endforeach
        </div>
        <x-logo :employer="$job->employer" width="40"/>
    </div>
</x-panel>
