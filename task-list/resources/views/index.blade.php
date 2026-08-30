@extends('layouts.app')
@section('title', 'task list GELLO')


@section('content')




    {{-- @if(count($tasks) ) --}}
    @forelse($tasks as $task )

<a href="{{route('task.show', ['task' => $task->id])}}">{{$task->title}}</a>
<br>
    @empty
    <p> no tasks</p>
    @endforelse



@endsection
