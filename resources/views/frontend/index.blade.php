@extends('frontend.home_dashboard')
@section('home')

@section('title')
PKBH UNHAS
@endsection


@php
$homepageimg = App\Models\HomepageImg::find(1);
@endphp
<header class="masthead" style="background-image: url('{{ asset($homepageimg->top) }}');">
            <div class="container">
                <div class="masthead-subheading">‎</div>
                <div class="masthead-heading text-uppercase">‎</div>
                <div class="masthead-heading text-uppercase">‎</div>
            </div>
            <div class="button_container">
                <div class="col lg-4 md-4" id="consult_button">
                    <a class="btn btn-primary btn-xl" href="#consultation">Konsultasi Sekarang</a>
                </div>
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
<h6 class="sec-small-cat"></h6>
<h1 class="sec-one-title">
<a href="{{ url('news/details/' .$slider->id . '/' . $slider->news_title_slug) }} "><h4>{{$slider->news_title}}</h4></a>
<div class="news-date">Berita <span>| {{ $slider->created_at->translatedFormat('d F Y') }}</span></div>
</h1>
</div>
</div>
</div> 
@endforeach

</div>
</div>
<div class="owl-nav">
    <button type="button" role="presentation" class="owl-prev"><i class="fa-solid fa-angle-left"></i></button>
    <button type="button" role="presentation" class="owl-next"><i class="fa-solid fa-angle-right"></i></button>
</div>

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


<div class="col-lg-4 col-md-3" id="today-highlight">
@foreach($today_highlight as $highlight)
<div class="today-highlight-section">  
<div class="owl-item"><div class="secOne_newsContent">
<div class="sec-one-image">
<a href="{{ url('news/details/' .$highlight->id . '/' . $highlight->news_title_slug) }} "><img class="lazyload" src="{{asset($highlight->image)}}"></a>
<h1 class="sec-one-title">
<a href="{{ url('news/details/' .$highlight->id . '/' . $highlight->news_title_slug) }} "><h4>{{$highlight->news_title}}</h4></a>
<div class="news-date">Berita <span>| {{ $slider->created_at->translatedFormat('d F Y') }}</span></div>
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

<div class="container">
<div class="news_bottom_section">
<div class="row">

<div class="col-lg-7 col-md-7">
<div class="row">
<div class="sec-one-item2">
<div class="row">
<h4 class="news_second_section_h2"> Berita</h4>


@php
$section_nine = App\Models\NewsPost::where('status', 1)
                                       ->where('first_section_nine', 1)
                                       ->limit(4)
                                       ->get();

@endphp

@foreach($section_nine as $nine)
<div class="container">
<div class="secOne-smallItem">
<div class="secOne-smallImg">
<a href="{{ url('news/details/' . $nine->id . '/' . $nine->news_title_slug) }} ">
<img class="lazyload" src="{{asset($nine->image)}}"></a>
<div class="title_holder">
<h5 class="secOne_smallTitle">
<a href="{{ url('news/details/' . $nine->id . '/' . $nine->news_title_slug) }} ">{{ Str::limit($nine->news_title, 80) }} </a>
</h5>
<h6 class="news_date">
<i class="lar la-calendar"></i>
{{ $nine->created_at->translatedFormat('d F Y') }}
</h6>

</div>
</div>
</div>
</div>
@endforeach

<h4 class="themesBazar_cat01"><span> <a href="{{url('news/')}}">Selengkapnya <i class="las la-arrow-circle-right"></i> </a></span> </h4>

</div>
</div>
</div>
</div>

@php
$infographic = App\Models\Infographic::find(1);
@endphp

<div class="col-lg-4 col-md-3">
  <div class="row">
    <div class="infografis">
      <h4 class="news_second_section_h2">Infografis</h4>
      <div class="live_image">
        <img src="{{ asset($infographic->infographic_image) }}" class="lazyload">
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
</section>

<div class="container">
<hr class="hr_news">
</div>

<section id="consultation">
  <div class="title_konsultasi">
  <h2>Form Konsultasi</h2>
  </div>
  <div class="form-container">
        <form method="post" action="{{ route('store.message') }}">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">Nama Depan</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Nama Belakang</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <p>Hal apa yang hendak dikonsultasikan?</p>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group button-container">
                <button type="submit">Kirim Sekarang</button>
            </div>
        </form>
    </div>

</section>


@endsection