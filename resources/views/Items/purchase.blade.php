@extends('layout')

@section('title', '購入履歴')

@section('content')
<h1>購入履歴</h1>

<div class="container">

    @if(count($purchases) > 0)  
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>注文番号</th>
                <th>購入日時</th>
                <th>該当の注文の合計金額</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->order_number }}</td>
                    <td>{{ $purchase->created_at }}</td>
                    @php
                        $sum = 0;
                    foreach($purchase->purchase_details as $detail){
                        $sum +=($detail->price);
                    }
                    @endphp
                    <td>{{ $sum }}円</td>
                    <td>
                    {!! Form::open(['method' => 'post', 'route' => ['purchases.show', $purchase->order_number]]) !!}
                      <div class="form-group">
                        {!! Form::submit('明細を表示', ['class' => 'btn btn-primary form-control']) !!}
                      </div>
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <p>購入履歴はありません。</p>
    @endif
</div> 
@endsection