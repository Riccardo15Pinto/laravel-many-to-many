@extends('layouts.app')
@section('title', 'Admin/Tech/create')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Creaa Tecnologia
        </h2>

        @include('includes.technology.form')

    </div>
@endsection

@section('scripts')
    @vite('resources/js/toast.js')
@endsection
