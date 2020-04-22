<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Borrow;

class BooksController extends Controller
{
    public function list() {
        $content = request("content");
        $field = request("field");

        if ($content == null or $content == '')
            $books = Book::all();
        else
            $books = Book::where($field, 'like', '%'.$content.'%')->get();

        return response()->json($books);
    }

    public function detail($id) {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function record($id) {
        $user = User::find($id);
        $code = 200;
        if ($user->role == 0)
            $records = User::find($id)->borrows;
        else {
            $records = Borrow::where('staff_id', '=', $id)->get();
            $code = 201;
        }
        foreach($records as $record) {
            $record['title'] = Book::find($record->book_id)->title;
        }
        return response()->json($records, $code);
    }
}
