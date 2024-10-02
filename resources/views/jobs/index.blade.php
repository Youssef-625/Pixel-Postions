<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6 ">
            <h1 class="font-bold text-4xl mb-6">Let's Find Your Next Job</h1>
            <x-forms.form action="/search?job={{request('name')}}" class="mt-10">
                <x-forms.input name="job" placeholder="Back End ..." :label="false"/>
                <div class="space-x-4">
                    <x-forms.button>search</x-forms.button>
                    <x-tag-dropdown :$tags>Tags</x-tag-dropdown>
                </div>
            </x-forms.form>
        </section>
        <section class="pt-10">
            <x-section-header>Featured Jobs</x-section-header>
            <div class=" grid lg:grid-cols-3 gap-7 mt-5 w-full ">

                @foreach($FeaturedJobs as $job)
                    <x-job-card :job="$job"></x-job-card>
                @endforeach

            </div>
        </section>

        <section>
            <x-section-header>Tags</x-section-header>
            <div class="mt-5 space-x-2 space-y-2">
                @foreach($tags as $tag)
                    <div class="inline-flex ">
                        <x-tag :tag="$tag"/>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <x-section-header>Recent Jobs</x-section-header>
            <div class="mt-6 space-y-7">
                @foreach($jobs as $job)
                    <x-job-card-wide :job="$job"/>
                @endforeach
            </div>
        </section>
        <br>
        <br>
        <br>
    </div>

</x-layout>
