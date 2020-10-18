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
        <table class="table table-hover table-bordered">
            <tbody>
              <tr>
                  <th>Author Name</th>
                    <td>{{ $post->user->name }}</td>
              </tr>
              <tr>
                <th>Title</th>
                <td>{{ $post->title }}</td>
              </tr>
            <tr>
                <th>Category Name</th>
                <td>{{ $post->category->name }}</td>
            </tr>
            <tr>
                 <th>Tags Name</th>
                <td>
                    @foreach($post->tags as $tag)
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{!! $post->description !!}</td>
            </tr>
            <tr>
                <th style="height:100px;">Image</th>
                <td><img style="    height: 135px; border-radius: 20px;" src="{{asset('storage/uploads/PostImage/' . $post->image)}}"></td>
            </tr>
            </tbody>
          </table>
    </div>
  </div>
@endsection
