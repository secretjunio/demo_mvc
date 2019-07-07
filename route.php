<?php
$controllers = array(
  'pages' => ['home', 'error']
  'posts' => ['index','showPost'], //
); // Các controllers trong h? th?ng và các action có th? g?i ra t? controller dó.

// N?u các tham s? nh?n du?c t? URL không h?p l? (không thu?c list controller và action có th? g?i
// thì trang báo l?i s? du?c g?i ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'pages';
  $action = 'error';
}

// Nhúng file d?nh nghia controller vào d? có th? dùng du?c class d?nh nghia trong file dó
include_once('controllers/' . $controller . '_controller.php');
// T?o ra tên controller class t? các giá tr? l?y du?c t? URL sau dó g?i ra d? hi?n th? tr? v? cho ngu?i dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
?>