@extends('layouts.admin')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Post Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Edit Post</a></li>
    </ul>
  </div>
  <div class="clearix"></div>
  <div class="col-md-12">
    <div class="tile">
    <a style="float:right;" class="btn btn-primary" href="{{ route('post.index')}}"> PostList</a>
      <h3 class="tile-title">All Post </h3>
      <div class="tile-body">
      <form action="{{ route('post.update', [$post->id] ) }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
          <div class="form-group col-md-6">
            <label class="control-label">Title</label>
            <input class="form-control form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" type="text" name="title" placeholder="Post title" autofocus>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

            <div class="col-md-6 col-sm-6">
                <label for="status">Category</label>
                <select name="category_id" id="category_id" class="form-control select2" required>
                    <option value="" selected disabled>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($post->category_id == $category->id) {{ 'selected' }}
                        @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="image">Upload Image</label>
                <input class="form-control-file" id="image" name="image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            <div class="form-group col-md-5 text-center">
                <div style="max-height: 100px;max-width: 200px;overflow: hidden;margin: auto;">
                    <img src="{{asset('storage/uploads/PostImage/' . $post->image)}}" alt="Image">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="description">Example textarea</label>
                <textarea class="form-control" id="exampleTextarea" name="description" rows="3">{{ $post->description }}</textarea>
            </div>
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
