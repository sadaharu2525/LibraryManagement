@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">詳細情報</div>
          <div class="panel-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                  @endforeach
                </div>
              @endif
              <div class="form-group">
                <label for="title">タイトル</label>
                <div>{{ $book->title }}</div>
              </div>
              <div class="form-group">
                <label for="writer">著者</label>
                <div>{{ $book->writer }}</div>
              </div>
              <div class="form-group">
                <label for="description"></label>
                <div>{{ $book->description }}</div>
              </div>
              <div class="form-group">
                <label for="status">状態</label>
                <span class="label {{ $book->status_class }}">{{ $book->status_label }}</span>
              </div>
              <div class="form-group">
                <label for="due_date">期限</label>
                <div>{{ $book->formatted_due_date }}</div>
              </div>
              <div class="d-flex justify-content-between">
                <a href="{{ route('books.index', ['id' => $book->folder_id]) }}" class="btn btn-default">
                  戻る
                </a>
                <form
                action="{{ route('books.info', ['id' => $book->folder_id, 'book_id' => $book->id]) }}"
                method="POST" class="text-right">
                <button type="submit"class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
                </form>
              @csrf
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
