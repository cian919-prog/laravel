@extends('layouts.app')

@section('title', 'create task')

@section('content')
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div> 
        <label for="title ">
            title
        </label>
        <input text="text" name="title" id="title">
    </div>
        <div>
        <label for="description ">
            description
        </label>
        <textarea name="description" id="description" rows="5"></textarea>
    </div>
            <label for="long_description ">
            long description
        </label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">create task</button>
    </div>



</form>
@endsection
