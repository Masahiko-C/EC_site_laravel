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
                    <td>{{ $purchase->amount }}円</td>
                    <td>

                    <!-- <form method="post" action="purchase_details.php">
                        <input type="submit" value="購入明細表示" class="btn btn-secondary">
                        <input type="hidden" name="order_number" value="{{ $purchase->order_number }}">
                    </form>
 -->
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