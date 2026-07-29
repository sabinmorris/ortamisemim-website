@extends('layouts.app')
@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Habari</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{Route('/')}}">Mwanzo</a></li>
        <li class="current">Habari kuu</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<div class="container">
  <div class="row">

    <div class="col-lg-8">

      <!-- Blog Details Section -->
      <section id="blog-details" class="blog-details section">
        <div class="container">
          
          <article class="article">

            <div class="post-img">
              <img src="{{ asset('storage/uploads/post_images/' .$postInfo->post_image)}}" alt="" class="img-fluid">
            </div>

            <h2 class="title">{{$postInfo->post_tittle}}</h2>

            <div class="content">
              <p>
                {{$postInfo->post_description}}
              </p>
            </div><!-- End post content -->
            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{ $postInfo->created_at->diffForHumans() }}</time></li>
              <li><span style="float: right;"><i class="bi bi-people"></i>{{$postInfo->view_count}}</span></li>
              </ul>
              
            </div>
            <!-- End meta top -->
          </article>

        </div>
      </section><!-- /End Blog Details Section -->

    </div>

    <div class="col-lg-4 sidebar">

      <div class="widgets-container">

        <!-- Recent Posts Widget -->
        @include('inc.currentpost')
        <!--/Recent Posts Widget -->

        <!-- Recent Video Widget -->
        @include('inc.currentvideo')
        <!--/Recent Video Widget -->

      </div>

    </div>

  </div>
</div>
@endsection