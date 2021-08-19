<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book=Book::all();
        return response()->json([
            'status' => 200,
            'data' => $book
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->date_of_issue = $request->input('date_of_issue');
        $book->save();

        return response()->json([
            'status' => 201,
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        if($book){
            return response()->json([
                'status' => 200,
                'data' => $book
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan.'
            ], 404);
        }
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
        $book = Book::find($id);
        if($book){
            $book->title = $request->title ? $request->title : $book->title;
            $book->description = $request->description ? $request->description : $book->description;
            $book->author = $request->author ? $request->author : $book->author;
            $book->publisher = $request->publisher ? $request->publisher : $book->publisher;
            $book->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
            $book->save();

            return response()->json([
                'status' => 200,
                'data' => $book
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan, gagal update data.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::where("id", $id)->first();
        if($book){
            $book->delete();
            return response()->json([
                'status' => 200,
                'data' => $book
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan, gagal menghapus data.'
            ], 404);
        }
    }
}