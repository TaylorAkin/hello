<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Book;
use App\Checkout;

use DB;


class BookSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booksearch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usercheckout(Request $request)
    {
        
       $checkedbook = $request->request->all();
   

       $checkout = Checkout::create([
        "bookid" => $checkedbook['bookid'],
        "userid" => $checkedbook['user'],
    ]);
    dd($checkout);
    $books = DB::table('checkout')->get();
  
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $searchformrequest)
    {
        $client = new Client();
        
        // $api_response = $client->get('https://www.googleapis.com/books/v1/volumes?q='.$searchformrequest.'&key=AIzaSyCR-OlPgBY-z5JcOAvkpxlYOPEwDKSUCpw');
        $api_response = $client->get('https://www.googleapis.com/books/v1/volumes?q=' . $searchformrequest['booktitle'] . '&key=AIzaSyCR-OlPgBY-z5JcOAvkpxlYOPEwDKSUCpw');
        $books_json = json_decode($api_response->getBody()->getContents());
        // dd($books_json);
        $books = $books_json->items;

        return view('booksearch', ['books' => $books]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $books = DB::table('books')->get();
        //dd($request);
        $book = Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "isbn" => $request->isbn
        ]);
        $books = DB::table('books')->get();
        return view('catalog',['books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteitem(Request $request){


        //dd($request);
       DB::table('books')->where('title', '=', $request->book)->delete();
       $books = DB::table('books')->get();
        return view('catalog',['books'=>$books]);
    }
}
