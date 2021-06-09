@extends('layouts.app')

@section('title', "{$page->name}")
@section('frontend-content')
    <!---MAIN CONTENT-->
    <div class="container-fluid">
        <div class="aboutusimg">
            <img src="{{ asset($page->photo) }}" alt="">
        </div>


        <div class="container">
            <div class="aboutus-text">
                {!! $page->text !!}
            </div>
        </div>
    </div>


    <!---MAIN CONTENT-->
@endsection
