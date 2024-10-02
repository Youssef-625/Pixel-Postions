<x-layout>
    <x-page-heading>Result</x-page-heading>
    <section class="text-center pt-6 ">
        <h1 class="font-bold text-4xl mb-6">Let's Find Your Next Job</h1>
        <x-forms.form action="/search" class="mt-10">
            <x-forms.input   name="job"  placeholder="Back End ..." :label="false"/>
            @if(request('tag'))
                <input type="hidden" name="tag" value="{{request('tag')}}">
            @endif
            <div class="space-x-4">
                <x-forms.button>search</x-forms.button>
                <x-tag-dropdown :$tags>Tags</x-tag-dropdown>
            </div>
        </x-forms.form>
    </section>
    <div class="mt-6 space-y-7">
        @if(isset($jobs))
        @foreach($jobs as $job)
            <x-job-card-wide :job="$job"/>
        @endforeach
        @endif

    </div>
</x-layout>
