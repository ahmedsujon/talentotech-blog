@extends('layouts.admin')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> User Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">User List</a></li>
    </ul>
  </div>
  <div class="clearix"></div>
  <div class="col-md-12">
    <div class="tile">
    <a style="float:right;" class="btn btn-primary" href="{{ route('users.index')}}">Users List</a>
      <h3 class="tile-title">Add User </h3>
      <div class="tile-body">
      <form action="{{ route('users.store') }}" method="POST" class="row">
        @csrf
          <div class="form-group col-md-6">
            <label class="control-label">Name</label>
            <input class="form-control form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" name="email" placeholder="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Password</label>
            <input class="form-control form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" name="password" placeholder="password" autofocus>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
            {{-- <div class="form-group col-md-6">
                <label for="exampleTextarea">Example textarea</label>
                <textarea class="form-control" id="exampleTextarea" name="description" rows="3"></textarea>
              </div> --}}
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
