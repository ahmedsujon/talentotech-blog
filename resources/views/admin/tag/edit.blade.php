@extends('layouts.admin')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Tag Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active"><a href="{{ route('tag.index') }}">Tag List</a></li>
    </ul>
  </div>
  <div class="clearix"></div>
  <div class="col-md-12">
    <div class="tile">
    <a style="float:right;" class="btn btn-primary" href="{{ route('tag.index')}}">Tag Update</a>
      <h3 class="tile-title">Add Tag </h3>
      <div class="tile-body">
      <form action="{{ route('tag.update', [$tag->id] ) }}" method="POST" class="row">
        @csrf
        @method('PATCH')
          <div class="form-group col-md-4">
            <label class="control-label">Name</label>
            <input class="form-control form-control @error('name') is-invalid @enderror" value="{{ $tag->name }}" type="text" name="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
            <div class="form-group col-md-4">
                <label for="exampleTextarea">Example textarea</label>
                <textarea class="form-control" id="exampleTextarea" name="description" rows="3">{{ $tag->description }}</textarea>
              </div>
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
