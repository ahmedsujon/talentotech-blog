@extends('layouts.app')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
            @foreach($first2post as $post)
          <a href="{{ route('singlepost', ['slug' => $post->slug]) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $post->image)}}');">
            <div class="text">
              <h2>{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>
        <div class="col-md-4">
        @foreach($middle1posts as $post)
        <a href="{{ route('singlepost', ['slug' => $post->slug]) }}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $post->image)}}');">
            <div class="text">
              <div class="post-categories mb-3">
                <span class="post-category bg-danger">{{ $post->category->name }}</span>
              </div>
              <h2>{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>
        <div class="col-md-4">
        @foreach($last2posts as $post)
          <a href="{{ route('singlepost', ['slug' => $post->slug]) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $post->image)}}');">

            <div class="text">
              <h2>{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach($recentPosts as $post)
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="{{ route('singlepost', ['slug' => $post->slug]) }}"><img src="{{asset('storage/uploads/PostImage/' . $post->image)}}" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name }}</span>
            <h2><a href="{{ route('singlepost', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('app/images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
              <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
            </div>
            <p>{{ Str::limit($post->description, 200) }}</p>
              <p><a href="{{ route('singlepost', ['slug' => $post->slug]) }}">Read More</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row text-center pt-5 border-top">
          {{ $recentPosts->links() }}
        {{-- <div class="col-md-12">
          <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div>
        </div> --}}
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">

        <div class="col-md-5 order-md-2">
            @foreach($footerfirst1post as $footerpost)
          <a href="{{ route('singlepost', ['slug' => $footerpost->slug]) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $footerpost->image)}}');">
            <span class="post-category text-white bg-danger">{{ $footerpost->category->name }}</span>
            <div class="text">
              <h2>{{ $footerpost->title }}</h2>
              <span>{{ $footerpost->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>

        <div class="col-md-7">
            @foreach($footerlast1posts as $footerpost)
          <a href="{{ route('singlepost', ['slug' => $footerpost->slug]) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $footerpost->image)}}');">
            <span class="post-category text-white bg-success">{{ $footerpost->category->name }}</span>
            <div class="text text-sm">
              <h2>{{ $footerpost->title }}</h2>
              <span>{{ $footerpost->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
          <div class="two-col d-block d-md-flex justify-content-between">
            @foreach($footermiddle2posts as $footerpost)
            <a href="{{ route('singlepost', ['slug' => $footerpost->slug]) }}" class="hentry v-height img-2 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $footerpost->image)}}');">
              <span class="post-category text-white bg-primary">{{ $footerpost->category->name }}</span>
              <div class="text text-sm">
                <h2>{{ $footerpost->title }}</h2>
                <span>{{ $footerpost->created_at->format('M d, Y') }}</span>
              </div>
            </a>
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>

@endsection
