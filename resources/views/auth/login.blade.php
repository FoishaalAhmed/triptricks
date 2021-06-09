@extends('layouts.app')

@section('title', 'Login')

@section('frontend-content')
    <!---MAIN CONTENT-->

    <div class="container">
        <h2 style="text-align: center; margin: auto; font-weight: bolder; "> Sign In </h2>
        @include('includes.error')
        <form class="needs-validation signpg" novalidate action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">E-mail</label>
                    <input type="email" class="form-control" id="validationCustom02" placeholder="Your E-mail" value="{{ old('email') }}" name="email" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">Password</label>
                    <input type="password" class="form-control" id="validationCustom02" placeholder="Password"  name="password" required>
                </div>

            </div>

            <button type="submit" class="btn btn" style="background-color: orange; border-radius: 10px;">Sign In</button>
        </form>
    </div>

    <!---MAIN CONTENT-->
@endsection
