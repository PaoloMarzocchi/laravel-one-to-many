@extends('layouts.admin')

@section('content')
    <section class="py-5 admin_section">
        <div class="container">
            <h2 class="title_section">Create a new type</h2>
            <div class="d-flex justify-content-end pb-2">
                <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Go Back</a>
            </div>

            @include('partials.alert-error-form')

            <form class="my_form" action="{{ route('admin.types.store') }}" method="post">
                @csrf


                <div class="mb-3 py-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" aria-describedby="nameHelper" placeholder="Type name here"
                        value="{{ old('name') }}" />
                    <small id="nameHelper" class="form-text text-secondary">Insert the type name</small>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn my_success" type="submit">Add type</button>

            </form>
        </div>
    </section>
@endsection
