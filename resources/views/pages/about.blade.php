@extends('layouts.app')
@section('content')

<!-- Page Title -->
<div class="page-title">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Kuhusu sisi</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{Route('/')}}">Mwanzo</a></li>
        <li class="current">Kuhusu sisi</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
        
        @if(count($aboutusInfos) > 0)
        @foreach($aboutusInfos as $aboutusInfo)
        <h3>{{ trans($aboutusInfo->title) }}</h3>
        @if(str_word_count($aboutusInfo->description) > 510)
        <p class="fst-italic">
          {!! htmlspecialchars_decode(substr($aboutusInfo->description, 0,510)) !!} ....
          <br><br>
          <a href="{{Route('read_more_about', $aboutusInfo->id)}}" class="readmore"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          <hr>
        </p>
        @else

        {!! htmlspecialchars_decode($aboutusInfo->description) !!}
        </p>
        @endif
        @endforeach
        @endif

        <h3>HUDUMA ZINAZOTOLEWA</h3>
        @if(count($departmentInfos) > 0)
        @foreach($departmentInfos as $departmentInfo)
        @if($departmentInfo->departmentName == 'general')
        <ul>
          <li class="fst-italic"><i class="bi bi-check-circle"></i> <span>{{ $departmentInfo->service }}.</span></li>
        </ul>
        @endif
        @endforeach
        @endif

        <hr>
        @if(count($departmentInform) > 5)

        <a href="{{Route('read_more_about')}}" class="readmore"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

        @endif
      </div>

      <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
        @if(count($pictureInfos) > 0)
        @foreach($pictureInfos as $pictureInfo)
       
        <div class="row gy-4">
          @if($pictureInfo->position == 'left')
          <div class="col-lg-6">
            <img src="{{ asset('storage/uploads/aboutpictures/' .$pictureInfo->picture)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6">
            <div class="row gy-4">
              @elseif($pictureInfo->position == 'top')
              <div class="col-lg-12">
                <img src="{{ asset('storage/uploads/aboutpictures/' .$pictureInfo->picture)}}" class="img-fluid" alt="">
              </div>
              @elseif($pictureInfo->position == 'down')
              <div class="col-lg-12">
                <img src="{{ asset('storage/uploads/aboutpictures/' .$pictureInfo->picture)}}" class="img-fluid" alt="">
              </div>
            </div>
          </div>
          @else
          @endif
        </div>
        @endforeach
        @endif

      </div>

    </div>

  </div>
</section><!-- /About Section -->

<!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <div class="section-title-container d-flex align-items-center justify-content-between">
      <h2>Uongozi</h2>
      <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
    </div>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6 offset-3" data-aos="fade-up" data-aos-delay="100">
        @if(count([$leaderInfos]) > 0)
        @foreach($leaderInfos as $leaderInfo)
        @if($leaderInfo->role == 'waziri')
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>{{$leaderInfo->name}}</h4>
            <span>{{$leaderInfo->designation}}</span>
            <p>{{$leaderInfo->description}}</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endif
      </div><!-- End Team Member -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        @if(count([$leaderInfos]) > 0)
        @foreach($leaderInfos as $leaderInfo)
        @if($leaderInfo->role == 'katibu')
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>{{$leaderInfo->name}}</h4>
            <span>{{$leaderInfo->designation}}</span>
            <p>{{$leaderInfo->description}}</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endif
      </div><!-- End Team Member -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        @if(count([$leaderInfos]) > 0)
        @foreach($leaderInfos as $leaderInfo)
        @if($leaderInfo->role == 'naibu')
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>{{$leaderInfo->name}}</h4>
            <span>{{$leaderInfo->designation}}</span>
            <p>{{$leaderInfo->description}}</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endif
      </div><!-- End Team Member -->

      <!-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/mratibu.webp" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Haji Sheha Khamis</h4>
                <span>Mratibu Idara Maalum</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div> -->
      <!-- End Team Member -->

    </div>

  </div>

</section><!-- /Team Section -->
@endsection