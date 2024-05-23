@extends('layouts.admin')

@section('content')
    <section class="py-3 admin_section">
        <div class="container">
            <h2 class="title_section">Projects for each type</h2>

            <div class="d-flex justify-content-end pb-2">
                <a class="btn my_success" href="{{ route('admin.projects.create') }}">Add new
                    Type</a>
            </div>

            <form action="{{ route('admin.types.index') }}" method="get">
                <div class="mb-3 d-flex gap-2 justify-content-center">
                    <div>
                        {{-- <label for="id" class="form-label">Types</label> --}}
                        <select class="form-select " name="id" id="id">
                            <option selected value="0">All</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Select Type</button>

                </div>
            </form>


            @include('partials.confirm-form')


            <div class="table-responsive my_table">
                <table class="table mb-0 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Preview</th>
                            <th scope="col">Title</th>
                            <th scope="col">Project link</th>
                            <th scope="col">Repository link</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($projects as $project)
                            <tr class="">
                                <td scope="row">

                                    @if (Str::startsWith($project->preview, 'https://'))
                                        <img width="200" src="{{ $project->preview }}" alt="{{ $project->title }}">
                                    @else
                                        <img width="200" src="{{ asset('storage/' . $project->preview) }}"
                                            alt="{{ $project->title }}">
                                    @endif

                                </td>
                                <td>{{ $project->title }}</td>
                                <td><a href="{{ $project->project_url }}">Go to Project</a></td>
                                <td>
                                    <a href="{{ $project->repo_url }}">Check project code</a>
                                </td>
                                <td width='100'>{{ $project->start_date }}</td>
                                <td width='100'>{{ $project->end_date }}</td>
                                <td width='150'>
                                    <a class="btn my_success btn-sm" href="{{ route('admin.projects.show', $project) }}">
                                        <i class="fa-solid fa-eye fa-xs fa-fw" style="color: #ffffff;"></i>
                                    </a>
                                    <a class="btn btn-dark btn-sm" href="{{ route('admin.projects.edit', $project) }}">
                                        <i class="fa-solid fa-pen-to-square fa-xs fa-fw" style="color: #ffffff;"></i>
                                    </a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn my_danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $project->id }}">
                                        <i class="fa-solid fa-trash fa-xs fa-fw" style="color: #ffffff;"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        Deleting {{ $project->title }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Attention! You are deleting this project, this action is irreversible.
                                                    Do you want to continue?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        No, Go back
                                                    </button>
                                                    <form action="{{ route('admin.projects.destroy', $project) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-danger">
                                                            Yes, Delete it
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="7">Nothing Found</td>
                            </tr>
                        @endforelse



                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
