<x-panel class="flex gap-6">
    <div>
        <x-logo :employer="$job->employer" width="100"/>
    </div>
    <div class="flex-1 flex  flex-col">
        <a href="#" class=" text-sm text-gray-400">{{$job->employer->name}}</a>
        <h3 class="font-bold text-xl mt-4 group-hover:text-blue-800">
            <a href="/jobs/{{$job->id}}">
                {{$job->title}}
            </a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{$job->schedule}} - {{$job->salary}}</p>
    </div>
    <div>
        @foreach($job->tags as $tag)
            <x-tag :tag="$tag"/>
        @endforeach
    </div>
</x-panel>
