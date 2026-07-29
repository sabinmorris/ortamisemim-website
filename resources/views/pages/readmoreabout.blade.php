@extends('layouts.app')
@section('content')

<!-- Page Title -->
<div class="page-title">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Kuhusu</h1>
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
        <!-- <p class="who-we-are">Who We Are</p> -->
        <p class="who-we-are">Sisi ni nani</p>
        @if(count([$aboutusInfos]) > 0)
        @foreach($aboutusInfos as $aboutusInfo)
        @if($aboutusInfo->status == 1)
        <h3>{{$aboutusInfo->title}}</h3>
        <p class="fst-italic">
          {{$aboutusInfo->description}}
        </p>
        @endif
        @endforeach
        @endif
        <h3>HUDUMA ZINAZOTOLEWA</h3>
        
        @if(count($departmentInfos) > 0 )
        @foreach($departmentInfos as $departmentInfo)
        @if($departmentInfo->departmentName == 'general' )

        <ul>
          <li class="fst-italic"><i class="bi bi-check-circle"></i> <span>{{$departmentInfo->service}}</span></li>
        </ul>
        @endif
        @endforeach
        @endif

      </div>

      <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
      @if(count([$pictureInfos]) > 0)
        @foreach($pictureInfos as $pictureInfo)
        @if($pictureInfo->status == 1)
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
        @endif
        @endforeach
        @endif
      </div>

    </div>

  </div>
</section>
<!-- /End About Section -->

<!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <div class="section-title-container d-flex align-items-center justify-content-between">
      <h2>Viongozi</h2>
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
        </div>

    <!-- <div class="row gy-4">

      <div class="col-lg-6 offset-3" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/waziri-masoud.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Masoud Ali Suleiman</h4>
            <span>Waziri Or-tamisemim</span>
            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/katibu-mkuu-issa.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Issa Mahafoudh</h4>
            <span>Katibu Mkuu</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/naibu-katibu-mikidadi.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Mikidadi Mbarouk Mzee</h4>
            <span>Naibu Katibu</span>
            <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div>

    </div> -->

  </div>

</section>
<!-- /End Team Section -->
@endsection