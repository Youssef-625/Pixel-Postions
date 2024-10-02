<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="Post" action="/jobs/{{$job->id}}" id="edit">
        @csrf
        @method('PATCH')
        <x-forms.input label="Title" name="title" placeholder="CEO" :value="$job->title"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" :value="$job->salary"/>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida" :value="$job->location"/>
        <x-forms.select label="Schedule" name="schedule" value="">
            <option @if($job->schedule==='Part time') selected @endif>Part Time</option>
            <option @if($job->schedule==='Full Time') selected @endif>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" :value="$job->url"/>
        @if($job->Featured)
            <x-forms.checkbox label="Feature (Costs Extra)" name="featured" checked/>
        @else
            <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>
        @endif


        <x-forms.divider/>

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="laracasts, video, education"
                       :value="$job->tagsNames()"/>
        <x-forms.button form="edit">Publish</x-forms.button>
        <x-forms.button form="delete" class="bg-red-800 ml-3"  >Delete</x-forms.button>
    </x-forms.form>
    <x-forms.form method="post" action="/jobs/{{$job->id}}" id="delete">
        @method('delete')
    </x-forms.form>
</x-layout>
