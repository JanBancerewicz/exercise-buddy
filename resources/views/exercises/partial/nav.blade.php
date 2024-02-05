<div class="containter">
    <nav class="d-flex w-100 justify-content-between my-3 px-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="exercises-active-tab" data-bs-toggle="pill" data-bs-target="#exercises-active"
                    role="tab" href="#exercises-active">
                    Active
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="exercises-completed-tab" data-bs-toggle="pill" data-bs-target="#exercises-completed"
                    role="tab" href="#exercises-completed">
                    Completed
                </a>
            </li>

        </ul>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="btn btn-primary" href="{{ route('exercises.add') }}">
                    Add exercise
                </a>
            </li>
        </ul>
    </nav>
</div>
