@extends('layouts.dashboardLayout')
@section('content')
    <div class="container">
        <div class="card">
            <form action="{{ route('create_post', encrypt($getPostWithId->id)) }}" method="POST">
                @csrf

                <div class="card-body ">
                    @if (Session::get('success'))
                        <div class="alert alert-success container" id="successMessage">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <input type="text" value="{{$getPostWithId->post}}" class="styled-input col-md-12" name="post" id=""
                        placeholder="Enter your text...">
                    @error('post')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <button class="btn btn-light my-2">Post</button>
                </div>
            </form>
        </div>
    </div>   
@endsection
