@extends('layout')

@section('title', '商品管理')

@section('content')
  {!! Form::open(['route' => 'items.store', 'files' => 'true']) !!}
    @include('Items.form', ['submitButtun' => '商品を追加する'])
  {!! Form::close() !!}

  @if(count($items) > 0)
    <table class="table table-borderd text-center">
      <thead class="thead-light">
        <tr>
          <th>商品画像</th>
          <th>商品名</th>
          <th>価格</th>
          <th>在庫数</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
          <!-- <tr> -->
            <td><img src="../../uploads/{{ $item->image }}"width="200px" height="200px"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}円</td>
            <!-- <td>在庫数変更の処理</td> -->
            <!-- <td>ステータス変更の処理</td> -->
            <!-- <td>削除の処理</td> -->

          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>商品はありません</p>
  @endif

@endsection