@props(['tags'])

<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class=" bg-blue-800 rounded py-2 px-6 font-bold text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300   text-center inline-flex items-center dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
    {{$slot}}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdown"
     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-blue-900 absolute left-1/2 transform -translate-x-1/4  mt-2">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        @foreach($tags as $tag)
            <li>
                <a href="/search?tag={{$tag->name}}&{{http_build_query(request()->except('tag'))}}"
                   class="block px-4 py-2 hover:bg-blue-500 dark:hover:bg-blue-950 dark:hover:text-white">{{$tag->name}}</a>
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('dropdownDefaultButton').addEventListener('click', function () {
            var dropdownMenu = document.getElementById('dropdown');
            dropdownMenu.classList.toggle('hidden');
        });
    });
</script>

<style>
    #dropdown {
        transition: all 0.3s ease;
    }
</style>
