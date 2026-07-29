@extends('layouts.app')
@section('content')

<!-- Page Title -->
<div class="page-title">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Uongozi</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{Route('/')}}">Mwanzo</a></li>
                <li class="current">Uongozi wa Or-tamisemim</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Team Section -->
<section id="team" class="team section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
            <h2 translate="no">Or-Tamisemim</h2>
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

        <div class="row">
            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    @if(count([$leaderInfos]) > 0)
                    @foreach($leaderInfos as $leaderInfo)
                    @if($leaderInfo->role == 'mwenyekiti-wa-tume')
                    <div class="team-member d-flex align-items-start">
                        <div class="member-info">
                            <h4>{{$leaderInfo->name}}</h4>
                            <span>{{$leaderInfo->designation}}</span>
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
                </div>
                <!-- End Team Member -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    @if(count([$leaderInfos]) > 0)
                    @foreach($leaderInfos as $leaderInfo)
                    @if($leaderInfo->role == 'katibu-tume')
                    <div class="team-member d-flex align-items-start">
                        <div class="member-info">
                            <h4>{{$leaderInfo->name}}</h4>
                            <span>{{$leaderInfo->designation}}</span>
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
                </div>
                <!-- End Team Member -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    @if(count([$leaderInfos]) > 0)
                    @foreach($leaderInfos as $leaderInfo)
                    @if($leaderInfo->role == 'mk-utmishi')
                    <div class="team-member d-flex align-items-start">
                        <div class="member-info">
                            <h4>{{$leaderInfo->name}}</h4>
                            <span>{{$leaderInfo->designation}}</span>
                            <!-- <p><i class="bi bi-telephone"> +255 773 846 339</i></p> -->
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
                    @if($leaderInfo->role == 'mk-mipango')
                    <div class="team-member d-flex align-items-start">
                        <div class="member-info">
                            <h4>{{$leaderInfo->name}}</h4>
                            <span>{{$leaderInfo->designation}}</span>
                            <!-- <p><i class="bi bi-telephone"> +255 777 226 640</i></p> -->
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
                    @if($leaderInfo->role == 'mk-uratibu')
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"></div>
                        <div class="member-info">
                            <h4>{{$leaderInfo->name}}</h4>
                            <span>{{$leaderInfo->designation}}</span>
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
                    @if($leaderInfo->role == 'mratibu')
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"></div>
                        <div class="member-info">
                            <h4>{{$leaderInfo->name}}</h4>
                            <span>{{$leaderInfo->designation}}</span>
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
        </div>

    </div>

</section><!-- /Team Section -->


<!-- Team Section -->
<section id="team" class="team section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
            <h2>Mikoa</h2>
            <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
        </div>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6 offset-3" data-aos="fade-up" data-aos-delay="100">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-mkoa-mjini')
                <div class="team-member d-flex align-items-start">
                    <div class="pic"></div>
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
                @if($leaderInfo->role == 'm-mkoa-kusini-unguja')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
                @if($leaderInfo->role == 'm-mkoa-kaskazini-unguja')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-mkoa-kusini-pemba')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
            </div>
            <!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-mkoa-kaskazini-pemba')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->name}}</span>
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
            </div>
            <!-- End Team Member -->
        </div>

    </div>

</section><!-- /Team Section -->

<!-- Team Section -->
<section id="team" class="team section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
            <h2>Wilaya</h2>
        </div>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-wilaya-mjini')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
                @if($leaderInfo->role == 'm-wilaya-magharib-a')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
                @if($leaderInfo->role == 'm-wilaya-magharib-b')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-wilaya-kati')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
            </div>
            <!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-wilaya-kusini-unguja')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
            </div>
            <!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-wilaya-kaskazini-unguja')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
            </div>
            <!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-wilaya-chakechake')
                <div class="team-member d-flex align-items-start">
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
            </div>
            <!-- End Team Member -->
        </div>

    </div>

</section><!-- /Team Section -->

<!-- Team Section -->
<section id="team" class="team section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
            <h2>Idara Maalum</h2>
            <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
        </div>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 offset-3" data-aos="fade-up" data-aos-delay="100">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-kikosi-kmkm')
                <div class="team-member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
                @if($leaderInfo->role == 'm-kikosi-jku')
                <div class="team-member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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
                @if($leaderInfo->role == 'm-kikosi-kvz')
                <div class="team-member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-kokosi-mafunzo')
                <div class="team-member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfo->designation}}</span>
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

            </div>
            <!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                @if(count([$leaderInfos]) > 0)
                @foreach($leaderInfos as $leaderInfo)
                @if($leaderInfo->role == 'm-kikosi-faya')
                <div class="team-member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('storage/uploads/leader_images/' .$leaderInfo->leader_image)}}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{$leaderInfo->name}}</h4>
                        <span>{{$leaderInfos->designation}}</span>
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
            </div>
            <!-- End Team Member -->
        </div>

    </div>

</section><!-- /Team Section -->

@endsection