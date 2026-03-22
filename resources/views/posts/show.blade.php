@extends('layout.master')

@section('content')
<div class="container py-5">
       <h1 class="text-center text-info font-weight-bolder mb-4 display-4">
                        Post Details
                    </h1>
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">

                 

                    <div class="mb-4">
                        <h5 class="text-muted mb-1">Post ID</h5>
                        <p class="fs-5 fw-semibold">{{ $post->id }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-1">Author Name</h5>
                        <p class="fs-5 fw-semibold">{{ $post->username }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-1">Post Title</h5>
                        <p class="fs-4 fw-bold text-dark">{{ $post->title }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Message</h5>
                        <div class="bg-light p-4 rounded-3 border">
                            <p class="mb-0 fs-5 text-dark" style="line-height: 1.8;">
                                {{ $post->message }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary px-4 mr-5">
                            ← Back
                        </a>

                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary px-4 mr-5">
                            Edit Post
                        </a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="btn btn-danger px-4"
                                onclick="return confirm('Are you sure you want to delete this post?')"
                            >
                                Delete Post
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection