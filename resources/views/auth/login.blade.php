@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('check')}}">
            @csrf
            <div class="overlay">
                <div class="con">
                    @if (Session::get('success'))
                        <div class="alert alert-success" id="successMessage">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger" id="successMessage">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <header class="head-form">
                        <h2>Log In</h2>
                        <p>login here using your username and password</p>
                    </header>
                    <div class="field-set">
                        <span class="input-item">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <input class="form-input" name="email" value="{{old('email')}}" id="txt-input" type="text" placeholder="email" >
                        @error('email')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <br>
                        <span class="input-item">
                            <i class="fa fa-key"></i>
                        </span>
                        <input class="form-input" type="password" placeholder="Password" id="pwd" name="password"
                            >
                        @error('password')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <span>
                            <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                        </span>
                        <br>
                        <button type="submit"> Log In </button>
                    </div>
                    <span>Dont have account? <a href="{{ route('register') }}">Click Here</a></span>
                </div>
            </div>
        </form>
    </div>
@endsection
