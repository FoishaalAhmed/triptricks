<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') | Trip Tricks </title>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body style="background-color: #E5E5E5;">

    <!-------Header Section------->
    <div class="container-fluid" style="margin-top: 100px;">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:#fff;">
            <div class="row" style="width: 100%;">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <a class="navbar-brand" href="{{ URL::to('/') }}"><img
                            src="{{ asset('public/frontend/img/logo.png') }}" alt=""></a>

                    <button style="float: right;margin-top: 12px;" class="navbar-toggler" type="button"
                        data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-4">
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a style="@if (request()->is('tricks')) {{ 'background-color: orange; border-radius: 10px;' }} @endif color: black;" class="nav-link" href="{{ route('tricks') }}"> Tricks </a>
                            </li>
                            <li class="nav-item">
                                <a style="@if (request()->is('about')) {{ 'background-color: orange; border-radius: 10px;' }} @endif color: black;" class="nav-link" href="{{ route('about') }}"> About Us </a>
                            </li>
                            @guest

                                <li class="nav-item">
                                    <a class="nav-link" style="@if (request()->is('login')) {{ 'background-color: orange; border-radius: 10px;' }} @endif color: black;" href="{{ route('login') }}">Sign In </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="@if (request()->is('register')) {{ 'background-color: orange; border-radius: 10px;' }} @endif color: black;">Sign UP
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    @section('frontend-content')

    @show

    <!-----Footer desktop---->

    <div class="container-fluid footer-desktop" style="background-color: #2b2f32; margin-top: 20px; ">
        <div class="row">
            {{-- <img style="padding: 0px;" src="{{ asset('public/frontend/img/logo.png') }}" alt=""> --}}
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6">
                    <div class="">
                        <img src="img/logo.png" alt="">
                    </div>
                    <br>
                    <div class="">
                        <p style="margin: 0px; color: white;">{{ $contact->address }}</p>
                        <br>
                        <p style="margin: 0px; color: white;">Mobile: {{ $contact->phone }}</p>
                        <p style="margin: 0px; color: white;">Email: {{ $contact->email }}</p>
                    </div>

                    <br>

                    <div class="footer-icon">
                        <div class="row">
                            <div class="col-2">
                                <span>
                                    <a href="https://{{ $contact->facebook }}" style="text-decoration: none; color: white;" title="facebook"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg></a>
                                </span>
                            </div>
                            <div class="col-2">
                                <span>
                                    <a href="https://{{ $contact->instagram }}" style="text-decoration: none; color: white;" title="instagram"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg></a>
                                </span>
                            </div>
                            <div class="col-2">
                                <span>
                                    <a href="https://{{ $contact->twitter }}" style="text-decoration: none; color: white;" title="twitter"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg></a>
                                </span>
                            </div>
                            <div class="col-1">
                                <span>
                                    <a href="{{ $contact->pinterest }}" style="text-decoration: none; color: white;" title="whatsapp"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                        </svg></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>






                <div class="col-md-4 col-6">

                    <div class="Quick-Links">
                        <span>Quick Links</span>
                    </div>
                    <br>

                    <br>
                    <div class="footer-mdmd">
                        <span> <span>></span>
                            <span>
                                <a style="text-decoration: none;color: whitesmoke;" href="{{ route('contacts') }}"> <span class="mdmd2">Contact
                                        Us</span> </a>
                            </span>
                        </span>
                        <hr style="margin-top: 10px; margin-bottom: 10px;color: aliceblue;border-top: 1px solid whitesmoke; ">

                        <span> <span>></span>
                            <span>
                                <a style="text-decoration: none;color: whitesmoke;" href="{{ route('page', 'terms-conditions') }}"> <span class="mdmd2">Terms & Conditions</span> </a>
                            </span>
                        </span>
                        <hr
                            style="margin-top: 10px; margin-bottom: 10px;color: aliceblue;border-top: 1px solid whitesmoke; ">

                        <span> <span>></span>
                            <span>
                                <a style="text-decoration: none;color: whitesmoke;" href="{{ route('page', 'privacy-policy') }}"> <span class="mdmd2">Privacy Policy</span> </a>
                            </span>
                        </span>
                        <hr style="margin-top: 10px; margin-bottom: 10px;color: aliceblue;border-top: 1px solid whitesmoke; ">

                    </div>
                </div>




                <div class="col-md-4 col-12">

                    <div class="Contact-Us">
                        <span style=" ">Newslatter</span>
                    </div>
                    <br>

                    <br>
                    <div class="footer-mdmd">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label style="color: whitesmoke;" for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
                            </div>

                            <button type="submit" class="btn btn"
                                style="background-color: orange; border-radius: 10px;">Send</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>







        <div class="row endline">
            <div class="col-12 col-md-6 endline " style="color: whitesmoke;">© Copyright 2021 Trip Trickes.COM | All
                Rights Reserved</div>
            <div class="col-12 col-md-6 endline " style="text-align: right;color: whitesmoke;">Developed by <a href="#"
                    style="text-decoration: none; color: wheat;">ICT Bangla BD</a></div>
        </div>
    </div>

    <!------SCRIPT----->
    <script src="{{ asset('public/frontend/js/jQuery.js') }}"></script>
    <script src="{{ asset('public/frontend/js/properjs.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>

    @section('footer')
        
    @show

</body>

</html>
