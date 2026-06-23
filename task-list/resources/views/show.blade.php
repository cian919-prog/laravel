<h1>{{ $tasks->title }}</h1>


@if($tasks->long_description)
    <p>{{ $tasks->long_description }} </p>
@else
    <p>{{ $tasks->description}}</p>
@endif

<p>{{$tasks->created_at}}</p>
<p>{{$tasks->updated_at}}</p>
