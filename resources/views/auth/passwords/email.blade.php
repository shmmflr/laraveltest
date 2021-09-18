@extends('layouts.main_layout')

@section('mainContent')


    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 post-single">

                <div class="post-title-single"><h1>بازیابی رمز عبور</h1></div>
                <br><br><br>
                <div class="post-txt-single">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('آدرس ایمیل ') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال لینک رمز عبور جدید') }}
                                </button>
                            </div>
                        </div>
                    </form>


                    <br>
                </div>
            </div>

        </div>
    </div>

@endsection
