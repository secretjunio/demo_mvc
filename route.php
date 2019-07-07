<?php
$controllers = array(
  'pages' => ['home', 'error']
  'posts' => ['index','showPost'], //
); // C�c controllers trong h? th?ng v� c�c action c� th? g?i ra t? controller d�.

// N?u c�c tham s? nh?n du?c t? URL kh�ng h?p l? (kh�ng thu?c list controller v� action c� th? g?i
// th� trang b�o l?i s? du?c g?i ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'pages';
  $action = 'error';
}

// Nh�ng file d?nh nghia controller v�o d? c� th? d�ng du?c class d?nh nghia trong file d�
include_once('controllers/' . $controller . '_controller.php');
// T?o ra t�n controller class t? c�c gi� tr? l?y du?c t? URL sau d� g?i ra d? hi?n th? tr? v? cho ngu?i d�ng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
?>