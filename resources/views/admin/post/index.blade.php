@extends('layouts.admin')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Post Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('post.create') }}">Create Post</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
          <a style="float:right;" class="btn btn-primary" href="{{ route('post.create')}}">Create Post</a>
            <h3>Post List</h3>
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $index => $post)
                <tr>
                  <td>{{ $index }}</td>
                  <td><img style="height:37px; border-radius:20px;" src="{{asset('storage/uploads/PostImage/' . $post->image)}}"></td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category_id }}</td>
                  <td>{{ $post->user->name }}</td>
                  <td>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm mr-3">Edit</a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mr-3"
                            onclick="return(confirm('are you sure to delete?'))">Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
