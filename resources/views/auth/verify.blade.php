@extends('layouts.main_layout')

@section('mainContent')


    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 post-single">

                <div class="post-title-single"><h1>ورود به سایت</h1></div>
                <br><br><br>
                <div class="post-txt-single">


                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                        .
                    </form>

                    <br>
                </div>
            </div>

        </div>
    </div>

@endsection
