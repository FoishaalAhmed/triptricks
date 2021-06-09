@extends('layouts.app')

@section('title', 'Login')

@section('frontend-content')
    <!---MAIN CONTENT-->

    <div class="container">
        <h2 style="text-align: center; margin: auto; font-weight: bolder; "> Sign Up </h2>
        @include('includes.error')
        <form class="needs-validation signpg" novalidate action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Your name" value="{{ old('name') }}" required name="name">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">E-mail</label>
                    <input type="email" class="form-control" id="validationCustom02" placeholder="Your E-mail" value="{{ old('email') }}" name="email" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">Phone</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Your Phone" value="{{ old('phone') }}" name="phone" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">Password</label>
                    <input type="password" class="form-control" id="validationCustom02" placeholder="Give Password"  name="password" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">Confirm Password</label>
                    <input type="password" class="form-control" id="validationCustom02" placeholder="Retype Password" name="password_confirmation" required>
                </div>

            </div>
            {{-- <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Country</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04">Age</label>
                    <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom05">Sex</label>
                    <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>
            </div> --}}

            <button type="submit" class="btn btn" style="background-color: orange; border-radius: 10px;">Submit</button>
        </form>
    </div>

    <!---MAIN CONTENT-->
@endsection
