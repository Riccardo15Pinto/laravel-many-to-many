@extends('layouts.app')
@section('title', 'Admin/Type')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Tipi
        </h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Tipo</th>
                    <th scope="col">Colore</th>
                    <th scope="col">Creato</th>
                    <th scope="col">Modificato</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->label }}</td>
                        <td>
                            <span class="badge" style="background-color: {{ $type->color }};">
                                {{ $type->color }}
                            </span>
                        </td>
                        <td>{{ $type->created_at }}</td>
                        <td>{{ $type->updated_at }}</td>
                        <td>
                            <div class="d-flex justify-content-end">

                                <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning me-2">
                                    <i class="fa-solid fa-pen-nib"></i>
                                </a>
                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">
                            <h3>Non ci sono categorie</h3>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Aggiungi Nuova categoria
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
