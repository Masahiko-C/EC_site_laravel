@extends('layout')

@section('title', 'ご購入ありがとうございました！')

@section('content')
  <h1>ご購入ありがとうございました！</h1>
    <table>
    <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          @php
            $total =0;
          @endphp

          @foreach($results as $result)
          <tr>
            <td><img src="../../uploads/{{ get_array($result->items)->image }}"width="200px" height="200px"></td>
            <td>{{ get_array($result->items)->name }}</td>
            <td>{{ get_array($result->items)->price }}円</td>
            <td>{{ $result->quantity }}</td>
            <td>{{ $result->quantity * get_array($result->items)->price }}円</td>
            @php
              $total += $result->quantity * get_array($result->items)->price
            @endphp
          </tr>
          @endforeach
        </tbody>
      </table>
      <p class="text-right">合計金額: {{ $total }}円</p>
    </table>
@endsection