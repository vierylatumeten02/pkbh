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
                                           <li class="breadcrumb-item active">Edit Subcategory</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Subcategory</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('update.subcategory') }}">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $subcategory->id }}">

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Category Name</label>
                                                    <select name="category_id" class="form-select" id="example-select">
                                                            <option>Select Category</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }} >{{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Subcategory Name</label>
                                                    <input type="text" name="subcategory_name" class="form-control" id="inputEmail4" value="{{ $subcategory->subcategory_name }}">
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
                subcategory_name: {
                    required : true,
                }, 
            },
            messages :{
                subcategory_name: {
                    required : 'Please Enter Subcategory Name',
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