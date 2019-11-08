@extends('layout')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading"><h1>Catalog</h1></div>
        <div class="panel-body">
            <div class="row">
                

         @foreach ($books as $book)


            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                
                    <div class="caption">
                        <h1>{{ $book->title }}</h1>
                        <h3>{{ $book->author }}  </h3>


                @hasrole('librarian')
                        <form action="/catalog/delete" method="POST">
                            @csrf
                            @method('post')
                                <input type='hidden' name='book' value="{{$book->title}}" />
                                <input type='submit' value='Remove'></input>
                        </form>

                        <form action="/catalog/checkinout" method="POST">
                            @csrf
                            @method('post')
                                <input type='hidden' name='book' value="{{$book->title}}" />
                                <input type='submit' value='Check-In/Check-Out'></input>
                        </form>

                        <form action="/catalog/whohasit" method="POST">
                            @csrf
                            @method('post')
                                <input type='hidden' name='book' value="{{$book->title}}" />
                                <input  type=submit value='Who has it '></input>
                        </form>
                @else
                        <form action="/home/checkout" method="POST">
                            @csrf

                                <input type='hidden' name='bookid' value="{{$book->id}}" />
                                <input type='hidden' name='user' value="{{Auth::User()->id}}" />
                                <input type='submit' value='Reserve'></input>
                              
                        </form>
                
                @endhasrole
                



                                
                                

                        
                    </div>
                    
              
                </div>
            </div>
        @endforeach
             

            </div>
        </div>
    </div>
</div>







@endsection