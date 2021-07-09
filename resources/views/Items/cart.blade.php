@extends('layout')

@section('title', 'カート')

@section('content')
  @if(count($carts) > 0)
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
          <th>商品画像</th>
          <th>商品名</th>
          <th>価格</th>
          <th>購入数</th>
          <th>小計</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($carts as $cart)
        <tr>
          <td><img src="../../uploads/{{ get_array($cart->items)->image }}" class="item_image"></td>
          <td>{{ get_array($cart->items)->name }}</td>
          <td>{{ get_array($cart->items)->price }}円</td>
          <td>{!! update_form($cart, $cart->cart_id, 'carts.update', 'amount', '商品個数：') !!}</td>
          <td>{{ $cart->amount * get_array($cart->items)->price }}円</td>
          <td>{!! delete_form('carts.destroy', $cart->cart_id) !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p class="text-right">合計金額: {{ $total_price }}円</p>
    {!! Form::open(['route' => 'carts.settle']) !!}
      {!! Form::submit('購入する', ['class' => 'btn btn-block btn-primary']) !!}
    {!! Form::close() !!}

  @else
    <p>カートに商品はありません。</p>
  @endif
@endsection