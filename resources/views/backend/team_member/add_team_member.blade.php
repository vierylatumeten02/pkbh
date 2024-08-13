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
                                           <li class="breadcrumb-item active">Tambah Anggota</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Tambah Anggota</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('store.team.member') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Nama</label>
                                                    <input type="text" name="name" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Departemen/Jabatan</label>
                                                    <input type="text" name="department" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputGroupFile04" class="form-label">Foto</label>
                                                    <input class="form-control" type="file" name="photo" id="image">
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="inputGroupFile04" class="form-label"></label>
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="avatar-l img-thumbnail" alt="team-member-photo">
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

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

</script>

@endsection