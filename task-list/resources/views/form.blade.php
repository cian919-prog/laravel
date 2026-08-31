@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'create task')


@section('styles')
<style>
    .error {
        color: red;
    }
</style>
@endsection

@section('content')
<form method="POST" action="{{ isset($task)  ? route('task.update', ['task' => $task->id])  : route('task.store') }}">
    @csrf
    @isset($task)
    <div>@method('PUT')
        @endisset
        <label for="title ">
            title
        </label>
        <input class="mb-4" type="text" name="title" id= "title" value="{{ $task->title ?? old('title') }}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
        <div>
        <label for="description ">
            description
        </label>
        <textarea class="mb-4" name="description" id="description" rows="5" >{{$task->description ?? old('description') }}</textarea>
                @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
            <label for="long_description ">
            long description
        </label>
        <textarea class="mb-4" name="long_description" id="long_description" rows="10" >{{$task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button class="flex gap-5 text-green-500 underline decoration-amber-600" type="submit">
            @isset($task) update task
             @else add task
              @endisset</button>
            <a href="{{ route('task.index') }}" class="text-red-600 hover:text-red-800 underline decoration-amber-600">cancel</a>
    </div>
</form>
@endsection
