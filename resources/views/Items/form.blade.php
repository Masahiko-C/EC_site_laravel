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
      {!! Form::label('published_at', 'Publish On:') !!}
      {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('status', 'ステータス:') !!}
      {!! Form::select('status', ['公開', '非公開']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit($submitButtun, ['class' => 'btn btn-primary form-control']) !!}
    </div>