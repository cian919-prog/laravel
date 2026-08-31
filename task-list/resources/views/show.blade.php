@extends('layouts.app')
@section('title', $tasks->title)
@section('content')




@if($tasks->long_description)
    <p>{{ $tasks->long_description }} </p>
@else
    <p>{{ $tasks->description}}</p>
@endif

<p>{{$tasks->created_at}}</p>
<p>{{$tasks->updated_at}}</p>


<div>
    <form action="{{ route('task.delete', ['task' => $tasks->id]) }}" method="POST"  >
        @csrf
        @method('DELETE')
        <button type="sumbit">delete</button>
        

    </form>
</div>
@endsection
