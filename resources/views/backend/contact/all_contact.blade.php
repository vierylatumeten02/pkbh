@extends('admin.admin_dashboard')
@section('admin')
<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Form Konsultasi <span class="btn btn-danger"> {{ count($contacts) }} </span> </h4>
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
                                                    <th>Waktu</th>
                                                    <th>Nama</th>
                                                    <th>Action</th>
                                                    </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @php($i = 1)
                                                @foreach($contacts as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ Carbon\Carbon::parse($item->created_at)->translatedformat('d F Y - H:i') }}</td>
                                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                                    <td>
                                                        <a href="{{ route('contact.detail', $item->id)}}" class="btn btn-primary rounded-pill waves-effect waves-light">Detail</a>
                                                        <a href="{{ route('delete.message', $item->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Hapus</a>
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
</div>

@endsection