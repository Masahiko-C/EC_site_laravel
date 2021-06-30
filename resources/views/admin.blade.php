@extends('layout')

@section('title', '商品管理')

@section('content')
<h1>商品管理</h1>

  {!! Form::open(['route' => 'admin.store', 'files' => 'true']) !!}
    @include('Admins.form_create', ['submitButtun' => '商品を追加する'])
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
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
          <tr @if($item->status == 2) class="close_item" @endif>
            <td><img src="../../uploads/{{ $item->image }}"width="200px" height="200px"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}円</td>
            <td>
            {!! Form::model($item, ['method' => 'PATCH', 'route' => ['admin.update', $item->item_id]]) !!}
              @include('Admins.form_update', ['submitButtun' => '更新する'])
            {!! Form::close() !!}
            </td>
            <td>
            @if ($item->status == '1')
              {!! Form::open(['method' => 'PATCH', 'route' => ['admin.update', $item->item_id]])!!}
                <div class="form-group">
                  {!! Form::hidden('status', '2')!!}
                  {!! Form::submit('公開 => 非公開', ['class' => 'btn btn-primary form-control']) !!}
                </div>
              {!! Form::close() !!}
            @else
              {!! Form::open(['method' => 'PATCH', 'route' => ['admin.update', $item->item_id]])!!}
                <div class="form-group">
                  {!! Form::hidden('status', '1')!!}
                  {!! Form::submit('非公開 => 公開', ['class' => 'btn btn-primary form-control']) !!}
                </div>
              {!! Form::close() !!}
            @endif
            </td>
            <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroy', $item->item_id], 'class' => 'd-inline']) !!}
              {!! Form::submit('削除', ['class' => 'btn btn-danger', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
            {!! Form::close() !!}
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>商品はありません</p>
  @endif
  <script>
    $('.delete').on('click', () => confirm('本当に削除しますか？'))
  </script>
@endsection