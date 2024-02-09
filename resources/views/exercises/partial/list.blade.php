<div class="container">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="exercises-active" role="tabpanel">
            <div class="row">
                @if (session()->has('status'))
                    <div class="col-sm-12 col-lg-12">
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
                                    <form class="btn" action="{{ route('exercises.update', ['exercise' => $activeExercise]) }}"
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
                                                    href="{{ route('exercises.show', ['exercise' => $activeExercise]) }}">Show
                                                    details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('exercises.edit', ['exercise' => $activeExercise]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('exercises.delete', ['exercise' => $activeExercise]) }}"
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
                                <a href="{{ route('exercises.show', ['exercise' => $activeExercise]) }}">
                                    <h5 class="card-title">{{ $activeExercise->title }}</h5>
                                </a>
                                @if ($activeExercise->content)
                                    <p class="card-text">{{ $activeExercise->content }}</p>
                                @endif
                                <br/>
                                <div class="container row">
                                    <div class="col-sm-6 col-lg-6">
                                    <table class="table table-bordered border-primary ">
                                        <tr><td><b>Reps</td><td><b>{{ $activeExercise->reps }}</b></td></tr>
                                        <tr><td><b>Sets</b></td><td><b>{{ $activeExercise->sets }}</b></td></tr>
                                    </table>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <table class="table table-bordered border-dark ">
                                            <tr><td><b>Weight</b></td><td>
                                                @if ($activeExercise->weight)
                                                {{ $activeExercise->weight }}
                                                @else
                                                None
                                                @endif
                                            </td></tr>
                                        <tr><td><b>Rest time</b></td><td>{{ $activeExercise->restTime }}s</td></tr>
                                    </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12">
                        <p>All exercises are completed</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="tab-pane fade" id="exercises-completed" role="tabpanel">
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
                                        action="{{ route('exercises.update', ['exercise' => $completedExercise]) }}" method="POST"
                                        novalidate>
                                        <input type="hidden" name="title" value="{{ $completedExercise->title }}">
                                        <input type="hidden" name="content" value="{{ $completedExercise->content }}">
                                        <input type="hidden" name="status" value="{{ Exercise::getStatus('Active') }}">
                                        <input type="hidden" name="category" value="{{ $completedExercise->category }}">
                                        <input type="hidden" name="weight" value="{{ $completedExercise->weight }}">
                                        <input type="hidden" name="reps" value="{{ $completedExercise->reps }}">
                                        <input type="hidden" name="sets" value="{{ $completedExercise->sets }}">
                                        <input type="hidden" name="restTime" value="{{ $completedExercise->restTime }}">
                                        
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
                                                    href="{{ route('exercises.show', ['exercise' => $completedExercise]) }}">Show
                                                    details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('exercises.edit', ['exercise' => $completedExercise]) }}">Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('exercises.delete', ['exercise' => $completedExercise]) }}"
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
                                <a href="{{ route('exercises.show', ['exercise' => $completedExercise]) }}">
                                    <h5 class="card-title">{{ $completedExercise->title }}</h5>
                                </a>
                                @if ($completedExercise->content)
                                    <p class="card-text">{{ $completedExercise->content }}</p>
                                @endif
                                <br/>
                                <div class="container row">
                                    <div class="col-sm-6 col-lg-6">
                                    <table class="table table-bordered border-primary ">
                                        <tr><td><b>Reps</td><td><b>{{ $completedExercise->reps }}</b></td></tr>
                                        <tr><td><b>Sets</b></td><td><b>{{ $completedExercise->sets }}</b></td></tr>
                                    </table>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <table class="table table-bordered border-dark ">
                                            <tr><td><b>Weight</b></td><td>
                                                @if ($completedExercise->weight)
                                                {{ $completedExercise->weight }}
                                                @else
                                                None
                                                @endif
                                            </td></tr>
                                        <tr><td><b>Rest time</b></td><td>{{ $completedExercise->restTime }}s</td></tr>
                                    </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12">
                        <p>No exercises are marked as complete</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
