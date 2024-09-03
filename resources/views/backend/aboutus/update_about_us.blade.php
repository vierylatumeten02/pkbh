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
                                    <h4 class="page-title">Update Tentang Tim</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('update.aboutus') }}" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $aboutus->id }}">

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputGroupFile04" class="form-label">Foto Team - 1093px x 748px</label>
                                                    <input class="form-control" type="file" name="team_photo" id="image">
                                                    <br>
                                                    <img id="showImage" src="{{ (!empty($aboutus->team_photo)) ? url($aboutus->team_photo): url('upload/no_image.jpg') }}" alt="pkbh-team-photo" style="width:575px;height:395px;border-radius:3px;">
                                                </div>

                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="inputDetails" class="form-label">Deskripsi</label>
                                                    
                                                    <textarea id="default" name="team_description">
                                                        {!! $aboutus->team_description !!}
                                                    </textarea>
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


@endsection