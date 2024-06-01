@extends('layouts.dashboardLayout')
@section('content')
    <div class="container">
        <div class="card">
            <form action="{{ route('create_post') }}" method="POST">
                @csrf

                <div class="card-body ">
                    @if (Session::get('success'))
                        <div class="alert alert-success container" id="successMessage">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <input type="text" class="styled-input col-md-12" name="post" id=""
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


    <style>
        body {
            font-family: sans-serif;
        }

        .container-card {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }

        .card-content {
            width: 400px;
            max-width: 100%;
            margin: 20px;
        }

        .card-content:hover .upper {
            transform: translateY(0px);
        }

        .card-content:hover .lower {
            transform: translateY(0px);
        }

        .upper {
            height: 200px;
            position: relative;
            display: flex;
            justify-content: center;
            z-index: 1;
            transform: translateY(100px);
            transition: 0.3s ease-in-out;
        }

        .lower {
            height: 200px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
            transform: translateY(-100px);
            transition: 0.3s ease-in-out;
            color: black;
        }

        .lower p {
            text-align: center;
            color: rgb(73, 73, 73);
        }



        .card3 {
            background-color: #9db4c4;
        }

        /* Media Query für kleinere Displays */
        @media screen and (max-width: 768px) {
            .container-card {
                flex-direction: column;
                /* Karten werden untereinander angeordnet */
                align-items: center;
                /* Zentriert die Karten horizontal */
            }

            .card {
                width: 80%;
                /* Ändere die Breite der Karten, um sie besser auf kleineren Bildschirmen passen zu lassen */
                margin: 10px 0;
                /* Ändere den Abstand zwischen den Karten */
            }
        }

        .fa {
            font-size: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            line-height: 200px;
        }



        .fa-instagrams {
            color: white;
        }
    </style>


    @forelse ($getAllPost as $item)
        <div class="container-card">

            <div class="card-content">

                
                <div class="upper card3">

                    @if(Auth::user()->id == $item->user->id)

                    <small class="fa fa-instagramss">
                        <a href="{{route('edit', encrypt($item->id))}}" class="text-dark"><i class="fas fa-edit"></i></a>
                        <a href="{{route('destroy', encrypt($item->id))}}" class="text-dark" onclick="return confirm('are you sure you want to delete this post')"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{route('read', encrypt($item->id))}}" class="text-dark"><i class="fa-solid fa-eye"></i></a>                    
                    
                    </small>
                    @else
                    <small class="fa fa-instagram"></small>
                    @endif


                </div>

                <div class="upper card3">
                    <p class="fa fa-instagrams">{{ $item->user->name }}<span>'s post</span></p>

                </div>

                <div class="lower">
                    <p>{{ $item->post }} </p>
                </div>

                <p>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>

            </div>
        </div>

    @empty
        <h2 class="text-center">No post available</h2>
    @endforelse
@endsection
