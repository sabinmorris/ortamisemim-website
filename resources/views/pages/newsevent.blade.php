@extends('layouts.app')
@section('content')

<!-- Page Title -->
<div class="page-title position-relative">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Habari Matukio</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{Route('/')}}">Mwanzo</a></li>
        <li class="current">Habari Matukio</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<div class="container">
  <div class="row">


    <div class="col-lg-8">

      <!-- Blog Posts Section -->
      <section id="blog-posts" class="blog-posts section">

        <div class="container">
          <div class="row gy-4">
            @if(count($postInfos) > 0)
            @foreach($postInfos as $postInfo)

            <div class="col-lg-6">
              <article class="position-relative h-100">

                <div class="post-img position-relative overflow-hidden">
                  <img src="{{ asset('storage/uploads/post_images/'.$postInfo->post_image)}}" class="img-fluid" alt="">
                  <span class="post-date">{{$postInfo->created_at->diffForHumans()}}</span>
                </div>

                <div class="post-content d-flex flex-column">

                  <h3 class="post-title">{{$postInfo->post_tittle}}</h3>
                  @if(substr($postInfo->post_description, 0,200))
                  <p>
                    {!! htmlspecialchars_decode(substr($postInfo->post_description, 0,255)) !!}
                    <hr>
                    <a href="{{Route('read_more', $postInfo->id)}}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                  </p>
                  @else
                  {!! htmlspecialchars_decode($postInfo->post_description) !!}
                  @endif
                </div>
              </article>
            </div>
            <!-- End post list item -->
            @endforeach
            @endif
          </div>
        </div>

      </section><!-- /Blog Posts Section -->

      <!-- Blog Pagination Section -->
      <section id="blog-pagination" class="blog-pagination section">

        <div class="container">
          <div class="d-flex justify-content-center">
            <ul>
              <li>{{$postInfos->links()}}</li>

            </ul>
          </div>
        </div>

      </section>
      <!-- /End Blog Pagination Section -->

    </div>
    <div class="col-lg-4 sidebar">
      <div class="widgets-container">
        <!-- Blog Author Widget 2 -->
        @include('inc.waziriwidget')
        <!--/Blog Author Widget 2 -->
        
        <!--/Search Widget -->
        <!-- Recent Posts Widget -->
        @include('inc.currentvideo')
        <!--/Recent Posts Widget -->
      </div>
    </div>

  </div>
</div>
@endsection