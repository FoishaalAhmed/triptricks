@extends('layouts.app')

@section('title', 'Home')

@section('frontend-content')

    <!----1stbanner--->
    <div class="container-fluid" style="margin-left: 0px; margin-left: 0px;padding-left: 0px; padding-right: 0px;  ">
        <div class="banner1img">
            <img src="{{ asset('public/frontend/img/tr.jpg') }}" class="img-fluid" alt="">

            <div class="bannertex">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-5">
                        <h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi iure facere temporibus
                                explicabo quasi quae facilis, aspernatur, hic perspiciatis vitae eos voluptatibus? Amet quos
                                praesentium obcaecati modi quam esse.
                            </p>
                            <p style="text-align: right;">
                                --AR Ratul
                            </p>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!------Part-2----->

    <div class="container" style="margin-top: 20px;">
        <h2 id="starthead" style="text-align: center;">
            Lorem ipsum dolor sit amet, consectete eius aspernatur tempore quibusdam atque, sint, cupiditate nobis. Ratione,
            in earum?
        </h2>
        <div class="photosec" style="margin-top: 40px;">
            <div class="row" style="text-align: center; margin: auto; ">
                @foreach ($tricks as $item)
                
                <div class="col-md-6 col-12" style="text-align: center;margin: auto;">
                    <a href="{{ route('tricks.detail', [$item->id, str_replace(' ', '-', strtolower($item->title))]) }}" style="text-decoration: none; color: black; ">
                        <div class="card bookcard"
                            style=" text-align: center;border-radius: 16px;  margin: auto; margin-bottom: 20px;box-shadow: 0px 10px 10px  black;">
                            <img src="{{ asset($item->display) }}" id="book-img" style="border-radius: 16px 16px 0px 0px" alt="">
                            <h4 class="bookname" style=" ">
                                {{ $item->title }}
                            </h4>
                            <br>
                            {!! Str::limit($item->content, 195) !!}
                            <div class="readmorebtn">
                                <button class="btn" style="color: blue;"> Read Online> </button>
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
