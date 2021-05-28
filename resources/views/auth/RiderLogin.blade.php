@extends('layouts.app')

@section('content')
<head>
    <title>Rider Login Form</title>
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
                    <label for="Rider_Email" class="col-md-6 col-form-label text-md-left">{{ __('Email:') }}</label>
                    <div class="col-md-6">
                        <input id="Rider_Email" type="email" class="form-control @error('Rider_Email') is-invalid @enderror" name="Rider_Email" value="{{ old('Rider_Email') }}" required autocomplete="Rider_Email" autofocus placeholder="e.g. example@example.com">

                        @error('Rider_Email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <label for="Rider_Password" class="col-md-6 col-form-label text-md-left">{{ __('Password:') }}</label>
                    <div class="col-md-6">
                        <input id="Rider_Password" type="password" class="form-control @error('Rider_Password') is-invalid @enderror" name="Rider_Password" required autocomplete="current-password" placeholder="Minimum 8 characters">

                        @error('Rider_Password')
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