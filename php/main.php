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
    $class = new Tobaco();
    $tobaco = $class->get_sumtobaco($_POST['user_id']);
    $data = array('tobaco' => $tobaco);
}

//create_userの引数がある時の処理
if (isset($_POST['create_user']) == true) {
    $class = new Login();
    $id = $class->create_user();

    $class = new Tobaco();
    $class->create_smoking_date($id, $_POST['number'], 2000, 0, 0,);

    $data = $id;
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

//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;
