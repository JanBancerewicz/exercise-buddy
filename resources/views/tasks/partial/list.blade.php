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
                @forelse ($activeTasks as $activeTask)
                    <div class="col-sm-12 col-lg-12">

                        <div class="card text-bg-light mb-3">
                            {{-- start --}}
                            <div class="d-flex w-100 card-header justify-content-between mb-6">
                                {{ $activeTask->updated_at->format('Y-m-d') }}<br />
                                {{ $activeTask->updated_at->format('H:i') }}
                                <div class="btn-group-horizontal" role="group">
                                    <form class="btn" action="{{ route('tasks.update', ['task' => $activeTask]) }}"
                                        method="POST" novalidate>
                                        <input type="hidden" name="title" value="{{ $activeTask->title }}">
                                        <input type="hidden" name="content" value="{{ $activeTask->content }}">
                                        <input type="hidden" name="status" value="{{ Task::getStatus('Completed') }}">
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
                                                    href="{{ route('tasks.show', ['task' => $activeTask]) }}">Show
                                                    details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('tasks.edit', ['task' => $activeTask]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('tasks.delete', ['task' => $activeTask]) }}"
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
                                <h5 class="card-title">{{ $activeTask->title }}</h5>
                                @if ($activeTask->content)
                                    <p class="card-text">{{ $activeTask->content }}</p>
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
                @forelse ($completedTasks as $completedTask)
                    <div class="col-sm-12 col-lg-12">
                        <div class="card text-bg-light mb-3">
                            {{-- start --}}
                            <div class="d-flex w-100 card-header justify-content-between mb-6">
                                {{ $completedTask->updated_at->format('Y-m-d') }}<br />
                                {{ $completedTask->updated_at->format('H:i') }}
                                <div class="btn-group-horizontal" role="group">
                                    <form class="btn"
                                        action="{{ route('tasks.update', ['task' => $completedTask]) }}" method="POST"
                                        novalidate>
                                        <input type="hidden" name="title" value="{{ $completedTask->title }}">
                                        <input type="hidden" name="content" value="{{ $completedTask->content }}">
                                        <input type="hidden" name="status" value="{{ Task::getStatus('Active') }}">
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
                                                    href="{{ route('tasks.show', ['task' => $completedTask]) }}">Show
                                                    details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('tasks.edit', ['task' => $completedTask]) }}">Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('tasks.delete', ['task' => $completedTask]) }}"
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
                                <h5 class="card-title">{{ $completedTask->title }}</h5>
                                @if ($completedTask->content)
                                    <p class="card-text">{{ $completedTask->content }}</p>
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
