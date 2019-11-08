@extends('layout')

@section('content')

<div class='display-1 text-center'> Book Search</div>
    <form role="form" method="POST" action="/booksearch">
@csrf
@method('post')

    <h1 class=''>Book Title</h1>
        Title:<br>
    <input type="text" name="booktitle" ><br>

        Author:<br>
    <input type="text" name="bookauthor" ><br>

        
     <input type="submit" value="Submit">

    </form>

@section('bookresults')

<div class="panel panel-default">
    <div class="panel-heading"><h1>Results</h1></div>
        <div class="panel-body">
            <div class="row">
                  
            
            @isset($books)
            @foreach ($books as $book)

            <div class="container">

                <table class="table">
                    <tbody>  
                        <div>
                            <h3>{{ $book->volumeInfo->title }}</h3>                        
                        </div>

                        <td>
                            <tr>
                                <form action="/catalog" method="POST">
                                @csrf
                                @method('post')
                                    <input name="title" type='hidden' value='{{ $book->volumeInfo->title }}'></input>
                                    <input name="author" type='hidden' 
                                    value='  {{ array_key_exists('authors',$book->volumeInfo) ? $book->volumeInfo->authors[0] : 'Ghost Writer' }}'></input>
                                    <input name="isbn" type='hidden' value='{{ $book->volumeInfo->industryIdentifiers[0]->identifier }}'></input>
                                    <input type=submit value="Add To Catalog"></input>
                                                                                                   
                                </form>
                            </tr>
                        </td>
                    </tbody>
                </table>
            </div>
            @endforeach
            @endisset

           
             

            </div>
        </div>
    </div>
</div>

@endsection



@endsection
