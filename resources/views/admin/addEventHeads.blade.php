@extends('layouts.admin-app')

@section('content')
<div class="content-body" style="height: auto;"> 
<div class="card"> 
    <div class="card-content">
        <div class="card title mt-2">
            <h2 class="text-center">Add Event Head</h2>
        </div>  
        <hr>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.addEventHead') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" 
                        class="form-control @error('name') is-invalid @enderror" name="name" 
                        value="{{ old('name') }}" required >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="event_id" class="col-md-4 col-form-label text-md-right">{{ __('Event Id') }}</label>

                    <div class="col-md-6">
                        <select id="event_id" type="text" class="form-control @error('event_id') is-invalid @enderror" 
                            name="event_id" value="{{ old('event_id') }}" required autocomplete="event_id">
                            <option>it_manager</option>
                            <option>it_quiz</option>
                            <option>paper_presentation</option>
                            <option>vlog</option>
                            <option>mad_ad</option>
                            <option>treasure_hunt</option>
                            <option>gaming</option>
                            <option>coding</option>
                            <option>cosplay</option>
                            <option>web_design</option>
                            <option>exhibition</option>
                            <option>video_editing</option>
                            <option>photography</option>
                        </select>

                        @error('event_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="ft-plus"></i>  {{ __('Add Event Head') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
</div>
@endsection