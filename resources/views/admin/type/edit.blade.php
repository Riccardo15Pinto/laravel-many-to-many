@extends('layouts.app')
@section('title', 'Admin/Type/edit')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Modifica Tipo
        </h2>

        @include('includes.type.form')

    </div>
@endsection

@section('scripts')
    @vite('resources/js/toast.js')
@endsection
