@extends('layouts.template')

@section('title', 'Exercise helper app')

@section('content')
    <div class="containter">
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <div class="d-flex w-100 justify-content-between mb-3">
                    <p>
                        <a href="{{ route('exercises.index') }}"> &larr; Main page</a>
                    </p>
                    <form action="{{ route('exercises.update', ['exercise' => $exercise]) }}" method="POST" novalidate>
                        <input type="hidden" name="title" value="{{ $exercise->title }}">
                        <input type="hidden" name="content" value="{{ $exercise->content }}">
                        @method('PUT')
                        @csrf

                        @if ($exercise->matchStatus('Active'))
                            <input type="hidden" name="status" value="{{ Exercise::getStatus('Completed') }}">
                            <button type="submit" class="btn btn-success">Mark as completed</button>
                        @else
                            <input type="hidden" name="status" value="{{ Exercise::getStatus('Active') }}">
                            <button type="submit" class="btn btn-success">Mark as active</button>
                        @endif
                    </form>
                </div>
                @if (session()->has('status'))
                    <div class="col-sm-12 col-lg-6 offset-lg-3">
                        <div class="alert @if (session('status')['success']) alert-success @else alert-danger @endif">
                            {{ session('status')['message'] }}
                        </div>
                    </div>
                @endif
                <div class="containter">
                    <p>Updated: <i>{{ $exercise->updated_at->format('Y-m-d \a\t H:i') }}</i></p>
                    <h2 class="mb-4">{{ $exercise->title }}</h2>
                    {{-- <p><b>Created:</b> {{$exercise->created_at->format('Y-m-d \a\t H:i')}} --}}
                    
                    @if ($exercise->content)
                        <p class="card-text">{{ $exercise->content }}</p>
                    @endif
                    <p class="card-text">
                        Status:
                        @switch($exercise->status)
                            @case(\App\Models\Exercise::getStatus('Active'))
                                <b class="alert-success">Active</b>
                            @break

                            @case(\App\Models\Exercise::getStatus('Completed'))
                                <b class="alert-warning">Completed</b>
                            @break

                            @default
                        @endswitch

                    </p>

                    <div class="col-sm-12 d-flex">
                        <a href="{{ route('exercises.edit', ['exercise' => $exercise]) }}"><button type="button"
                                class="btn btn-primary me-2">Edit</button></a>

                        <form action="{{ route('exercises.delete', ['exercise' => $exercise]) }}" method="POST" novalidate>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
