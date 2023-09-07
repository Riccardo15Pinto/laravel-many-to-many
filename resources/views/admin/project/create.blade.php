@extends('layouts.app')
@section('title', 'Admin/Create-Project')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Crea nuovo Progetto
        </h2>

        @include('includes.project.form')

    </div>
@endsection

@section('scripts')
    @vite('resources/js/image-preview.js')
@endsection
