@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Edit Task</h2>

            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Back to List
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form action="{{ route('book.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $book->title) }}">

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Author</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror"
                                    id="author" name="author" value="{{ old('author', $book->author) }}">

                                @error('author')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="published_year" class="form-label fw-semibold">Published Year</label>
                                <input type="number" class="form-control @error('published_year') is-invalid @enderror"
                                    id="published_year" name="published_year"
                                    value="{{ old('published_year', $book->published_year) }}" min="1900"
                                    max="2100">

                                @error('published_year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-check mb-4">
                                <input type="hidden" name="is_available" value="0">
                                <input class="form-check-input" type="checkbox" id="is_available" name="is_available"
                                    value="1" {{ old('is_available', $book->is_available) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_available">
                                    Available
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="cover_color" class="form-label fw-semibold">Cover Color</label>
                                <input type="text" class="form-control @error('cover_color') is-invalid @enderror"
                                    id="cover_color" name="cover_color"
                                    value="{{ old('cover_color', $book->cover->color) }}">

                                @error('cover_color')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cover_format" class="form-label fw-semibold">Cover Format</label>
                                <input type="text" class="form-control @error('cover_format') is-invalid @enderror"
                                    id="cover_format" name="cover_format"
                                    value="{{ old('cover_format', $book->cover->format) }}">

                                @error('cover_format')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('book.list') }}" class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-success">
                                    Update Book
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
