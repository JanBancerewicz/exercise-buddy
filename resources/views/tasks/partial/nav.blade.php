<div class="containter">
    <nav class="d-flex w-100 justify-content-between my-3 px-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tasks-active-tab" data-bs-toggle="pill" data-bs-target="#tasks-active"
                    role="tab" href="#tasks-active">
                    Active
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tasks-completed-tab" data-bs-toggle="pill" data-bs-target="#tasks-completed"
                    role="tab" href="#tasks-completed">
                    Completed
                </a>
            </li>

        </ul>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="btn btn-primary" href="{{ route('tasks.add') }}">
                    Add task
                </a>
            </li>
        </ul>
    </nav>
</div>
