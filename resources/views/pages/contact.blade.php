@extends('layouts.app')
@section('content')

<!-- <body class="contact-page"> -->



<!-- Page Title -->
<div class="page-title">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Wasiliana Nasi</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{Route('/')}}">Mwanzo</a></li>
        <li class="current">Mawasiliano</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
      <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.3746670074095!2d39.18786073842011!3d-6.1643147317525395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185cd18d6b358993%3A0xed0883ff4b04ec7d!2sOfisi%20ya%20Rais%2C%20Tawala%20za%20Mikoa%20na%20Idara%20Maalum%20za%20SMZ!5e0!3m2!1sen!2stz!4v1739869497540!5m2!1sen!2stz" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <!-- <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    </div><!-- End Google Maps -->

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>2277 Barabara ya Vuga</p>
            <p>70401 Mjini Magharibi </p>
            <p>Unguja</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>+255 7799 925 22 / +255 2422 300 34</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>info@tamisemim.go.tz</p>
          </div>
        </div><!-- End Info Item  php-email-form-->

      </div>

      <div class="col-lg-8">
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <form action="{{Route('send_message')}}" method="POST" enctype="multipart/form-data" class="" data-aos="fade-up" data-aos-delay="200">
          @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Your Full Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" id="infoMessage" name="infoMessage" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center" >
              <button type="submit" style="background-color: #465367; color: white; padding: 10px 30px; border-radius: 4px;">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->

@endsection