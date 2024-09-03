@extends('frontend.home_dashboard')
@section('home') 

@section('title') 
Klien | PKBH UNHAS 
@endsection

<div class="client_container">
<div class="container">

<div class="row">
  <h3 class="h3_client">Klien</h3>
</div>

@php
$categories = App\Models\Category::get();
$subcategories = App\Models\Subcategory::get();
@endphp

<div class="client-content">
<div class="container">
<div class="row">
@foreach ($categories as $category)
                        <div class="col-lg-6 col-md-6" id="client_box">
                            <h6 class="h6_client">{{ $category->category_name }}</h6>
                            <div class="p_client_content">
                                @foreach ($category->subcategories as $subcategory)
                                    <p>{{ $subcategory->subcategory_name }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
    </div>
    </div>

</div>
</div>

</div>





</div>

<div class="containter">
</div>
</div>

</div>

@endsection