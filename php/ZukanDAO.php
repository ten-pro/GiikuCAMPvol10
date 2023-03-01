<?php
class Zukan
{
    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql210.phy.lolipop.lan;dbname=LAA1418138-tobaco;charset=utf8', 'LAA1418138', 'smoking');
        return $pdo;
    }

    function create_zukan($user_id, $tobaco_id)
    {

        $pdo = $this->get_pdo();
        $sql = "INSERT INTO zukan_tbl (user_id,tobaco_id,tobaco_name) VALUE (?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_INT);
        $ps->bindValue(2, $tobaco_id, PDO::PARAM_INT);
        $name = $this->get_tobaconame($tobaco_id);
        $ps->bindValue(3, $name, PDO::PARAM_STR);

        try {
            $ps->execute();
            $data = true;
        } catch (Exception $e) {
            $data = $e;
        } catch (Error $e) {
            $data = $e;
        }

        return $data;
    }

    function get_tobaconame($id)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT tobaco_name FROM tobaco_tbl WHERE tobaco_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);

        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $data = $row['tobaco_name'];
        }
        if ($data == null)
            $data = false;

        return $data;
    }

    function get_tobacoid($barcode)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT tobaco_id FROM tobaco_tbl WHERE jan_code = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $barcode, PDO::PARAM_INT);

        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $data = $row['tobaco_id'];
        }
        if ($data == null)
            $data = false;

        return $data;
    }

    function get_zukanlist($id)
    {
        $data = [];
        $pdo = $this->get_pdo();
        $sql = "SELECT tobaco_name FROM zukan_tbl WHERE user_id = ? GROUP BY tobaco_name";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);

        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            switch ($row['tobaco_name']) {
                case 'ピース':
                    $name = 1;
                    break;
                case 'マルボロ':
                    $name = 2;
                    break;
                case 'ケント':
                    $name = 3;
                    break;
                case 'ウィンストン':
                    $name = 4;
                    break;
                case 'アメリカンスピリット':
                    $name = 5;
                    break;
                case 'ハイライト':
                    $name = 6;
                    break;
                case 'わかば':
                    $name = 7;
                    break;
                default:
                    $name = 100;
            }
            array_push($data, $name);
        }
        if ($data == null)
            $data = false;

        return $data;
    }
}
