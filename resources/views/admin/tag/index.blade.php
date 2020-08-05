@extends('layouts.admin')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Categolry Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('tag.create') }}">Create Tag</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
          <a style="float:right;" class="btn btn-primary" href="{{ route('tag.create')}}">Create Tag</a>
            <h3>Tag List</h3>
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $tag)
                <tr>
                  <td>{{ $tag->id }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>{{ $tag->description }}</td>
                  <td>{{ $tag->created_at }}</td>
                  <td>{{ $tag->updated_at }}</td>
                  <td>
                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary btn-sm mr-3">Edit</a>
                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST"
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
