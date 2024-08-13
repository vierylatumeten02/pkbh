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
                                        <a href="{{ route('add.team.member') }}" class="btn btn-blue waves-effect waves-light">Tambah Anggota</a>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Anggota Tim <span class="btn btn-danger"> {{ count($allteam) }} </span></h4>
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
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Departemen/Jabatan</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                @foreach($allteam as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><img src="{{ asset($item->photo)}}" class="rounded-circle avatar-lg img-thumbnail"
                                                    alt="member-photo" style="width:50px; height:50px;"></td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->department }}</td>
                                                    <td>
                                                        @if($item->status == 1)
                                                        <span class="badge badge-pill bg-success">Active</span>

                                                        @else
                                                        <span class="badge badge-pill bg-danger">Inactive</span>

                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('edit.team.member', $item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                        <a href="{{ route('delete.team.member', $item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>
                                                        
                                                        @if($item->status == 1)
                                                        <a href="{{ route('inactive.team.member', $item->id)}}" class="btn btn-secondary rounded-pill waves-effect waves-light" title="Inactive"><i class="fa-solid fa-thumbs-down"></i></a>

                                                        @else
                                                        <a href="{{ route('active.team.member', $item->id)}}" class="btn btn-secondary rounded-pill waves-effect waves-light" title="Active"><i class="fa-solid fa-thumbs-up"></i></a>

                                                        @endif


                                                        
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