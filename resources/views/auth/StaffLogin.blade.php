@extends('layouts.app')

@section('content')
<head>
    <title>Staff Login Form</title>
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
                    <label for="Staff_Name" class="col-md-6 col-form-label text-md-left">{{ __('Name:') }}</label>
                    <div class="col-md-6">
                        <input id="Staff_Name" type="text" class="form-control @error('Staff_Name') is-invalid @enderror" name="Staff_Name" value="{{ old('Staff_Name') }}" required autocomplete="Staff_Name" autofocus placeholder="e.g. Staff Name">

                        @error('Staff_Name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <label for="Staff_Password" class="col-md-6 col-form-label text-md-left">{{ __('Password:') }}</label>
                    <div class="col-md-6">
                        <input id="Staff_Password" type="password" class="form-control @error('Staff_Password') is-invalid @enderror" name="Staff_Password" required autocomplete="current-password" placeholder="Minimum 8 characters">

                        @error('Staff_Password')
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