@extends('layouts.dashboardLayout')
@section('content')
    <div class="container">
        <div class="card text-dark bg-info mb-3" style="max-width: 100rem;">
            <div class="card-header">{{$getPostWithId->user->email}}</div>
            <div class="card-body">
                <h5 class="card-title">Info</h5>
                <p class="card-text">{{$getPostWithId->post}}</p>
            </div>
        </div>
    </div>
@endsection
