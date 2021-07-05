<?php

function get_get($name){
  if(isset($_GET[$name]) === true){
    return $_GET[$name];
  };
  return '';
}

function delete_form($route, $item, $label='削除'){
  $form =  Form::open(['method' => 'DELETE', 'route' => [$route, $item], 'class' => 'd-inline']);
  $form .=  Form::submit($label, ['class' => 'btn btn-danger', 'onclick' => "return confirm('本当に削除しますか?')"]);
  $form .= Form::close();

  return $form;
}

function update_form($array, $array_id, $route, $value, $name, $label='変更する'){
  $form = Form::model($array, ['method' => 'PATCH', 'route' => [$route, $array_id]]);
  $form .= Form::label($value, $name);
  $form .= Form::text($value, null, ['class' => 'form-controll']);
  $form .= Form::submit($label, ['class' => 'btn btn-primary form-control']);
  $form .= Form::close();

  return $form;
}
