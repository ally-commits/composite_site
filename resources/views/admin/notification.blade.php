@extends('layouts.admin-app')

@section('content')
<div class="content-body" style="height: auto;">  
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-title text-center pt-2">
                        <h4>Send Push Notification</h4>
                    </div>
                    <div class="card-body"> 
                        <form class="form form-horizontal" method="POST" action="{{ route('admin.pushNotification') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Push Notification Content') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" 
                                    class="form-control @error('text') is-invalid @enderror" name="text" 
                                    value="{{ old('text') }}" required autocomplete="text" autofocus>

                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Notification URL') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="url" 
                                    class="form-control @error('url') is-invalid @enderror" name="url" 
                                    value="{{ old('url') }}" required autocomplete="url" autofocus>

                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="form-actions right"> 
                                <button type="submit" class="btn btn-block btn-primary">
                                    <i class="la la-send"></i> Send Push Notification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
</div>
@endsection