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
                        <span class="input-group-text">Exercise title</span>
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
                        
                    <div class="input-group mb-3">
                        <span class="input-group-text">Category</span>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $task->category) }}" >
                                @php
                                    $selectedOption = old('category', $task->category);
                                @endphp
                                <option>Select a difficulty...</option>
                                <option value="0" @if($selectedOption == 0) selected @endif>Warm-up</option>
                                <option value="1" @if($selectedOption == 1) selected @endif>Easy</option>
                                <option value="2" @if($selectedOption == 2) selected @endif>Medium</option>
                                <option value="3" @if($selectedOption == 3) selected @endif>Hard</option>
                                <option value="4" @if($selectedOption == 4) selected @endif>Advanced</option>
                            </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">Weight</span>
                        <input type="number" min="0" max="100" class="form-control @error('weight') is-invalid @enderror" id="weight"
                            name="weight" placeholder="Weight in kg..." value="{{ old('weight', $task->weight) }}" />
                        @error('weight')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">Reps</span>
                        <input type="number" min="0" max="100" class="form-control @error('reps') is-invalid @enderror" id="reps"
                            name="reps" placeholder="Number of reps..." value="{{ old('reps', $task->reps) }}" />
                        @error('reps')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">Sets</span>
                        <input type="number" min="0" max="10" class="form-control @error('sets') is-invalid @enderror" id="sets"
                            name="sets" placeholder="Number of sets..." value="{{ old('sets', $task->sets) }}"/>
                        @error('sets')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rest Time</span>
                            <select class="form-select @error('restTime') is-invalid @enderror" id="restTime" name="restTime" value="{{ old('restTime', $task->restTime) }}" >
                                @php
                                    $selectedOption = old('restTime', $task->restTime);
                                @endphp
                                <option>Select the rest time...</option>
                                <option value="0" @if($selectedOption == 0) selected @endif>0s</option>
                                <option value="30" @if($selectedOption == 30) selected @endif>30s</option>
                                <option value="60" @if($selectedOption == 60) selected @endif>60s</option>
                                <option value="90" @if($selectedOption == 90) selected @endif>90s</option>
                                <option value="120" @if($selectedOption == 120) selected @endif>120s</option>
                                <option value="180" @if($selectedOption == 180) selected @endif>180s</option>
                            </select>
                        @error('restTime')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <select class="form-select form-select-lg mb-3" name="status">
                        @php
                           $activeStatus = \App\Models\Exercise::getStatus('Active');
                           $completedStatus = \App\Models\Exercise::getStatus('Completed');
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
