@extends('layouts.dashboardLayout')
@section('content')
    <div class="container">
        <div class="card text-dark bg-info mb-3" style="max-width: 100rem;">
            <div class="card-header"><strong>Email:</strong> {{$getPostWithId->user->email}}</div>
            <div class="card-header"><strong>Name:</strong> {{$getPostWithId->user->name}}</div>
            <div class="card-header"><strong>Post:</strong> {{$getPostWithId->post}}</div>
            <div class="card-header"><strong>Posted at:</strong> {{$getPostWithId->created_at->format('Y M d')}}</div>
        </div>
    </div>
@endsection