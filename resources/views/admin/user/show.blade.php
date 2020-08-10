@extends('layouts.admin')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> User Profile</h1>
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
      <h3 class="tile-title">Add User </h3>
      <div class="tile-body">
      <form action="{{ route('user.profile.update') }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
          <div class="form-group col-md-6">
            <label class="control-label">Name</label>
            <input class="form-control form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" type="text" name="name" placeholder="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" type="text" name="email" placeholder="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Password <small style="color: coral">[Enter password if you want to change]</small></label>
            <input class="form-control form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" name="password" placeholder="password" autofocus>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="image">Upload Image</label>
            <input class="form-control-file" id="image" name="image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
          </div>
          <div class="form-group col-md-2">
            <img style="height: 100px; border-radius: 11px; width: 130px;;" src="{{$user->image}}">
          </div>
            <div class="form-group col-md-12">
                <label for="exampleTextarea">Example textarea</label>
                <textarea class="form-control" id="exampleTextarea" name="description" rows="3">{{ $user->description }}</textarea>
            </div>
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
