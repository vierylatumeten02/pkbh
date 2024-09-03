@extends('frontend.home_dashboard')
@section('home') 

@section('title') 
Semua Berita | PKBH UNHAS 
@endsection

<div class="container">
<div class="all_news">

<div class="row">
<h2 class="title-all-news">Semua Berita</h2>

@foreach($showallNews as $key=> $newsitem)
<div class="themesBazar-3 themesBazar-m2">
<div class="related-wrpp">
<div class="related-image">
<a href=" "><img class="lazyload" src="{{asset($newsitem->image)}}"  ></a>
</div>
<h2 class="related-title">
<a href="{{ url('news/details/' . $newsitem->id . '/' . $newsitem->news_title_slug) }}">{{ Str::limit($newsitem->news_title, 80) }}</a>
</h2>
<div class="related-meta">
<a href=" "><i class="la la-calendar"> </i>
{{ $newsitem->created_at->translatedFormat('d F Y') }}</a>
</div>
</div>
</div>
@endforeach

</div>    
</div>
</div>

@endsection