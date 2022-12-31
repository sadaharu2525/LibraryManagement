<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Folder;
use App\Book;
use App\Http\Requests\CreateBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(int $id)
    {  
        // 全てのフォルダを取得する
        $folders = Folder::all();

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $books = $current_folder->books()->get();

        if (is_null($current_folder)) {
            abort(404);
        }

        // 貸出中で期限が過ぎていればステータスを延滞中に変更
        foreach($books as $book) {
            if($book->due_date != NULL && $book->status == 2)
            {
                $date = Carbon::parse($book->due_date);
                
                if($date->lte(Carbon::today())) {
                    $book->status = 3;
                }
            }
        }
        return view('books/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'books' => $books,
        ]);
    }

    public function create(int $id, CreateBook $request)
    {
        $current_folder = Folder::find($id);

        $book = new Book();
        $book->title = $request->title;
        $book->writer = $request->writer;
        $book->description = $request->description;

        $current_folder->books()->save($book);

        return redirect()->route('books.index', [
            'id' => $current_folder->id,
        ]);
    }

    public function showCreateForm(int $id)
    {
        return view('books/create', [
            'folder_id' => $id
        ]);
    }

    public function showInfoForm(int $id, int $book_id)
    {
        $book = Book::find($book_id);

        return view('books/info', [
            'book' => $book,
        ]);
    }

    public function info(int $id, int $book_id, InfoBook $request)
    {
        // 1
        $book = Book::find($book_id);

        // 2
        $book->title = $request->title;
        $book->status = $request->status;
        $book->due_date = $request->due_date;
        $book->save();

        // 3
        return redirect()->route('books.index', [
            'id' => $book->folder_id,
        ]);
    }
    // ステータス変更
    public function changeStatus(int $book_id)
    {
        $book = Book::find($book_id);

        if($book->status == 1) {
            $book->status = 2;
            $book->due_date = Carbon::today()->addWeek(2);
        } else if($book->status == 2 || $book->status == 3) {
            $book->status = 1;
            $book->due_date = null;
        }
        $book->save();

        return redirect()->route('books.index', [
            'id' => $book->folder_id,
        ])->with('successMessage', "図書の登録に成功しました。");
    }
}
