@extends('frontend.home_dashboard')
@section('home')

@section('title')
PKBH UNHAS
@endsection


<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Konsultasi Hukum di PKBH</div>
                <div class="masthead-heading text-uppercase">Universitas Hasanuddin</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#consultation">Konsultasi Sekarang</a>
            </div>
</header>




<section class="page-section" id="news">

<div class="container">
<div class="row">

<div class="col-lg-7 col-md-7">
<div class="row">
<div class="slider-container">
<div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">

<?php

$news_slider = App\Models\NewsPost::where('status', 1)
                                       ->where('top_slider', 1)
                                       ->limit(3)
                                       ->get();

?>



<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">
@foreach($news_slider as $slider)  
<div class="owl-item" style="width: 506.25px; margin-right: 20px;"><div class="secOne_newsContent">
<div class="sec-one-image">
<a href="{{ url('news/details/' .$slider->id . '/' . $slider->news_title_slug) }} "><img class="lazyload" src="{{asset($slider->image)}}"></a>
<h6 class="sec-small-cat">
</h6>
<h1 class="sec-one-title">
<a href="{{ url('news/details/' .$slider->id . '/' . $slider->news_title_slug) }} "><h4>{{$slider->news_title}}</h4></a>
<div class="news-date">Berita <span>| {{ $slider->created_at->format('d M Y') }}</span></div>
</h1>
</div>
</div></div> 
@endforeach



</div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa-solid fa-angle-left"></i></button>
<button type="button" role="presentation" class="owl-next"><i class="fa-solid fa-angle-right"></i></button></div>

</div>
</div>
</div>
</div>

@php
$today_highlight = App\Models\NewsPost::where('status', 1)
                                       ->where('today_highlight', 1)
                                       ->limit(1)
                                       ->get();
@endphp


<div class="col-lg-4 col-md-4">
<div class="row">
@foreach($today_highlight as $highlight)
<div class="today-highlight-section">  
<div class="owl-item"><div class="secOne_newsContent">
<div class="sec-one-image">
<a href="{{ url('news/details/' .$highlight->id . '/' . $highlight->news_title_slug) }} "><img class="lazyload" src="{{asset($highlight->image)}}"></a>
<h6 class="sec-small-cat">
</h6>
<h1 class="sec-one-title">
<a href="{{ url('news/details/' .$highlight->id . '/' . $highlight->news_title_slug) }} "><h4>{{$highlight->news_title}}</h4></a>
<div class="news-date">Berita <span>| {{ $slider->created_at->format('d M Y') }}</span></div>
</h1>
</div>
</div></div>
</div>
</div>
</div>
</div>
</div>
@endforeach

<div class="container">
<hr class="hr_news">
</div>


<!--<div class="col-lg-5 col-md-5">
 
@php
$section_three = App\Models\NewsPost::where('status', 1)
                                       ->where('first_section_three', 1)
                                       ->limit(3)
                                       ->get();

@endphp

@foreach($section_three as $three)
<div class="secOne-smallItem">
<div class="secOne-smallImg">
<a href="{{ url('news/details/' .$three->id . '/' . $three->news_title_slug) }}"><img class="lazyload" src="{{asset($three->image)}}"  ></a>
<h5 class="secOne_smallTitle">
<a href="{{ url('news/details/' .$three->id . '/' . $three->news_title_slug) }}">{{ $three->news_title }} </a>
</h5>
</div>
</div>
@endforeach 


</div>
</div>-->

<div class="container">
<div class="news_bottom_section">
  <div class="row">

  
<div class="col-lg-7 col-md-7">
<div class="row">
<div class="sec-one-item2">
<div class="row" id="nine_news_section">
<h4 class="news_second_section_h2">Berita</h4>

@php
$section_nine = App\Models\NewsPost::where('status', 1)
                                       ->where('first_section_nine', 1)
                                       ->limit(9)
                                       ->get();

@endphp



@foreach($section_nine as $nine)
<div class="themesBazar-3 themesBazar-m2">
<div class="sec-one-wrpp2">
<div class="secOne-news">
<h4 class="secOne-title2">
<a href="{{ url('news/details/' . $nine->id . '/' . $nine->news_title_slug) }}">{{ Str::limit($nine->news_title, 50) }}</a>
</h4>
</div>
<div class="cat-meta">
<a href=" "> <i class="lar la-newspaper"></i>
{{ $nine->created_at->format('d M Y') }}
</a>
</div>
</div>
</div>
@endforeach

