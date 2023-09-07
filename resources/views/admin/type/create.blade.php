@extends('layouts.app')
@section('title', 'Admin/Type/create')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Crea Nuovi Tipi
        </h2>

        @include('includes.type.form')

    </div>
@endsection

@section('scripts')
    @vite('resources/js/toast.js')
@endsection
