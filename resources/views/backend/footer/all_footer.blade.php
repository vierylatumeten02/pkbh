@extends('admin.admin_dashboard')
@section('admin')

@php
$allfooter = App\Models\Footer::find(1);
@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Footer Setup </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('update.footer') }}">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $allfooter->id }}">

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Instagram</label>
                                                    <input type="text" name="instagram" class="form-control" id="inputEmail4" value="{{ $allfooter->instagram }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Facebook</label>
                                                    <input type="text" name="facebook" class="form-control" id="inputEmail4" value="{{ $allfooter->facebook }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Whatsapp</label>
                                                    <input type="text" name="whatsapp" class="form-control" id="inputEmail4" value="{{ $allfooter->whatsapp }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Email</label>
                                                    <input type="text" name="email" class="form-control" id="inputEmail4" value="{{ $allfooter->email }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Alamat</label>
                                                    <input type="text" name="address" class="form-control" id="inputEmail4" value="{{ $allfooter->address }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Copyright</label>
                                                    <input type="text" name="copyright" class="form-control" id="inputEmail4" value="{{ $allfooter->copyright }}">
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


@endsection