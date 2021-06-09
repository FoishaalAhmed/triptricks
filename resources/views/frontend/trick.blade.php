@extends('layouts.app')

@section('title', "{$trick->title}")

@section('frontend-content')
    <!---MAIN CONTENT-->

    <!----Slider--->
    <div class="container-fluid" id="secondpage">
        <h2 id="secondpageheading" style="font-weight: bolder; margin-bottom: 20px; "> Cox's Bazar Tour Guide </h2>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($photoTricks as $key => $item)
                    <div class="carousel-item @if($key == 0) {{ 'active' }} @endif">
                        <img class="d-block w-100" src="{{ asset($item->photo) }}" alt="">
                    </div>
                @endforeach
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>



    <!------Part-2----->
    <div class="container-fluid" id="secondpage" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-8">
                <h2 id="secondpageheading" style="font-weight: bold;">
                    About this tour guide :
                </h2>
                <div class="tourdtl">
                    {!! $trick->content !!}
                </div>

            </div>



            <div class="col-md-4">
                <div class="card secondpagecard">
                    <h2 style="text-align: right; padding: 20px; ">
                        <span style="font-weight: 700; color: green; ">${{ $trick->foreign_price }}</span> <span style="font-size: 18px;">For
                            Foreigners</span>
                        <hr style="margin-bottom: 0px;">
                    </h2>
                    <h2 style="text-align: right; padding: 20px; padding-top: 0px; ">
                        <span style="font-weight: 700; color: rgb(165, 16, 73); ">৳{{ $trick->local_price }}</span> <span
                            style="font-size: 18px;">For Foreigners</span>
                        <hr>
                    </h2>



                    <button type="submit" class="btn btn"
                        style="background-color: orange; border-radius: 10px;width: 50%;margin-bottom: 35px; text-align: center;margin: auto;">Buy
                        Now</button>
                    <div class="" style="margin-top: 30px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!---MAIN CONTENT-->



    <br><br>
@endsection
