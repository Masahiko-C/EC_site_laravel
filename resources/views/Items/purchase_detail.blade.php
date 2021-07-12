@extends('layout')

@section('title', '購入明細')

@section('content')
<h1>購入明細</h1>
  <div class="container">
  
  @if(isset($purchases))
  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th>注文番号</th>
        <th>購入日時</th>
        <th>合計金額</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $purchases->order_number }}</td>
        <td>{{ $purchases->created_at }}</td>
        <td>{{ $sum }}円</td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered">
    <thead class="thead-light">
      <th>商品名</th>
      <th>購入時の商品価格</th>
      <th>購入数</th>
      <th>小計</th>
    </thead>
    <tbody>
      @foreach($details as $detail)
      <tr>
        <td>{{ $detail->name }}</td>
        <td>{{ $detail->price }}円</td>
        <td>{{ $detail->quantity }}個</td>
        <td>{{ $detail->price * $detail->quantity}}円</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @else
    <p>購入履歴がないため、明細を表示できません。</p>
  @endif
@endsection