@extends('layout')

@section('title', '商品管理')

@section('content')
  {!! Form::open(['url' => 'items']) !!}
    @include('Items.form', ['submitButtun' => '商品を追加する'])
  {!! Form::close() !!}
@endsection