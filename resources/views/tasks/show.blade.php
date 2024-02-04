@extends('layouts.template')

@section('title', 'To-do app')

@section('content')
    <div class="containter">
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <div class="d-flex w-100 justify-content-between mb-3">
                    <p>
                        <a href="{{ route('tasks.index') }}"> &larr; Main page</a>
                    </p>
                    <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST" novalidate>
                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="content" value="{{ $task->content }}">
                        @method('PUT')
                        @csrf

                        @if ($task->matchStatus('Active'))
                            <input type="hidden" name="status" value="{{ Task::getStatus('Completed') }}">
                            <button type="submit" class="btn btn-success">Mark as completed</button>
                        @else
                            <input type="hidden" name="status" value="{{ Task::getStatus('Active') }}">
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
                    <p>Updated: <i>{{ $task->updated_at->format('Y-m-d \a\t H:i') }}</i></p>
                    <h2 class="mb-4">{{ $task->title }}</h2>
                    {{-- <p><b>Created:</b> {{$task->created_at->format('Y-m-d \a\t H:i')}} --}}
                    
                    @if ($task->content)
                        <p class="card-text">{{ $task->content }}</p>
                    @endif
                    <p class="card-text">
                        Status:
                        @switch($task->status)
                            @case(\App\Models\Task::getStatus('Active'))
                                <b class="alert-success">Active</b>
                            @break

                            @case(\App\Models\Task::getStatus('Completed'))
                                <b class="alert-warning">Completed</b>
                            @break

                            @default
                        @endswitch

                    </p>

                    <div class="col-sm-12 d-flex">
                        <a href="{{ route('tasks.edit', ['task' => $task]) }}"><button type="button"
                                class="btn btn-primary me-2">Edit</button></a>

                        <form action="{{ route('tasks.delete', ['task' => $task]) }}" method="POST" novalidate>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
