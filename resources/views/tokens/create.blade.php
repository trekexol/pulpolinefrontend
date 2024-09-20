@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center font-weight-bold h3">Register token</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tokens.store') }}">
                        @csrf

                        <input type="hidden" name="userId" value="{{ $userId }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus maxlength="40"/>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="symbol" class="col-md-3 col-form-label text-md-right">Symbol</label>

                            <div class="col-md-6">
                                <input id="symbol" type="symbol" class="form-control @error('symbol') is-invalid @enderror" name="symbol" required autocomplete="new-symbol">

                                @error('symbol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="initialSupply" class="col-md-3 col-form-label text-md-right">InitialSupply</label>

                            <div class="col-md-6">
                                <input id="initialSupply" type="symbol" class="form-control" name="initialSupply" required autocomplete="new-symbol">
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('tokens',$userId) }}" id="btnvolver" name="btnvolver" class="btn btn-danger" title="volver">Back</a>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
