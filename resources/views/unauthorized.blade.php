@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Unauthorized Access</div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        You do not have permission to access this page.
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection