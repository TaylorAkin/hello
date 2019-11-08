@extends('layout')

@section('content')

        <div class="container text-center"><h1>Card Holders</h1>
            <div class="row">       
                <div class="col">
                        <ul class="thumbnail list-unstyled">
                                         
                        @isset($cardholders)
                        @foreach ($cardholders as $cardholder)
                            
                            <li>CardHolder:  {{$cardholder->name}}</li>
                            <li>Email:  {{$cardholder->email}}</li>
                            <br>
                                

                        @endforeach
                        @endisset

                                       
                        </ul>
                </div>
                                                                       
            </div>
        </div>


@endsection