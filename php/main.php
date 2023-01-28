<?php

//CROSエラーの解消
header("Access-Control-Allow-Origin: *");
//JSON形式で返却すること、文字形式がUTF-8だということの宣言
header('Content-Type: application/json; charset=UTF-8');

//DAOの読み込み
require_once './LoginDAO.php';
require_once './TobacoDAO.php';
require_once './IfDAO.php';

$data = false;

//login_userの引数がある時の処理
if (isset($_POST['login_user']) == true) {

    //配列の宣言（無いとエラーが発生した）
    $data = array();

    $class = new Login();
    $id = $class->login_user($_POST['user_name'], $_POST['user_pass']);
    $class2 = new Tobaco();
    $tobaco = $class2->get_sumtobaco($id);
    $data=array('tobaco' => $tobaco, 'id' => $id);
}

//create_userの引数がある時の処理
if (isset($_POST['create_user']) == true) {

    //配列の宣言（無いとエラーが発生した）
    $data = array();

    $class = new Login();
    $id = $class->create_user($_POST['user_name'], $_POST['user_pass']);
    array_push($data, array('id' => $id));
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

//create_ifstoryの引数がある時の処理
if (isset($_POST['create_ifstory']) == true) {
    $class = new Ifstory();
    $data = $class->create_ifstory($_POST['money'], $_POST['thing'], $_POST['story']);
}

//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;
