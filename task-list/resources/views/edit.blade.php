@extends('layouts.app')

@section('title', 'edit task')

@section('content')
@section('styles')
<style>
    .error {
        color: red;
    }
</style>
@endsection
<form method="POST" action="{{ route('task.update', ['task' => $tasks->id]) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title ">
            title
        </label>
        <input text="text" name="title" id= "title" value="{{ $tasks->title }}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
        <div>
        <label for="description ">
            description
        </label>
        <textarea name="description" id="description" rows="5">{{ $tasks->description }}</textarea>
                @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
            <label for="long_description ">
            long description
        </label>
        <textarea name="long_description" id="long_description" rows="10">{{ $tasks->long_description }}</textarea>
                @error('long_description')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">edit task</button>
    </div>



</form>
@endsection
