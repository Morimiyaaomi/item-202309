@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<!DOCTYPE html>
<html lang="ja">
<h1>商品一覧</h1>
@stop

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-icons-1.10.2/bootstrap-icons.css">
</head>

<body>
    @section('content')
    <form method="GET" action="{{ url('/items/search') }}">
        <input type="search" placeholder="アイテムを入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <div>
            <button type="submit" class="btn btn-info">検索</button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url('/items') }}" class="text-white">
                    クリア
                </a>
            </button>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-warning">
                        <h3 class="card-title">商品一覧</h3>
                    </button>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
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
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->detail }}</td>
                                <td>
                                    <form action="{{ url('/cart/add') }}" class="" method="post">
                                        @csrf <!--これがないとPOSTできない-->
                                        <input type="hidden" class="" name="item_id" value="{{ $item->id }}">
                                        <input type="submit" class="" value="登録済み商品"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-cart4" viewBox="1 1 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                        </svg>
                                    </form>
                                </td>
                                <td>
                                <form action="{{ route('item.destroy', ['id' => $item->id]) }}" method="POST"> <!--itemテーブルのidカラムを取り出す-->
                                        @csrf <!--これがないとPOSTできない-->
                                        <input type="hidden" class="" name="item_id" value="{{ $item->id }}">
                                        <input type="submit" class="" value="削除">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <!--下記のようにページネーターを記述するとページネートで次ページに遷移しても、検索結果を保持する
    {--{ $items->appends(request()->input())->links() }--} -->
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