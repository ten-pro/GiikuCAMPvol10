<?php
class Ifstory
{

    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql210.phy.lolipop.lan;dbname=LAA1418138-tobaco;charset=utf8', 'LAA1418138', 'smoking');
        return $pdo;
    }

    function create_ifstory($money, $thing, $story)
    {
        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO if_tbl (if_money,if_thing,if_story) VALUE (?,?,?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $money, PDO::PARAM_INT);
        $ps->bindValue(2, $thing, PDO::PARAM_STR);
        $ps->bindValue(3, $story, PDO::PARAM_STR);

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
    
}
