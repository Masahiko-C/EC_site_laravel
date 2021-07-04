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