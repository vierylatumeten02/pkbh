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
                                    <h4 class="page-title">Update Infografis</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('update.infographics') }}" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $infographic->id }}">

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputGroupFile04" class="form-label">Ukuran 810px x 1084px</label>
                                                    <input class="form-control" type="file" name="infographic_image" id="image">
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                <label for="inputGroupFile04" class="form-label"></label>
                                                <img id="showImage" src="{{ (!empty($infographic->infographic_image)) ? url($infographic->infographic_image): url('upload/no_image.jpg') }}" alt="infographic-image" style="width:374px;height:500px;border-radius:3px;">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Perubahan</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->


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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                infographic_image: {
                    required : true,
                },
            },
            messages :{
                infographic_image: {
                    required : 'Masukkan Gambar Baru',
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

@endsection