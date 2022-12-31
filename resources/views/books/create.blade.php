@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスクを追加する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('books.create', ['id' => $folder_id]) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
              </div>
              <div class="form-group">
                <label for="writer">著者</label>
                <input type="text" class="form-control" name="writer" id="writer" value="{{ old('writer') }}" />
              </div>
              <div class="form-group">
                <label for="description">説明</label>
                <textarea type="text" class="form-control" name="description" id="description" value="{{ old('description') }}"></textarea>
              </div>
              <div class="text-right">
                <a href="{{ route('books.index', ['id' => $folder_id]) }}" class="btn btn-default">
                  戻る
                </a>
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
