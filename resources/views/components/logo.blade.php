@props(['employer','width'=>90])
{{--@dd(asset("/storage".$employer->logo))--}}
<img class="rounded-xl" src="{{ asset($employer->logo) }}" alt="{{asset($employer->logo)}}" width="{{$width}}">

