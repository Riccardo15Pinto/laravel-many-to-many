@extends('layouts.app')
@section('title', 'Admin/Edit-Project')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Modifica Progetto
        </h2>

        @include('includes.project.form')
    </div>
@endsection

@section('scripts')
    @vite('resources/js/image-preview.js')
@endsection
