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
                   Welcome Back
                    <button>
                    <a href="{{ route('booksearch') }}">Book Search</a>
                           
                    </button>
                    <button>
                    <a href="{{ route('catalog') }}">Library Catalog</a>

                    </button>
                    <button>
                    <a href="{{ route('cardholders') }}">Card Holders</a>
                    </button>
                @endhasrole

                 @hasrole('cardholder')
                   Welcome Back

                    <button>
                    <a href="{{ route('catalog') }}">Library Catalog</a>
                    </button>

                     <button>
                    <a href="{{ route('catalog') }}">My Books</a>
                    </button>

                        @else
                   Welcome to Laravel Library <br>
                   Please create an account
                   

                   
                @endhasrole



                @section('checkoutbooks')
                

<div class="panel panel-default">
    <div class="panel-heading"><h1>Results</h1></div>
        <div class="panel-body">
            <div class="row">
                  
            
            @isset($books)
            @foreach ($books as $book)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                           
                            <div class="caption">
                                <h3>{{ $book->volumeInfo->title }}</h3>
                                
                            </div>

                            <form action="/catalog" method="POST">
                            @csrf
                            @method('post')
                                <input name="title" type='hidden' value='{{ $book->volumeInfo->title }}'></input>
                                <input name="author" type='hidden' value='{{ $book->volumeInfo->authors[0] }}'></input>
                                <input name="isbn" type='hidden' value='{{ $book->volumeInfo->industryIdentifiers[0]->identifier }}'></input>
                                <input type=submit value="Add To Catalog"></input>
                            
                            
                            
                            </form>
                        </div>
                    </div>
            @endforeach
            @endisset

           
             

            </div>
        </div>
    </div>
</div>



                @endsection

                   
                  
           
           


            </div>
        </div>
 @endsection
