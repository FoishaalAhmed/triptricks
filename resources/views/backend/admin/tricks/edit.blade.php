@extends('backend.layouts.app')
@section('title', 'Update Trick')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Update Trick') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tricks.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i> {{ __('Tricks') }}</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('includes.error')
                    <form action="{{ route('admin.tricks.update', $trick->id) }}" method="post" id="userForm"
                        enctype="multipart/form-data">
                        @csrf
						@method('PUT')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Date') }}</label>
                                                <input type="text" name="date" class="form-control"
                                                    placeholder="{{ __('Date') }}" required="" autocomplete="off"
                                                    value="{{ $trick->date }}" id="date" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="{{ __('Title') }}" required="" autocomplete="off"
                                                    value="{{ $trick->title }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Local Price') }}</label>
                                                <input type="number" name="local_price" class="form-control"
                                                    placeholder="{{ __('Local Price') }}" required="" autocomplete="off"
                                                    value="{{ $trick->local_price }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Foreign Price') }}</label>
                                                <input type="number" name="foreign_price" class="form-control"
                                                    placeholder="{{ __('Foreign Price') }}" required="" autocomplete="off"
                                                    value="{{ $trick->foreign_price }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Content') }}</label>
                                                <textarea id="summernote" name="content">{{ $trick->content }} </textarea>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('Display Photo') }}</h3>
                                    </div>
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($trick->display) }}"
                                                alt="User profile picture" id="userPhoto">

                                        </div>
                                        <br>
                                        <input type="file" name="display" onchange="readPicture(this)" style="width: 100%">
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('More Photo') }}</h3>
                                    </div>
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="//placehold.it/200x200"
                                                alt="User profile picture" id="userPhoto">

                                        </div>
                                        <br>
                                        <input type="file" name="photo[]" style="width: 100%" multiple>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('File') }}</h3>
                                    </div>
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="//placehold.it/200x200"
                                                alt="User profile picture" id="userPhoto">

                                        </div>
                                        <br>
                                        <input type="file" name="file" style="width: 100%">
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                    <button type="submit" class="btn btn-sm bg-blue">{{ __('Save') }}</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Trick File And Photos') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

					<div class="row">
                        <object width="100%" height="500px" type="application/pdf" 
                        data="{{asset($trick->file) }}#toolbar=0" id="pdf_content"></object>
                        {{-- <embed src="{{asset($trick->file) }}#toolbar=0&navpanes=0&scrollbar=0" width="500" height="500"> --}}
					</div>
					<div class="row">
						@foreach ($photos as $key => $value)
							<div class="col-md-3">
								<div class="form-group rzimg-wrap" id="to_be_hide_{{$value->id}}" style="margin-bottom: 5px;">
									<div class="col-md-12">
										<label for=""></label>
										<span class="rzclose" onclick="deleteThisImage({{$value->id}});" style="margin-top: 20px;">x</span>
										<img src="{{asset($value->photo)}}" alt="" style="width: 100%" height="180px;">
									</div>
								</div>
							</div>
						@endforeach
					</div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('footer')

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote();
        })

        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#userPhoto')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

		$(function () {
            $('#date').datepicker({
                autoclose:   true,
                changeYear:  true,
                changeMonth: true,
                dateFormat:  "dd-mm-yy",
                yearRange:   "-10:+10"
            });
        });

		function deleteThisImage(id) {

            if (confirm("Are you sure ?")) { 

                var url = '{{route("admin.delete.tricks.photo")}}';

                $.ajaxSetup({

                    headers: {'X-CSRF-Token' : '{{csrf_token()}}'}

                });

                $.ajax({

                    url: url,
                    method: 'POST',
                    data: { 'id' : id, },

                    success: function(data){

                        $("#to_be_hide_" + id).fadeOut(2000);
                        
                    },

                    error: function(error) {

                        console.log(error);
                    }


                });

            }
        }

    </script>
@endsection
