@extends('layouts.template')

@section('title', 'Edit task')

@section('content')
    <div class="containter">
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <p>
                    <a href="{{ route('tasks.index') }}"> &larr; Main page</a>
                </p>
                <p>
                    <a href="{{ route('tasks.show', ['task' => $task]) }}"> &larr; Back to task <b>{{$task->title}}</b></a>
                </p>
                <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Task title</span>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" placeholder="What to do..." value="{{ old('title', $task->title) }}" />
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Content:</span>
                        <textarea class="form-control @error('content') is-invalid @enderror" rows="5" id="content" name="content"
                            placeholder="Description..." maxlength="1000">{{ old('content', $task->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <select class="form-select form-select-lg mb-3" name="status">
                        @php
                           $activeStatus = \App\Models\Task::getStatus('Active');
                           $completedStatus = \App\Models\Task::getStatus('Completed');
                        @endphp
                        <option value="{{$activeStatus}}" @if($activeStatus == $task->status) selected @endif >Active</option>
                        <option value="{{$completedStatus}}" @if($completedStatus == $task->status) selected @endif>Completed</option>
                      </select>
                    <br />
                    <button type="submit" class="btn btn-success">Confirm</button>
                    
                </form>
            </div>
        </div>
    </div>

@endsection
