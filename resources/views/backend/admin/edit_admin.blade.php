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
                                           <li class="breadcrumb-item active">Edit Admin</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Admin</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('update.admin') }}">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $adminuser->id }}">

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Username</label>
                                                    <input type="text" name="username" class="form-control" id="inputEmail4" value="{{ $adminuser->username }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="inputEmail4"value="{{ $adminuser->name }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $adminuser->email }}">
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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                username: {
                    required : true,
                }, 
                name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                password: {
                    required : true,
                },
            
            },
            messages :{
                username: {
                    required : 'Please Enter Username',
                },
                name: {
                    required : 'Please Enter Name',
                },
                email: {
                    required : 'Please Enter Email',
                },
                password: {
                    required : 'Please Enter Password',
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