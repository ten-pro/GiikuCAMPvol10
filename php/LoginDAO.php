<?php
class Login
{
    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql210.phy.lolipop.lan;dbname=LAA1418138-tobaco;charset=utf8', 'LAA1418138', 'smoking');
        return $pdo;
    }

    function create_user()
    {

        $pdo = $this->get_pdo();
        $sql = "INSERT INTO user_tbl () VALUE ();";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $id = $pdo -> lastInsertId();
        if ($id == null) {
            $data = false;
        } else {
            $data = $id;
        }
        return $data;
    }
}
