@extends('frontend.home_dashboard')
@section('home')


@section('title')
{{ $news->news_title }} | PKBH UNHAS
@endsection

<div class="container">
<div class="news_content">
<div class="row">

<div class="col-lg-7 col-md-7">
<h1 class="single-page-title">
{{$news->news_title}} </h1>
<div class="row g-2">

<div class="col-lg-11 col-md-10">
<div class="viwe-count">
{{ $news->created_at->format('l, d M Y')}}
</div>
</div>
</div>

<div class="single-image">
<a href=" "><img class="lazyload" src="{{ asset($news->image)}}"  ></a>
<h2 class="single-caption2">
{{$news->news_title}}
</h2>
</div>
 
<div class="single-page-add2">
<div class="themesBazar_widget"> <div class="textwidget"><p><img loading="lazy" class="aligncenter size-full wp-image-74" src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
</div>
</div> </div>
<div class="single-details">
<p>{!! $news->news_details !!}</p>
</div>
<div class="singlePage2-tag">
<span> Tags : </span>

@foreach($tags_all as $tag)
<a href=" " rel="tag">{{ucwords($tag)}}</a>
@endforeach
</div>

<div class="single-add">
<div class="themesBazar_widget"> <div class="textwidget"><p><img loading="lazy" class="aligncenter size-full wp-image-74" src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
</div>
</div> </div>

<form action=" " method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">
<div style="display: none;">
 
</div>
</div>

<div class="col-lg-4 col-md-4">
<div class="infografis_news_detail">
    <div class="infografis">
      <h4 class="news_second_section_h2">Infografis</h4>
      <div class="live_image">
        <img src="{{ asset('frontend/assets/images/portfolio/1.jpg') }}" class="lazyload">
      </div>
    </div>
  </div>




</div>
<div class="container">
<hr>
</div>

</div>
</div>

<div class="single_relatedCat">
<a href=" ">Berita Lainnya</a>
</div>
<div class="other_news_details">
<div class="row">

@php
$section_nine = App\Models\NewsPost::where('status', 1)
                                       ->where('first_section_nine', 1)
                                       ->limit(9)
                                       ->get();

@endphp

@foreach($section_nine as $nine)
<div class="themesBazar-3 themesBazar-m2">
<div class="related-wrpp">
<div class="related-image">
<a href=" "><img class="lazyload" src="{{asset($nine->image)}}"  ></a>
</div>
<h2 class="related-title">
<a href="{{ url('news/details/' . $nine->id . '/' . $nine->news_title_slug) }}">{{ Str::limit($nine->news_title, 80) }}</a>
</h2>
<div class="related-meta">
<a href=" "><i class="la la-calendar"> </i>
{{ $nine->created_at->format('d M Y') }}</a>
</div>
</div>
</div>
@endforeach


</div>
</div>

</div>

</div>



@endsection