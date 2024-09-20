@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center font-weight-bold h3">Login User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.storeLogin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus maxlength="40"/>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                   Login
                                </button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('users') }}" id="btnvolver" name="btnvolver" class="btn btn-danger" title="volver">Back</a>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
