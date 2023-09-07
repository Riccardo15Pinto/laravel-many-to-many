@extends('layouts.app')
@section('title', 'Admin/Tech/detail')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Dettaglio tecnologia:
        </h2>

        <a href="{{ route('admin.technologys.index') }}" class="btn btn-primary">Torna alla Home</a>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <div class="d-flex align-items-center">

                    <div>
                        <h5 class="card-title">{{ $technology->label }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Color : {{ $technology->color }} /
                            {{ $technology->info }}</span></h6>
                    </div>
                    <div>
                        <a href="{{ route('admin.technologys.edit', $technology) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-nib"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.technologys.destroy', $technology) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

    @vite('resources/js/toast.js')
@endsection
