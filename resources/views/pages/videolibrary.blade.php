@extends('layouts.app')
@section('content')

<!-- Page Title -->
<div class="page-title position-relative">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Maktaba ya Video</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{Route('/')}}">Mwanzo</a></li>
                <li class="current">Videos</li>
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

                        @if(count([$videoInfos]) > 0)
                        @foreach($videoInfos as $videoInfo)
                        @if($videoInfo->status == 1)
                        <div class="col-lg-6">
                            <article class="position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <iframe class="col-lg-12 img-fluid" src="{{$videoInfo->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <span class="post-date">{{$videoInfo->created_at->diffForHumans()}}</span>
                                </div>

                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">{{$videoInfo->tittle}}</h3>
                                </div>
                            </article>
                        </div><!-- End post list item -->
                        @endif
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
                            <li>{{$videoInfos->links()}}</li>

                        </ul>
                    </div>
                </div>

            </section>
            <!-- /End Blog Pagination Section -->

            <!-- Blog Pagination Section -->
            <!-- <section id="blog-pagination" class="blog-pagination section">

                <div class="container">
                    <div class="d-flex justify-content-center">
                        <ul>
                            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">10</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </section> -->
            <!-- /Blog Pagination Section -->

        </div>

        <div class="col-lg-4 sidebar">

            <div class="widgets-container">

                <!-- Blog Author Widget 2 -->
                @include('inc.waziriwidget')
                <!--/Blog Author Widget 2 -->

                <!-- Recent Video Widget -->
                @include('inc.currentvideo')
                <!--/Recent Video Widget -->
            </div>

        </div>

    </div>
</div>
@endsection