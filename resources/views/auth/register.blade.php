@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="overlay">
            <form action="{{ route('create') }}" method="POST">
                @csrf
                <div class="con">
                    <header class="head-form">
                        <h2>Register here</h2>
                    </header>
                    <br>
                    <div class="field-set">
                        <span class="input-item">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <input class="form-input" name="name" value="{{ old('name') }}" id="txt-input" type="text"
                            placeholder="name">
                        @error('name')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <br>
                        <span class="input-item">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <input class="form-input" name="email" value="{{ old('email') }}" id="txt-input" type="text"
                            placeholder="email">
                        @error('email')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <br>
                        <span class="input-item">
                            <i class="fa fa-key"></i>
                        </span>
                        <input class="form-input" type="password" placeholder="Password" id="pwd" name="password">
                        @error('password')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <br>
                        <span class="input-item">
                            <i class="fa fa-key"></i>
                        </span>
                        <input class="form-input" type="password" placeholder="confirm Password" id="pwd"
                            name="cpassword">
                        @error('cpassword')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        <button class="log-in"> Log In </button>
                    </div>
                    <span>Already have account <a href="{{ route('login') }}">click here</a></span>
                </div>
            </form>
        </div>
    </div>
@endsection
