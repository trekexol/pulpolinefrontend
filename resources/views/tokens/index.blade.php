@extends('layouts.dashboard')

@section('content')

   

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Token List</h2>
        </div>
       
        
        <div class="col-md-6">
            <a href="{{ route('tokens.create',$userId)}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Register</a>
        </div> 
       
    </div>

  </div>

  {{-- VALIDACIONES-RESPUESTA--}}
@include('layouts.success')   {{-- SAVE --}}
@include('layouts.danger')    {{-- EDITAR --}}
@include('layouts.delete')    {{-- DELELTE --}}
{{-- VALIDACIONES-RESPUESTA --}}

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Token</th>
              
            </tr>
            </thead>
            
            <tbody>
                @if (empty($tokens))
                @else
                    @foreach($tokens as $token)
                    <tr>
                   
                    <td>{{ $token['tokenId'] }}</td>
                    
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>


@endsection
@section('javascript')

   

@endsection