</div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-4">
  <div class="row">
    <div class="infografis">
      <h4 class="news_second_section_h2">Infografis</h4>
      <div class="live_image">
        <img src="{{ asset('frontend/assets/images/portfolio/1.jpg') }}" class="lazyload">
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
</section>


<section id="team-section">
<div class="container">
<div class="section-two">
<div class="container">
<div class="secTwo-color">
<div class="row">
  <div class="col-md-6 how-img">
    <img src="{{asset('frontend/assets/images/team/team-photo.jpg')}}" alt=""/>
  </div>
  <div class="col-md-6">
    <p class="text-muted">Freedom to work on ideal projects. On GetLance, you run your own business and choose your own clients and projects. Just complete your profile and we’ll highlight ideal jobs. Also search projects, and respond to client invitations. Wide variety and high pay. Clients are now posting jobs in hundreds of skill categories, paying top price for great work.
                                            More and more success. The greater the success you have on projects, the more likely you are to get hired by clients that use GetLance.</p>
  </div>
</div>
</div>
</div>
</div>
</div>

<div class="container">
<hr class="hr_team">
</div>

<!-- Team 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8">
    <div class="container overflow-hidden">
    <div class="row gy-4 gy-lg-0 gx-xxl-5">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{asset('frontend/assets/images/profile_photo.png')}}" alt="Flora Nyra">
              <figcaption class="m-0 p-4">
                <h5 class="mb-1"> Dr. Muhammad Aswan, S.H., M.kn.</h5>
                <p class="text-secondary mb-0">Kepala PKBH Unhas</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{asset('frontend/assets/images/profile_photo.png')}}" alt="Evander Mac">
              <figcaption class="m-0 p-4">
                <h5 class="mb-1">Hadi Shafitra</h5>
                <p class="text-secondary mb-0">Publikasi</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{asset('frontend/assets/images/profile_photo.png')}}" alt="Taytum Elia">
              <figcaption class="m-0 p-4">
                <h5 class="mb-1">Ikhsan</h5>
                <p class="text-secondary mb-0">Administrasi</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{asset('frontend/assets/images/profile_photo.png')}}" alt="Wylder Elio">
              <figcaption class="m-0 p-4">
                <h5 class="mb-1">Ilham</h5>
                <p class="text-secondary mb-0">Paralegal</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</section>

<section  id="client">
<div class="container">
<div class="section-three">
<div class="secThree-color">

<div class="row">
  <h3 class="h3_client">Klien</h3>
</div>

<div class="client-content">

<div class="row">
<div class="col-lg-6 col-md-6">
<div class="client_left">
<h6 class="h6_client">TECHNOLOGY COMPANY</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

<div>
<h6 class="h6_client">PROPERTY & HOSPITALITY</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

<div>
<h6 class="h6_client">BANKING & FINANCIAL SERVICES</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

<div>
<h6 class="h6_client">OTHER</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

</div>

<div class="col-lg-6 col-md-6">
<div class="client_left">
<div>
<h6 class="h6_client">CORPORATION</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

<div>
<h6 class="h6_client">FOOD & BEVERAGES</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

<div>
<h6 class="h6_client">RETAIL & PRODUCT</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

<div>
<h6 class="h6_client">Technology Company</h2>
<p class="p_client_content">Bukalapak, sdksadasd, adajssa </p>
</div>

</div>
</div>

</div>





</div>
</div>
</div>
<div class="containter">
<hr>
</div>
</div>


</section>


<section id="consultation">
  <div class="form-container">
        <form>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Handphone *</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">Nama Depan</label>
                    <input type="text" id="first-name" name="first-name">
                </div>
                <div class="form-group">
                    <label for="last-name">Nama Belakang</label>
                    <input type="text" id="last-name" name="last-name">
                </div>
            </div>
            <div class="form-group">
                <p>Hal apa yang hendak dikonsultasikan?</p>
                <textarea id="features" name="features" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group button-container">
                <button type="submit">Kirim Sekarang</button>
            </div>
        </form>
    </div>

</section>


@endsection