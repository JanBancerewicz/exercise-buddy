@extends('layouts.template')

@section('title', 'To-do app')

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2">
    @include('tasks.partial.nav')
    @include('tasks.partial.list')
    </div> 
@endsection
