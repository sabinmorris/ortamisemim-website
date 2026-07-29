@extends('layouts.app')
@section('content')

<!-- Page Title -->
<div class="page-title">
    <div class="container d-lg-flex justify-content-between align-items-center">

        <h1 class="mb-2 mb-lg-0">
            <!-- Uendeshaji na Utumishi -->
            @if($departmentInfo)
            Idara ya {{$departmentInfo->departmentName}}
            @endif

        </h1>

        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{Route('/')}}">Mwanzo</a></li>
                <li class="current">
                    @if($departmentInfo)
                    {{$departmentInfo->departmentName}}
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-8 content" data-aos="fade-up" data-aos-delay="100">
                <h3>HUDUMA ZINAZOTOLEWA</h3>

                @if(count($depInfos) > 0)
                @foreach($depInfos as $depInfo)
                <ul>
                    <li class="fst-italic"><i class="bi bi-check-circle"></i> <span>{{$depInfo->service}}</span></li>
                </ul>
                @endforeach
                @else
                <ul>
                    <li><i class="bi bi-check-circle"></i> <span>No Data</span></li>
                </ul>
                @endif

                <hr>
                @if(count($departmentInfos) > 1)

                <a href="#" class="readmore"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                @endif
            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container">
                    <!-- Recent Posts Widget -->
                    @include('inc.currentpost')
                    <!--/Recent Posts Widget -->

                    <!-- Recent anouncement -->
                    @include('inc.anouncement')
                    <!--End Recent anouncement -->
                </div>

            </div>

        </div>

    </div>
</section><!-- /About Section -->
@endsection