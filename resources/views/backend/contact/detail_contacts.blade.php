@extends('admin.admin_dashboard')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                <h3>{{ $detailcontact->first_name }} {{ $detailcontact->last_name }}</h3>
                </div>

                <div>
                <h4>{{ $detailcontact->email }} | {{ $detailcontact->phone }}</h4>
                </div>

                <div>
                <h5>{{ $detailcontact->created_at }}</h5>
                </div>
 
                <br>

                <div>
                <p>{{ $detailcontact->message }}</p>
                </div>                            
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

@endsection