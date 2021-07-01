@extends('layout')

@section('title', '商品一覧')

@section('content')
<h1>商品一覧</h1>

  <div class="text-right">
  <form method="get">
    <select name="sort" id="sort">
      <option value="new_arrival">新着順</option>
      <option value="high_price" {{$sort==='high_price'?'selected':''}}>価格が高い順</option>
      <option value="low_price" {{$sort==='low_price'?'selected':''}}>価格が安い順</option>
    </select>
    {!! csrf_field() !!}
  </form>
  </div>
  <script>
    function sort () {
      $.ajax({
        type: "get",
        url: "{{ route('items.index') }}",
        data: {sort:$("#sort").val()},
        datatype: "HTML",
        success : function(data, dataType) {
        var doc = new DOMParser().parseFromString(data, "text/html");
        $("body").html($(doc).find("body").html());;
        },
        error : function() {
          alert('ファイルの取得に失敗しました。');
      }
      });
    }
    $(function(){
      $('#sort').change(sort);
    });
  </script>

  <div class="card-deck">
      <div class="row">
      @foreach($items as $item)
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              {{ $item->name }}
            </div>
            <figure class="card-body">
            <td>
              <img class="card-img" src="../../uploads/{{ $item->image }}">
            </td>
              <figcaption>
                {{ $item->price }}円
                @if($item['stock'] > 0)
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value={{ $item->item_id}}
                  </form>
                @else
                  <p class="text-danger">現在売り切れです。</p>
                @endif
              </figcaption>
            </figure>
          </div>
        </div>
      @endforeach
      </div>
  </div>
  {{ $items->appends(request()->query())->links() }}
@endsection