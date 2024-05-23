@extends('layouts.admin')

@section('content')
    <section class="py-3 admin_section">
        <div class="container">
            <h2 class="title_section">Edit this project</h2>
            <div class="d-flex justify-content-end pb-2 gap-2">
                <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Projects List</a>
                <a class="btn my_success" href="{{ route('admin.projects.show', $project) }}">View details</a>
            </div>

            @include('partials.alert-error-form')

            <form class="my_form" action="{{ route('admin.projects.update', $project) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3 py-2">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" aria-describedby="titleHelper" placeholder="Project title here"
                        value="{{ old('title', $project->title) }}" />
                    <small id="titleHelper" class="form-text text-secondary">Insert the project title</small>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="preview" class="form-label">Preview image</label>
                    <input type="file" class="form-control @error('preview') is-invalid @enderror" name="preview"
                        id="preview" aria-describedby="previewHelper" />
                    <small id="previewHelper" class="form-text text-secondary">Upload image of the project preview</small>
                    @error('preview')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="start_date" class="form-label">Start date</label>
                    <input type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                        id="start_date" aria-describedby="start_dateHelper" placeholder="Project start date here"
                        value="{{ old('start_date', $project->start_date) }}" />
                    <small id="start_dateHelper" class="form-text text-secondary">Insert the project start date</small>
                    @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="end_date" class="form-label">End date</label>
                    <input type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                        id="end_date" aria-describedby="end_dateHelper" placeholder="Project end_date here"
                        value="{{ old('end_date', $project->end_date) }}" />
                    <small id="end_dateHelper" class="form-text text-secondary">Insert the project end date</small>
                    @error('end_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="project_url" class="form-label">Project URL</label>
                    <input type="text" class="form-control @error('project_url') is-invalid @enderror" name="project_url"
                        id="project_url" aria-describedby="project_urlHelper" placeholder="URL project repository here"
                        value="{{ old('project_url', $project->project_url) }}" />
                    <small id="project_urlHelper" class="form-text text-secondary">Insert URL of the project</small>
                    @error('project_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="repo_url" class="form-label">Repository URL</label>
                    <input type="text" class="form-control @error('repo_url') is-invalid @enderror" name="repo_url"
                        id="repo_url" aria-describedby="repo_urlHelper" placeholder="URL project repository here"
                        value="{{ old('repo_url', $project->repo_url) }}" />
                    <small id="repo_urlHelper" class="form-text text-secondary">Insert URL of the project repository</small>
                    @error('repo_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        cols="30" rows="10" aria-describedby="descriptionHelper" placeholder="Project description here">{{ old('description', $project->description) }}</textarea>
                    <small id="descriptionHelper" class="form-text text-secondary">Insert the project description</small>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn my_success" type="submit">Edit project</button>

            </form>
        </div>
    </section>
@endsection
