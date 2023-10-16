@extends('adminlte::page')

@section('title', 'カート')

@section('content_header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./bootstrap-icons-1.10.2/bootstrap-icons.css">
</head>

<body>


  <button type="button" class="btn btn-info">
    <h1>登録済み商品一覧</h1>
  </button>
  @stop

  @section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">登録済み商品一覧</h3>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>名前</th>
                <th>種別</th>
                <th>詳細</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
              <tr>
                <td>{{ $item->pivot->id }}</td> <!--IDが連番になる-->
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->detail }}</td>
                <td>
                  <form action="{{ url('/cart/delete', $item->pivot->id) }}" class="" method="post" name="deleteform{{ $item->pivot->id }}">
                    @csrf <!--これがないとPOSTできない-->
                    @method('DELETE')
                    {{--<input type="hidden" class="" name="id" value="{{ $item->pivot->id }}">--}}
                    <a href="javascript:deleteform{{ $item->pivot->id }}.submit()"> <!--IDが3ならdeleteform3という名前のフォームをsubmitするようになった-->
                    <svg class="defs" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                    </svg>
                    </a>
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
  </div>
  @stop

  @section('css')
  @stop

  @section('js')
  @stop
</body>

</html>