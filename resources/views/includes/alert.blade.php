@if (session('alert-message'))
    <div class="container my-3">
        <div class="alert alert-{{ session('alert-type') }}">
            <div class="d-flex align-items-center justify-content-between">

                {{ session('alert-message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
