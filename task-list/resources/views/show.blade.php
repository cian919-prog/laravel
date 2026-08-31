@extends('layouts.app')
@section('title', $tasks->title)
@section('content')
<div>
    <a href="{{ route('task.index') }}" class="mb-4 text-blue-500 hover:text-red-700">Back to Task List</a>
</div>


<p class="mb-4 text-red-700">{{ $tasks->description}}</p>
@if($tasks->long_description)
    <p class="mb-4 text-pink-500">{{ $tasks->long_description }} </p>
@endif

<p class="mb-4 text-sm text-yellow-300">{{$tasks->created_at->diffForHumans()}}created at</p>
<p class="mb-4 text-sm text-amber-600">{{$tasks->updated_at->diffForHumans()}}updated at</p>

<p class="mb-4 ">
    @if($tasks->completed)
        <span class=" bg-green-500 border-2 border-green-500 "> completed</span>
    @else
        <span class=" bg-red-500 border-2 border-red-500 "> not completed</span>
    @endif
</p>

<Div class="flex gap-4" >
    <a class="btn" href="{{ route('task.edit', ['task' => $tasks->id]) }}">edit</a>

    <form method="POST"  action="{{ route('task.complete', ['task'=> $tasks->id]) }}">
        @csrf
        @method('PUT')
        <button class="btn" type="submit">
            mark as {{  $tasks->completed ? 'not completed' : 'completed' }}
        </button>

    </form>

    <form action="{{ route('task.delete', ['task' => $tasks->id]) }}" method="POST"  >
        @csrf
        @method('DELETE')
        <button type="sumbit" class="text-red-600 hover:text-red-800">delete</button>


    </form>
</div>
@endsection
