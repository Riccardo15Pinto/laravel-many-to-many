@extends('layouts.app')
@section('title', 'Admin/Projects')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Progetti
        </h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Repository</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->name_project }}</td>
                        <td>
                            <a href="{{ $project->url_project }}">Vedi progetto su GitHub</a>
                        </td>
                        <td>{{ $project->description_project }}</td>
                        <td>{{ $project->type->label }}</td>
                        <td>
                            <div class="d-flex">

                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2">
                                    <i class="fa-solid fa-pen-nib"></i>
                                </a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#{{ $project->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                @include('includes.modal-delete')
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">
                            <h3>Non ci sono progetti</h3>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Aggiungi Nuovo Progetto
            </a>
            <a href="{{ route('admin.projects.trash') }}" class="btn btn-secondary">
                <i class="fa-solid fa-trash"></i>
                Trash
            </a>
        </div>

    </div>
@endsection

@section('scripts')

    @vite('resources/js/toast.js')
@endsection
