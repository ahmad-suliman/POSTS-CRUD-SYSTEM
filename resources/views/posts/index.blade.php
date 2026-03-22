@extends('layout.master')
@section('content')
  <div class="container">

    <h1 class="text-center m-5 text-primary display-3 font-weight-bolder">Posts</h1>
    @if(session('create'))
      <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('create') }}

        <button type="button" class="close" data-dismiss="alert">
          &times;
        </button>
      </div>
    @endif
        @if(session('update'))
      <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('update') }}

        <button type="button" class="close" data-dismiss="alert">
          &times;
        </button>
      </div>
    @endif
    @if(session('delete'))
      <div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}

        <button type="button" class="close" data-dismiss="alert">
          &times;
        </button>
      </div>
    @endif
    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success mt-3 mb-3 w-50"> + Create Post</a>
    <table class="table table-bordered  align-middle">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Title</th>
          <th scope="col">Post</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->username }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->message }}</td>
            <td>
              <div class="d-flex">
                <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-info mr-2">
                  VIEW
                </a>
                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-primary mr-2">
                  EDIT
                </a>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('Are you sure you want to delete this post?')">
                    DELETE
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    setTimeout(function () {
      $('#success-alert').fadeOut('slow');
    }, 10000);
    setTimeout(function () {
      $('#danger-alert').fadeOut('slow');
    }, 10000);
  </script>
@endsection