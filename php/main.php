<?php

//CROSエラーの解消
header("Access-Control-Allow-Origin: *");
//JSON形式で返却すること、文字形式がUTF-8だということの宣言
header('Content-Type: application/json; charset=UTF-8');

//DAOの読み込み
require_once './LoginDAO.php';
require_once './TobacoDAO.php';
require_once './IfDAO.php';
require_once './ZukanDAO.php';

$data = false;

//get_userの引数がある時の処理
if (isset($_POST['get_user']) == true) {

    //配列の宣言（無いとエラーが発生した）
    $data = array();
    $class = new Tobaco();
    $tobaco = $class->get_sumtobaco($_POST['user_id']);
    $class = new Zukan();
    $listdata = $class->get_zukanlist($_POST['user_id']);
    $data = array('tobaco' => $tobaco,'zukan' => $listdata);
}

//create_userの引数がある時の処理
if (isset($_POST['create_user']) == true) {
    $class = new Login();
    $data = $class->create_user($_POST['user_name'],$_POST['user_pass']);

    $class2 = new Tobaco();
    $class2->create_smoking_date($id, $_POST['number'], 2000, 0, 0,);
}

//login_userの引数がある時の処理
if (isset($_POST['login_user']) == true) {
    $class = new Login();
    $data = $class->login_user($_POST['user_name'],$_POST['user_pass']);
}

//create_tobacoの引数がある時の処理
if (isset($_POST['create_tobaco']) == true) {
    $class = new Tobaco();
    $data = $class->create_tobaco($_POST['tobaco_name'], $_POST['jan_code']);
}

//create_smokingの引数がある時の処理
if (isset($_POST['create_smoking']) == true) {
    $class = new Tobaco();
    $data = $class->create_smoking($_POST['user_id'], $_POST['number']);
}

//create_smoking_dateの引数がある時の処理
if (isset($_POST['create_smoking_date']) == true) {
    $class = new Tobaco();
    $data = $class->create_smoking_date($_POST['user_id'], $_POST['number'], $_POST['year'], $_POST['morth'], $_POST['date'],);
}

//create_ifstoryの引数がある時の処理
if (isset($_POST['create_ifstory']) == true) {
    $class = new Ifstory();
    $data = $class->create_ifstory($_POST['money'], $_POST['thing'], $_POST['story']);
}

//create_zukanの引数がある時の処理
if (isset($_POST['create_zukan']) == true) {
    $class = new Zukan();
    $data = $class->create_zukan($_POST['user_id'], $_POST['tobaco_id']);
}

//get_zukanlistの引数がある時の処理
if (isset($_POST['get_zukanlist']) == true) {
    $class = new Zukan();
    $data = $class->get_zukanlist($_POST['user_id']);
}

//scan_barcodeの引数がある時の処理
if (isset($_POST['scan_barcode']) == true) {
    $class = new Zukan();
    $tobaco_id = $class->get_tobacoid($_POST['barcode']);
    if($tobaco_id!=false)
    $data = $class->create_zukan($_POST['user_id'],$tobaco_id);
}

//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;
