@extends('layout')

@section('content')

<h1> Book Search</h1>
    <form role="form" method="POST" action="/booksearch">
@csrf
@method('post')

    <h1>Book Title</h1>
        Title:<br>
    <input type="text" name="booktitle" ><br>

        Author:<br>
    <input type="text" name="bookauthor" ><br>

        <h1>Submit</h1>
     <input type="submit" value="Submit">

    </form>

@section('bookresults')

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
                                <input name="author" type='hidden' 
                                value='  {{ array_key_exists('authors',$book->volumeInfo) ? $book->volumeInfo->authors[0] : 'Ghost Writer' }}'></input>
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



@endsection
