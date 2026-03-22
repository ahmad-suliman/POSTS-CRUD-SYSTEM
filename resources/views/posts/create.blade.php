@extends('layout.master')
@section('content')
    <div class="container py-5">
        <h1 class="text-center text-success mb-4 display-4 font-weight-bold">
            Create Post
        </h1>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">


                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            @error('username')
                                <p class="text-center text-danger">{{ $message }}</p>
                            @enderror
                            @error('title')
                                <p class="text-center text-danger">{{ $message }}</p>
                            @enderror
                            @error('message')
                                <p class="text-center text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-4">
                                <label for="username" class="form-label fw-semibold">Name</label>
                                <input class="form-control form-control-lg" type="text" name="username" id="username"
                                    placeholder="Enter your name" required>
                            </div>

                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">Title</label>
                                <input class="form-control form-control-lg" type="text" name="title" id="title"
                                    placeholder="Enter post title" required>
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-semibold">Content</label>
                                <textarea class="form-control" name="message" id="content" rows="5"
                                    placeholder="Write your post here..." required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-sm rounded-3">
                                    Create Post
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection