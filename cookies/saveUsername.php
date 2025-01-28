<?php
function saveUsername($email){
  $name = substr($email,0,strpos($email,'.'));
  setCookie('name',$name,time()+3600,'/');
}
