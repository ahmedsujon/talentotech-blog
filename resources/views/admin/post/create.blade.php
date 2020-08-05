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
      <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Post List</a></li>
    </ul>
  </div>
  <div class="clearix"></div>
  <div class="col-md-12">
    <div class="tile">
    <a style="float:right;" class="btn btn-primary" href="{{ route('post.index')}}"> PostList</a>
      <h3 class="tile-title">All Post </h3>
      <div class="tile-body">
      <form action="{{ route('post.store') }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
          <div class="form-group col-md-6">
            <label class="control-label">Title</label>
            <input class="form-control form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" type="text" name="title" placeholder="Post title" autofocus>
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
                    <option value="{{$category->id}}" @if(old('category_id'))=='1' ) {{ 'selected' }} @endif>
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input class="form-control-file" id="image" name="image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>


            <div class="form-group col-md-12">
            <label for="tag">Select Tags</label>
            @foreach($tags as $tag)
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                </div>
            @endforeach
            </div>
            <div class="form-group col-md-12">
                <label for="description">Example textarea</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
