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
{{ $news->created_at->translatedFormat('l, d F Y')}}
</div>
</div>
</div>

<div class="single-image">
<img class="lazyload" src="{{ asset($news->image)}}">
</div>
 
<div class="single-page-add2">
<div class="themesBazar_widget"> <div class="textwidget"><p><img loading="lazy" class="aligncenter size-full wp-image-74" src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
</div>
</div> </div>
<div class="single-details">
<p>{!! $news->news_details !!}</p>
</div>
<div class="singlePage2-tag">

<!--
<span> Tags : </span>

@foreach($tags_all as $tag)
<a href=" " rel="tag">{{ucwords($tag)}}</a>
@endforeach
-->
</div>



<form action=" " method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">
<div style="display: none;">
 
</div>
</div>

@php
$infographic = App\Models\Infographic::find(1);
@endphp

<div class="col-lg-4 col-md-4">
<div class="infografis_news_detail">
    <div class="infografis">
      <div class="live_image">
        <img src="{{ asset($infographic->infographic_image) }}" class="lazyload">
      </div>
    </div>
  </div>




</div>
<div class="container">
<hr>
</div>

</div>
</div>

<div class="other_news_container">
<div class="more_news_title_news_detail">
<a href="{{ url('/news') }}">Berita Lainnya</a>
</div>
<div class="other_news_details">
<div class="row">


@foreach($newPost as $key=> $newsitem)
<div class="themesBazar-3 themesBazar-m2">
<div class="related-wrpp">
<div class="related-image">
<a href="{{ url('news/details/' . $newsitem->id . '/' . $newsitem->news_title_slug) }}"><img class="lazyload" src="{{asset($newsitem->image)}}"  ></a>
</div>
<h2 class="related-title">
<a href="{{ url('news/details/' . $newsitem->id . '/' . $newsitem->news_title_slug) }}">{{ Str::limit($newsitem->news_title, 80) }}</a>
</h2>
<div class="related-meta">
<p><i class="la la-calendar"> </i>
{{ $newsitem->created_at->translatedFormat('d F Y') }}</p>
</div>
</div>
</div>
@endforeach


</div>
</div>
</div>

</div>
</div>



@endsection