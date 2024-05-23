@extends('layouts.app')
@section('content')
    <section class="guest_section">
        <div class="jumbotron p-5 mb-4 rounded-3">
            <div class="container py-5">
                <div class="my_logo">
                    <img width="400" class="img-fluid" src="{{ Vite::asset('resources/img/logo-pm.png') }}" alt="my logo">
                </div>
                <h1 class="display-5 fw-bold">
                    Welcome to Laravel+Bootstrap 5
                </h1>

                <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including
                    laravel
                    breeze/blade. It works from laravel 9.x to the latest release 10.x</p>
                <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg"
                    type="button">Documentation</a>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam
                    nisi
                    deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                    accusamus dolores!</p>
            </div>
        </div>
    </section>
@endsection
