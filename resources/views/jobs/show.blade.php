<x-layout>

    <body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white/5 rounded-lg shadow-md p-6">
            <div class="flex justify-between">
                <x-logo :employer="$job->employer"/>
                <h2 class="text-2xl font-bold text-white mt-4">{{$job->employer->name}}</h2>
                <div class="mt-5">
                    @foreach($job->tags as $tag)
                        <x-tag :$tag/>
                    @endforeach
                </div>
            </div>

            <div class="">
                <h1 class="text-white font-bold text-xl mb-2 mt-5">{{$job->title}}</h1>
                <p class="text-gray-300 text-sm mb-2">{{$job->location.' / '.$job->schedule}}</p>
                <h1 class="mt-5 text-xl">About Us :</h1>
                <p class="text-gray-300 mb-4">
                    {{$job->aboutUs}}
                </p>
                <h1 class="mt-5 text-xl">Requirements :</h1>
                <p class="text-gray-300 mb-4">
                    {{$job->requirements}}
                </p>

                <h1 class="mt-5 text-xl">Responsibilities :</h1>
                <p class="text-gray-300 mb-4">
                    {{$job->responsibilities}}
                </p>
                <p class="text-gray-300 font-bold">Salary: {{$job->salary}}</p>
                @can('can-edit',$job)
                <a href="/jobs/edit/{{$job->id}}">
                    <x-forms.button class="mt-5 mr-4">Edit</x-forms.button>
                </a>
                @endcan
                <a target="_blank" href="{{$job->url}}">
                    <x-forms.button class="mt-5">Visit</x-forms.button>
                </a>
            </div>



        </div>
    </div>
    </body>
</x-layout>

