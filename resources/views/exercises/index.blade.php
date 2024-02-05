@extends('layouts.template')

@section('title', 'Exercise helper app')

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2">
    @include('exercises.partial.nav')
    @include('exercises.partial.list')
    </div> 
@endsection
