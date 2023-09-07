@extends('layouts.app')
@section('title', 'Admin/Project')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Progetto
        </h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name_project }}</h5>
                <h5 class="card-title">{{ $project->slug }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->type_project }}</h6>
                <p class="card-text">{{ $project->description_project }}</p>
                <div class="d-flex align-items-center justify-content-between">

                    <a href="{{ $project->url_project }}" class="card-link">Link GitHub</a>
                    <div>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2">
                            <i class="fa-solid fa-pen-nib"></i>
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#{{ $project->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                        @include('includes.modal-delete')
                    </div>
                </div>
                @if ($project->image)
                    <figure>
                        <img src="{{ $project->getImagePath() }}" alt="{{ $project->name_project }}">
                    </figure>
                @endif
            </div>
        </div>
    </div>
@endsection
