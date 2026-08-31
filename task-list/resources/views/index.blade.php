@extends('layouts.app')
@section('title', 'task list GELLO')


@section('content')
<nav class="mb-4">
    <a href="{{route('task.create')}}"
    class=" font-medium text-red-700 underline decoration-blue-500"
    >add task</a>
</nav>



    {{-- @if(count($tasks) ) --}}
    @forelse($tasks as $task )

<a href="{{route('task.show', ['task' => $task->id])}}" @class(['text-purple-900','line-through' => $task->completed])>{{$task->title}}</a>
<br>
    @empty
    <p> no tasks</p>
    @endforelse
    @if($tasks->count())
    <nav class="mt-4">
        {{ $tasks->links() }}

    </nav>

    @endif
@endsection
