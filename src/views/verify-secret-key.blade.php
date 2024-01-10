<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('vendor/agencies/verify-key-style.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="card">
        <div class="card-header">Verify with secret key</div>

        <div class="card-body">
            @if (session('error'))
                <div class="alert-danger">
                    {!! session('error') !!}
                </div>
            @endif

            <form method="POST" action="#">
                @csrf

                <div class="form-group">
                    <label for="secretKey">Secret Key</label>
                    <input id="secretKey" type="text" class="@error('secretKey') is-invalid @enderror" name="secretKey">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
<?php
