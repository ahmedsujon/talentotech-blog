@extends('layouts.app')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('storage/uploads/PostImage/' . $posts->image)}}')">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="post-entry text-center">
            <span class="post-category text-white bg-success mb-3">{{ $posts->category->name }}</span>
            <h1 class="mb-4"><a href="javascript:void()">{{ $posts->title }}</a></h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset($posts->user->image) }}" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By {{ $posts->user->name }}</span>
            <span>&nbsp;-&nbsp; {{ $posts->created_at->format('M d, Y') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="site-section py-lg">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
              {!! $posts->description !!}
          </div>


          <div class="pt-5">
            <p>Categories:  <a href="#">{{ $posts->category->name }}</a>
                @if($posts->tags()->count() > 0)
                    Tags:
                    @foreach($posts->tags as $tag)
                    <a href="#">#{{$tag->name}}</a>,
                    @endforeach
                @endif
          </div>

          <div class="pt-5">
            <h3 class="mb-5">6 Comments</h3>
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
                @comments(['model' => $posts])
            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center">
              <img src="{{ $posts->user->image }}" alt="Image Placeholder" class="img-fluid mb-5">
              <div class="bio-body">
                <h2>{{ $posts->user->name }}</h2>
                <p class="mb-4">{{ $posts->user->description }}</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
                  @foreach($siderbarposts as $siderbarpost)
                <li>
                  <a href="">
                    <img src="{{asset('storage/uploads/PostImage/' . $siderbarpost->image)}}" alt="Image placeholder" class="mr-4">
                    <div class="text">
                      <h4>{{ $siderbarpost->title }}</h4>
                      <div class="post-meta">
                        <span class="mr-2">{{ $siderbarpost->created_at->format('M d, Y') }} </span>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
                @foreach($categories as $category)
              <li><a href="#">{{ $category->name }} <span>(12)</span></a></li>
              @endforeach
            </ul>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul class="tags">
                @foreach($tags as $tag)
              <li><a href="#">{{ $tag->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row mb-5">
        <div class="col-12">
          <h2>More Related Posts</h2>
        </div>
      </div>

      <div class="row align-items-stretch retro-layout">

        <div class="col-md-5 order-md-2">
        @foreach ($relatedlast1posts as $post)
          <a href="{{ route('singlepost', ['slug' => $post->slug]) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $post->image)}}');">
            <span class="post-category text-white bg-danger">Travel</span>
            <div class="text">
              <h2>{{ $post->title }}</h2>
              <span>{{ $post->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>

        <div class="col-md-7">
        @foreach ($relatedfirst1posts as $post)
        <a href="{{ route('singlepost', ['slug' => $post->slug]) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $post->image)}}');">
            <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
            <div class="text text-sm">
              <h2>{{ $post->title }}</h2>
              <span>{{ $post->created_at->format('M d, Y') }}</span>
            </div>
          </a>
        @endforeach
          <div class="two-col d-block d-md-flex justify-content-between">
            @foreach ($relatedmiddle2posts as $post)
            <a href="{{ route('singlepost', ['slug' => $post->slug]) }}" class="hentry v-height img-2 gradient" style="background-image: url('{{asset('storage/uploads/PostImage/' . $post->image)}}');">
              <span class="post-category text-white bg-primary">{{ $post->category->name }}</span>
              <div class="text text-sm">
                <h2>{{ $post->title }}</h2>
                <span>{{ $post->created_at->format('M d, Y') }}</span>
              </div>
            </a>
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection
