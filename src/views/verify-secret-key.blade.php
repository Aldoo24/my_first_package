@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify with secret key') }}</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {!! session('error') !!}
                            </div>
                        @endif

                        <form method="POST" action="#">
                            @csrf

                            <div class="row mb-3">
                                <label for="secretKey"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Secret Key') }}</label>

                                <div class="col-md-6">
                                    <input id="secretKey" type="text"
                                           class="form-control @error('secretKey') is-invalid @enderror"
                                           name="secretKey">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

