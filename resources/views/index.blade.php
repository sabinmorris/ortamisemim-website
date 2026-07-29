@extends('layouts.app')
@section('content')

<!-- Slider Section -->
@if(!request()->has('q'))
<section id="slider" class="slider section dark-background">

  <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
  <div id="wowslider-container1">

    <div class="ws_images">
      @if(count($slideInfos) > 0)
      @foreach($slideInfos as $slideInfo )
      <ul>
        <li><img src="{{ asset('storage/uploads/slide_images/' .$slideInfo->slide_image)}}" alt="{{$slideInfo->tittle}}" title="{{$slideInfo->tittle}}"
            id="wows1_0" />{{$slideInfo->caption}}.
        </li>
      </ul>
      @endforeach
      @endif
    </div>

    <div class="ws_bullets">
      <div>
        @if(count($slideInfos) > 0)
        @foreach($slideInfos as $slideInfo )
        <a href="#" title="{{$slideInfo->tittle}}"></a>
        @endforeach
        @endif
      </div>
    </div>
    <div class="ws_shadow"></div>
  </div>
</section><!-- /Slider Section -->
@endif


<!-- Culture Category Section -->
<section id="culture-category" class="culture-category section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <div class="section-title-container d-flex align-items-center justify-content-between">
      <h5 translate="no" style="font-weight: bold;">OR-TAMISEMIM-HABARI</h5>
      <p><a href="{{Route('events')}}" style="font-weight: bold;">Angali Habari Zote</a></p>
    </div>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-md-8">
        @if(count([$postInfos1]) > 0)
        @foreach($postInfos1 as $postInfo)
        <div class="d-lg-flex post-entry">
          <a href="{{Route('read_more', $postInfo->id)}}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
            <img src="{{ asset('storage/uploads/post_images/' .$postInfo->post_image)}}" alt="" class="img-fluid">
          </a>
          <div>
            <div class="post-meta fst-italic"><span class="date">Post</span> <span class="mx-1">•</span> <span>{{$postInfo->created_at->diffForHumans()}}</span> <span style="float: right;"><i class="bi bi-people"></i>{{$postInfo->view_count}}</span></div>
            <h6 style="font-weight: bold; font-size: 16px;" ><a href="{{Route('read_more', $postInfo->id)}}" class="fst-italic">{{$postInfo->post_tittle}}</a></h6>
            @if(substr($postInfo->post_description, 0,200))
            <p class="fst-italic">
              {!! htmlspecialchars_decode(substr($postInfo->post_description, 0,255)) !!}
              <hr>
              <!-- class="stretched-link" this class used to keep all page linke with one linke addres define within -->
              <a href="{{Route('read_more', $postInfo->id)}}" class="readmore"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

            </p>
            @else
            {!! htmlspecialchars_decode($postInfo->post_description) !!}
            <hr>
            </p>
            @endif
          </div>
        </div>
        @endforeach
        @endif

        <!-- Minister discription -->
         @if(!request()->has('q'))
        @if(count([$ministerInfos]) > 0)
        @foreach($ministerInfos as $ministerInfo)
        
        <div class="row">
          <div class="col-lg-4">
            <div class="post-list border-bottom fst-italic">
              <a href="single-post.html#"><img src="{{ asset('storage/uploads/minister_images/' .$ministerInfo->minister_image)}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Post</span> <span class="mx-1">•</span> <span>{{$ministerInfo->created_at->diffForHumans()}}</span></div>
              <p class="mb-2" style="font-weight: bold; font-size: 16px;">{{ $ministerInfo->minister_title }}</p>
              <span class="author mb-3 d-block">{{$ministerInfo->minister_name}}</span>
            </div>
          </div>

          <div class="col-lg-8" style="margin-top: 0px;">
            <div class="post-list">
              <p class="mb-4 d-block fst-italic">{{$ministerInfo->description}}</p>
            </div>
          </div>
        </div>
        @endforeach
        @endif
        @endif

      </div>

      <div class="col-md-4">
        <!-- Recent Posts Widget -->
        @include('inc.currentpost')

        <!--/Recent Posts Widget -->

        <!-- Recent Video Widget -->
        @include('inc.currentvideo')
        <!--/Recent Video Widget -->

        <!-- Recent anouncement -->
        @include('inc.anouncement')
        <!--End Recent anouncement -->
      </div>
    </div>

  </div>

</section><!-- /Culture Category Section -->

@endsection