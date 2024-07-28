@extends('frontend.home_dashboard')
@section('home') 

@section('title') 
Seach Page 
@endsection


<div class="container">
<div class="search_content">
 <div class="row">
<div class="col-lg-8 col-md-8">
<div class="rachive-info-cats">
<a href=" "></a> Pencarian: {{ $item }}
</div>

<div class="row">

@foreach($news as $item)
<div class="archive1-custom-col-3">
<div class="archive-item-wrpp2">
<div class="archive-shadow arch_margin">
<div class="archive1_image2">
<a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ asset($item->image) }}"  ></a>
<div class="archive1-meta">
<a href=" "><i class="la la-calendar"> </i>
{{ $item->created_at->format('M d Y') }}
</a>
</div>
</div>
<div class="archive1-padding">
<div class="archive1-title2"><a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }} ">{{ Str::limit($item->news_title, 73) }}</a></div>
</div>
</div>
</div>
</div>
@endforeach






</div>


<!-- <div class="row">
<div class="col-md-12">
<span aria-current="page" class="page-numbers current">1</span>
<a class="page-numbers" href=" ">2</a>
<a class="next page-numbers" href=" ">Next »</a>
</div>
</div> -->

<br><br>

<div class="row">
<div class="col-lg-12 col-md-12"></div>
</div>
</div>



</div>
</div>
</div>




@endsection