    <div class="form-group">
      {!! Form::label('name', '名前:') !!}
      {!! Form::text('name', null, ['class' => 'form-controll']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('price', '価格:') !!}
      {!! Form::number('price', null, ['class' => 'form-controll']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('stock', '在庫数:') !!}
      {!! Form::text('stock', null, ['class' => 'form-controll']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('image', '商品画像:') !!}
      {!! Form::file('image') !!}
    </div>
    <div class="form-group">
      {!! Form::label('status', 'ステータス:') !!}
      {!! Form::select('status', ['1' => '公開', '0' => '非公開']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit($submitButtun, ['class' => 'btn btn-primary']) !!}
    </div>