@extends('layouts.admin-app')

@section('content')
<div class="content-body" style="height: auto;"> 
<div class="card"> 
    <div class="container p-2">
        <div class="card header text-center">
            <h2 class=" p-0">Reset all Tables</h2>
        </div>
        <hr>
        <form method="POST" action="{{ route('admin.restartAuthorized') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter The Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" 
                    class="form-control @error('password') is-invalid @enderror" name="password" 
                    value="{{ old('password') }}" required autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Restart') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection