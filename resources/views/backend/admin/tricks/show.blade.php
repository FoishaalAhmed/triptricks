@extends('backend.layouts.app')
@section('title', 'Show Trick')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Show Trick') }}</h3>
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
                    <form>
                        @csrf
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
                                                    placeholder="{{ __('Foreign Price') }}" required=""
                                                    autocomplete="off" value="{{ $trick->foreign_price }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Content') }}</label>
                                                <textarea id="summernote"
                                                    name="content">{{ $trick->content }} </textarea>
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
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset($trick->display) }}" alt="User profile picture"
                                                id="userPhoto">

                                        </div>
                                        <br>
                                        <input type="file" name="display" onchange="readPicture(this)" style="width: 100%">
                                    </div>
                                    <!-- /.card-body -->
                                </div>
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

                        <a href="http://docs.google.com/gview?url={{ asset($trick->file) }}&embedded=true"
                            class="btn btn-lg btn-teal" target="_blank"> View PDF </a>

                        {{-- <iframe src="http://docs.google.com/gview?url={{ asset($trick->file) }}&embedded=true"
                            style="width:600px; height:500px;" frameborder="0">
                        </iframe> --}}
                    </div>
                    <div class="row">
                        @foreach ($photos as $key => $value)
                            <div class="col-md-3">
                                <div class="form-group rzimg-wrap" id="to_be_hide_{{ $value->id }}"
                                    style="margin-bottom: 5px;">
                                    <div class="col-md-12">
                                        <label for=""></label>
                                        <span class="rzclose" onclick="deleteThisImage({{ $value->id }});"
                                            style="margin-top: 20px;">x</span>
                                        <img src="{{ asset($value->photo) }}" alt="" style="width: 100%" height="180px;">
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
    </script>
@endsection
