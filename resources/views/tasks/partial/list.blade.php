<div class="container">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="tasks-active" role="tabpanel">
            <div class="row">
                @if (session()->has('status'))
                    <div class="col-sm-12 col-lg-12 offset-lg-3">
                        <div class="alert @if (session('status')['success']) alert-success @else alert-danger @endif">
                            {{ session('status')['message'] }}
                        </div>
                    </div>
                @endif
                @forelse ($activeExercises as $activeExercise)
                    <div class="col-sm-12 col-lg-12">

                        <div class="card text-bg-light mb-3">
                            {{-- start --}}
                            <div class="d-flex w-100 card-header justify-content-between mb-6">
                                {{ $activeExercise->updated_at->format('Y-m-d') }}<br />
                                {{ $activeExercise->updated_at->format('H:i') }}
                                <div class="btn-group-horizontal" role="group">
                                    <form class="btn" action="{{ route('tasks.update', ['task' => $activeExercise]) }}"
                                        method="POST" novalidate>
                                        <input type="hidden" name="title" value="{{ $activeExercise->title }}">
                                        <input type="hidden" name="content" value="{{ $activeExercise->content }}">
                                        <input type="hidden" name="status" value="{{ Exercise::getStatus('Completed') }}">
                                        <input type="hidden" name="category" value="{{ $activeExercise->category }}">
                                        <input type="hidden" name="weight" value="{{ $activeExercise->weight }}">
                                        <input type="hidden" name="reps" value="{{ $activeExercise->reps }}">
                                        <input type="hidden" name="sets" value="{{ $activeExercise->sets }}">
                                        <input type="hidden" name="restTime" value="{{ $activeExercise->restTime }}">

                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-success">Mark as completed</button>
                                    </form>

                                    <div class="btn-group dropdown" role="group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('tasks.show', ['task' => $activeExercise]) }}">Show
                                                    details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('tasks.edit', ['task' => $activeExercise]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('tasks.delete', ['task' => $activeExercise]) }}"
                                                    method="POST" novalidate>
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $activeExercise->title }}</h5>
                                @if ($activeExercise->content)
                                    <p class="card-text">{{ $activeExercise->content }}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12">
                        <p>All tasks are completed</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="tab-pane fade" id="tasks-completed" role="tabpanel">
            <div class="row">
                @forelse ($completedExercises as $completedExercise)
                    <div class="col-sm-12 col-lg-12">
                        <div class="card text-bg-light mb-3">
                            {{-- start --}}
                            <div class="d-flex w-100 card-header justify-content-between mb-6">
                                {{ $completedExercise->updated_at->format('Y-m-d') }}<br />
                                {{ $completedExercise->updated_at->format('H:i') }}
                                <div class="btn-group-horizontal" role="group">
                                    <form class="btn"
                                        action="{{ route('tasks.update', ['task' => $completedExercise]) }}" method="POST"
                                        novalidate>
                                        <input type="hidden" name="title" value="{{ $completedExercise->title }}">
                                        <input type="hidden" name="content" value="{{ $completedExercise->content }}">
                                        <input type="hidden" name="status" value="{{ Exercise::getStatus('Active') }}">
                                        <input type="hidden" name="category" value="{{ $activeExercise->category }}">
                                        <input type="hidden" name="weight" value="{{ $activeExercise->weight }}">
                                        <input type="hidden" name="reps" value="{{ $activeExercise->reps }}">
                                        <input type="hidden" name="sets" value="{{ $activeExercise->sets }}">
                                        <input type="hidden" name="restTime" value="{{ $activeExercise->restTime }}">
                                        
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Mark as active</button>
                                    </form>
                                    <div class="btn-group dropdown" role="group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('tasks.show', ['task' => $completedExercise]) }}">Show
                                                    details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('tasks.edit', ['task' => $completedExercise]) }}">Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('tasks.delete', ['task' => $completedExercise]) }}"
                                                    method="POST" novalidate>
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $completedExercise->title }}</h5>
                                @if ($completedExercise->content)
                                    <p class="card-text">{{ $completedExercise->content }}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12">
                        <p>No tasks are marked as complete</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
