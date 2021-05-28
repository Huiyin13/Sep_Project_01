@extends('layouts.app')

@section('content')
<head>
    <title>Customer Login Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
            @if(session()->has('message'))
    			<div class="alert alert-warning">
        			{{ session()->get('message') }}
    			</div>
			@endif
                <h1><b>{{ __('Login As ') }}{{ isset($url) ? ucwords($url) : ""}}</b></h1>
                <br>
                @isset($url)
                <form method="POST" action='{{ url("login/$url") }}'>
                @endisset
                    @csrf
                    <label for="Customer_Email" class="col-md-6 col-form-label text-md-left">{{ __('Email:') }}</label>
                    <div class="col-md-6">
                        <input id="Customer_Email" type="email" class="form-control @error('Customer_Email') is-invalid @enderror" name="Customer_Email" value="{{ old('Customer_Email') }}" required autocomplete="Customer_Email" autofocus placeholder="e.g. example@example.com">

                        @error('Customer_Email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <label for="Customer_Password" class="col-md-6 col-form-label text-md-left">{{ __('Password:') }}</label>
                    <div class="col-md-6">
                        <input id="Customer_Password" type="password" class="form-control @error('Customer_Password') is-invalid @enderror" name="Customer_Password" required autocomplete="current-password" placeholder="Minimum 8 characters">

                        @error('Customer_Password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="col-md-6 text-md-left">
                        <button type="submit">
                            {{ __('LOG IN') }}
                        </button>
                    </div>
                </form>
            </center>
        </div>
    </div>
</div>
</body>
@endsection