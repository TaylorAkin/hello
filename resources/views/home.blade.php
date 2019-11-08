@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!




                       
                        <div class="container text-center">
                            <h1>Checked Out Books</h1>
                            <div class="row">
                                
                                    
                                    
                                    <div class="col">
                                        <ul class="thumbnail list-unstyled">
                                                
                                            @isset($checkedbooks)
                                            @foreach ($checkedbooks as $checkbook)
                            
                                                <li>Book Title:  {{$checkbook->book['title']}}</li>
                                                <p>Checked Out By: <h5>{{$checkbook->cardholder['name']}}</h5></p>

                                            @endforeach
                                            @endisset

                                       
                                        </ul>
                                    </div>

                            <h1 class="text-center">COME TO THE LIBRARY AND GET YOUR BOOK</h1>

                            
                                

                            
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

