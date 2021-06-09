@extends('layouts.app')

@section('title', 'Contact')

@section('frontend-content')
    <!---MAIN CONTENT-->
    <div class="container-fluid">
        <style>
            body {
                background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
            }

        </style>
        <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
            </div>
            <span id="form_output"></span>
            <form id="contact-form" method="POST">
                @csrf
                <h3>Drop Us a Message</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" required=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *"
                                style="width: 100%; height: 150px;" required=""></textarea>
                        </div>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!---MAIN CONTENT-->
@endsection

@section('footer')
    <script>
        $(function() {

            $.ajaxSetup({

                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }

            });

            $('#contact-form').submit(function(event) {

                event.preventDefault();

                var formData = $('#contact-form').serialize();

                var url = '{{ route('query') }}';

                $.ajax({

                    url: url,
                    method: 'POST',
                    data: formData,
                    dataType: 'json',

                    success: function(data) {


                        if (data.error.length > 0) {

                            var error_html = '';

                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[
                                    count] + '</div>';
                            }

                            $('#form_output').html(error_html);

                        } else {

                            $('#form_output').html(data.success);
                            $('#contact-form')[0].reset();
                        }

                    },

                    error: function(error) {

                        console.log(error);
                    }


                });

            });

        });

    </script>
@endsection
