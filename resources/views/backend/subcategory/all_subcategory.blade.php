@extends('admin.admin_dashboard')
@section('admin')
<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <a href="{{ route('add.subcategory') }}" class="btn btn-blue waves-effect waves-light">Add Subcategory</a>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Subcategory</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>S1</th>
                                                    <th>Category Name</th>
                                                    <th>Subcategory Name</th>
                                                    <th>Action</th>
                                                    </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                @foreach($subcategories as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $item['category']['category_name'] }}</td>
                                                    <td>{{ $item->subcategory_name }}</td>
                                                    <td>
                                                        <a href="{{ route('edit.subcategory', $item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                        <a href="{{ route('delete.subcategory', $item->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>

                                                        
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->




@endsection