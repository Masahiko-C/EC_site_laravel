<div class="form-group">
  {!! Form::label('stock', '在庫数:') !!}
  {!! Form::text('stock', null, ['class' => 'form-controll']) !!}
</div>
<div class="form-group">
  {!! Form::submit($submitButtun, ['class' => 'btn btn-primary form-control']) !!}
</div>