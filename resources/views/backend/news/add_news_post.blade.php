@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item active">Tambah Berita</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Tambah Berita</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('store.news.post') }}" enctype="multipart/form-data">
                                            @csrf

                                            <!--<div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Kategori</label>
                                                    <select name="category_id" class="form-select" id="example-select">
                                                            <option>Pilih Kategori</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                            @endforeach
                                                    </select>

                                                </div>
                                            </div> -->

                                            <!--<div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Subcategory</label>
                                                    <select name="subcategory_id" class="form-select" id="example-select">
                                                            <option></option>
                                                            
                                                    </select>
                                                </div>
                                            </div> -->

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Penulis</label>
                                                    <select name="user_id" class="form-select" id="example-select">
                                                            <option>Pilih Penulis</option>
                                                            @foreach($adminuser as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Judul</label>
                                                    <input type="text" name="news_title" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputGroupFile04" class="form-label">Gambar Berita</label>
                                                    <input class="form-control" type="file" name="image" id="image">
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="inputGroupFile04" class="form-label"></label>
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="avatar-l img-thumbnail" alt="news-image">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="inputEmail4" class="form-label">Artikel</label>
                                                    
                                                    <textarea id="default" name="news_details"></textarea>
                                                </div>
                                            </div>

                                            <!--<div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Tags</label>
                                                    <input type="text" name="tags" class="selectize-close-btn">
                                                </div>
                                            </div> -->

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-check mb-2 form-check-primary">
                                                        <input class="form-check-input" type="checkbox" value="1" name="today_highlight" id="customckeck1">
                                                        <label class="form-check-label" for="customckeck1">Today Highlight</label>
                                                    </div>

                                                    <div class="form-check mb-2 form-check-primary">
                                                        <input class="form-check-input" type="checkbox" value="1" name="top_slider" id="customckeck2">
                                                        <label class="form-check-label" for="customckeck2">Slider</label>
                                                    </div>

                                                    <div class="form-check mb-2 form-check-primary">
                                                        <input class="form-check-input" type="checkbox" value="1" name="first_section_nine" id="customckeck4">
                                                        <label class="form-check-label" for="customckeck4">4 Berita Awal</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                news_title: {
                    required : true,
                }, 
            },
            messages :{
                news_title: {
                    required : 'Please Enter News Title',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });


</script>
<!--
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="subcategory_id"]').html('');
                        var d = $('select[name="subcategory_id]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.subcategory_name + '</option>');
                        });
                    },
                });
            } else{
                alert('danger');
            }
        });
    });

</script> -->

@endsection