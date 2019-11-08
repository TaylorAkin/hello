@extends('layout')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel Library
                </div>


                @hasrole('librarian')
                   Welcome Back Librarian<br>
                    <button>
                    <a href="{{ route('booksearch') }}">Book Search</a>
                           
                    </button>
                    <button>
                    <a href="{{ route('catalog') }}">Library Catalog</a>

                    </button>
                    <button>
                    <a href="{{ route('cardholders') }}">Card Holders</a>
                    </button>
                    <button>
                    <a href="{{ route('home') }}">Checked Out Books</a>
                    </button>
                @endhasrole

                 @hasrole('cardholder')
                   Welcome Back <br>
                                <br>
                    <button>
                    <a href="{{ route('catalog') }}">Library Catalog</a>
                    </button>

                     <button>
                    <a href="{{ route('home') }}">My (everyone's) Books</a>
                    </button>
                    
                @else
                        <br>
                    Welcome to Laravel Library <br>
                  

             
                @endhasrole
            </div>
        </div>
@endsection

                   




                   
                  
           
           


