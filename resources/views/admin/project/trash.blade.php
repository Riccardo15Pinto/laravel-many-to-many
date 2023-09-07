@extends('layouts.app')
@section('title', 'Admin/Trash')



@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">

            <h2 class="fs-4 text-secondary my-4">
                Trash
            </h2>
            <form action="{{ route('admin.projects.trash.restoreAll') }}" method="Post" class="restore-all-form ms-2">
                @method('patch')
                @csrf
                <button type="submit" class="btn btn-success">Ripristina tutto</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Repository</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Tech usata</th>
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
                        <td>{{ $project->type_project }}</td>
                        <td>
                            <div class="container d-flex justify-content-between">
                                <form action="{{ route('admin.projects.trash.restore', $project->id) }}" method="Post"
                                    class="restore-all-form ms-2">
                                    @method('patch')
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Ripristina</button>
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="container d-flex justify-content-between">
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
    </div>
@endsection
