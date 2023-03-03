<?php
class Login
{
    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql210.phy.lolipop.lan;dbname=LAA1418138-tobaco;charset=utf8', 'LAA1418138', 'smoking');
        return $pdo;
    }

    function create_user($name, $pass)
    {

        $pdo = $this->get_pdo();

        //既に同じ名前で登録されていないかの確認
        $sql =  "SELECT * FROM user_tbl WHERE user_name = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();

        if ($search == null) {
            $sql2 = "INSERT INTO user_tbl (user_name,user_pass) VALUE (?,?);";
            $ps2 = $pdo->prepare($sql2);
            $ps2->bindValue(1, $name, PDO::PARAM_STR);
            $ps2->bindValue(2, $pass, PDO::PARAM_STR);
            $ps2->execute();
            $id = $pdo->lastInsertId();
            if ($id == null) {
                $data = false;
            } else {
                $data = $this->user_information($id);
            }
        } else {
            $data = false;
        }
        return $data;
    }


    function login_user($name, $pass)
    {
        try {
            $pdo = $this->get_pdo();

            $sql =  "SELECT * FROM user_tbl WHERE user_name = ? AND user_pass = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $name, PDO::PARAM_STR);
            $ps->bindValue(2, $pass, PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            if ($search != null) {
                foreach ($search as $row) {
                    $data = $this->user_information($row['user_id']);
                }
            } else {
                $data = false;
            }
        } catch (Exception $e) {
            $data = $e;
        } catch (Error $e) {
            $data = $e;
        }

        return $data;
    }


    function user_information($id)
    {
        try {
            $pdo = $this->get_pdo();

            $sql =  "SELECT * FROM user_tbl WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetchAll();
            if ($search != null) {
                foreach ($search as $row) {
                    $data = array('id' => $row['user_id'], 'name' => $row['user_name'], 'chk' => true);
                }
            } else {
                $data = false;
            }
        } catch (Exception $e) {
            $data = $e;
        } catch (Error $e) {
            $data = $e;
        }

        return $data;
    }
}
