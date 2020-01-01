@extends('layouts.app')
@section('content')

<div class="app-content content">
    <div class="content-wrapper"> 
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="">
                                    <img src="{{ asset('img/composite.png')}}" alt="branding logo" style="width: 100px;">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                <span>Admin Login Page</span>
                            </h6>
                        </div>
                        <div class="card-content">  
                            <div class="card-body pt-0">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                                    @csrf

                                    <fieldset class="form-group floating-label-form-group">
                                        <label for="user-name">Your Username</label>
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Your Username">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </fieldset>

                                    <fieldset class="form-group floating-label-form-group mb-1">
                                        <label for="user-password">Enter Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Enter Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </fieldset>
                                        
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </form>
                            </div>
                            <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
                                <span>New a Hint ?</span>
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
</div>

@endsection