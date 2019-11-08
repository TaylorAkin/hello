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




                       <div class="panel panel-default">
                        <div class="panel-heading"><h1>Checked Out Books</h1></div>
                            <div class="panel-body">
                                <div class="row">
                                    
                                    
                                    <div class="col-sm-6 col-md-4">
                                        <ul class="thumbnail">
                                                
                                            @isset($checkedbooks)
                                            @foreach ($checkedbooks as $checkbook)
                            
                                                <li>{{$checkbook->book['title']}}</li>
                                                
                                            @endforeach
                                            @endisset

                                            </ul>
                                        </div>

                            
                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

