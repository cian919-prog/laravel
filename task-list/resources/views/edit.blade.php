@extends('layouts.app')






@section('content')
@include('form', ['task' => $tasks])
@endsection
