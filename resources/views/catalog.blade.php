@extends('layout')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading"><h1>Catalog</h1></div>
        <div class="panel-body">
            <div class="row">
                

         @foreach ($books as $book)


            <table class='table'>
                <tbody class="thumbnail">
                
                    <tr class="caption">
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}  </td>


                @hasrole('librarian')

                <td>

                    <form action="/catalog/delete" method="POST">
                        @csrf
                        @method('post')
                            <input type='hidden' name='book' value="{{$book->title}}" />
                            <input type='submit' value='Remove'></input>
                    </form>

                </td>

                <td>

                    <form action="/catalog/checkinout" method="POST">
                        @csrf
                        @method('post')
                            <input type='hidden' name='book' value="{{$book->title}}" />
                            <input type='submit' value='Check-In/Check-Out'></input>
                    </form>

                </td>

                <td>

                    <form action="/catalog/whohasit" method="POST">
                        @csrf
                        @method('post')
                            <input type='hidden' name='book' value="{{$book->title}}" />
                            <input  type=submit value='Who has it '></input>
                    </form>

                </td>


                @else

                <td>

                    <form action="/home/checkout" method="POST">
                        @csrf

                            <input type='hidden' name='bookid' value="{{$book->id}}" />
                            <input type='hidden' name='user' value="{{Auth::User()->id}}" />
                            <input type='submit' value='Reserve'></input>
                          
                    </form>

                </td>
                
                @endhasrole
                



                                
                                

                        
                    </tr>
                    
              
                </tbody>
            </t>
        @endforeach
             

            </div>
        </div>
    </div>
</div>







@endsection