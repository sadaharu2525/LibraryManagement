@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
          <div class="panel-body">
            <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
              フォルダを追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($folders as $folder)
              <a
              href="{{ route('books.index', ['id' => $folder->id]) }}"
              class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
              >
                {{ $folder->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">図書</div>
          <div class="panel-body">
            <div class="text-right">
              <a href="{{ route('books.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                図書を追加する
              </a>
            </div>
          </div>
          @if (session('successMessage'))
          <div class="alert alert-success text-center">
            {{ session('successMessage') }}
          </div> 
          @endif
          <table class="table table-striped">
            <thead>
              <tr>
                <th>タイトル</th>
                <th>著者</th>
                <th>状態</th>
                <th>期限</th>
                <th></th>
                <th>変更</th>
              </tr>
            </thead>
            <tbody>
              @foreach($books as $book)
                <tr>
                  <td>{{ $book->title }}</td>
                  <td>{{ $book->writer }}</td>
                  <td>
                    <span class="label {{ $book->status_class }}">{{ $book->status_label }}</span>
                  </td>
                  <td>{{ $book->formatted_due_date }}</td>
                  <td><a href="{{ route('books.info', ['id' => $book->folder_id, 'book_id' => $book->id]) }}">詳細</a></td>
                  <td>
                    <form action="{{ route('books.index', ['id' => $book->id] ) }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary btn-block" value="{{ $book->status }}">{{ $book->status == 1 ? "貸出" : "返却"}}</button>
                    </form>
                  </td>
                    
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection