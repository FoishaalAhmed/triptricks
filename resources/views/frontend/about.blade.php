@extends('layouts.app')

@section('title', 'About')
@section('frontend-content')
    <!---MAIN CONTENT-->
    <div class="container-fluid">
        <div class="aboutusimg">
            <img src="{{ asset($about->photo) }}" alt="">
        </div>


        <div class="container">
            <div class="aboutus-text">
                {!! $about->text !!}
            </div>
        </div>
    </div>


    <!---MAIN CONTENT-->
@endsection
