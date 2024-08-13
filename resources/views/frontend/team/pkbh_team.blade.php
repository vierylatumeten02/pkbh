@extends('frontend.home_dashboard')
@section('home') 

@section('title') 
Tim PKBH | PKBH UNHAS 
@endsection

<div class="container">
<div class="team_container">
<div class="section-two">
<div class="container">
<div class="secTwo-color">

@php
$aboutus = App\Models\AboutUs::find(1);
@endphp
<div class="row">
  <div class="col-md-6 how-img">
    <img src="{{ asset($aboutus->team_photo) }}" alt=""/>
  </div>
  <div class="col-md-6">
    <div class="text-muted">
    <p>{!! $aboutus->team_description !!}</p>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<div class="container">
<hr class="hr_team">
</div>

@php
$team_list = App\Models\TeamMember::where('status',1)->get();
@endphp

<!-- Team 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8">
    <div class="container overflow-hidden">
    <div class="row gy-4 gy-lg-0 gx-xxl-5">
      
    @foreach($team_list as $list)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{asset($list->photo)}}" alt="Flora Nyra">
              <figcaption class="m-0 p-4">
                <h5 class="mb-1"> {{ $list->name }}</h5>
                <p class="text-secondary mb-0">{{ $list->department }}</p>
              </figcaption>
            </figure>
          </div>
        </div>
    </div>
    @endforeach
      
    </div>
  </div>
  </div>

  @endsection