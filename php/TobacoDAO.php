<?php
class Tobaco
{
    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql210.phy.lolipop.lan;dbname=LAA1418138-tobaco;charset=utf8', 'LAA1418138', 'smoking');
        return $pdo;
    }


    function chk_jan($jan)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM tobaco_tbl WHERE jan_code = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $jan, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null) {
            $data = false;
        } else {
            $data = true;
        }
        return $data;
    }

    function create_tobaco($name, $jan)
    {

        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO tobaco_tbl (tobaco_name,jan_code) VALUE (?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $jan, PDO::PARAM_STR);

        $chkname = $this->chk_jan($jan);
        if ($chkname == false) {
            $ps->execute();
            $data = "OK";
        } else {
            $data = "NG";
        }
        return $data;
    }


    function create_smoking($user, $num)
    {
        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO smoking_tbl (user_id,smoking_number,smoking_year,smoking_morth,smoking_day) VALUE (?,?,?,?,?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user, PDO::PARAM_INT);
        $ps->bindValue(2, $num, PDO::PARAM_INT);
        $ps->bindValue(3, date("y"), PDO::PARAM_INT);
        $ps->bindValue(4, date("n"), PDO::PARAM_INT);
        $ps->bindValue(5, date("j"), PDO::PARAM_INT);

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

    function search_m($id, $year, $morth)
    {

        $pdo = $this->get_pdo();
        $sql = "SELECT SUM(smoking_number) AS sum FROM smoking_tbl WHERE user_id = ? AND smoking_year = ? AND smoking_morth = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);
        $ps->bindValue(2, $year, PDO::PARAM_INT);
        $ps->bindValue(3, $morth, PDO::PARAM_INT);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $data = $row['sum'];
        }
        if ($data == null)
            $data = 0;
        return $data;
    }

    function search_a($id)
    {

        $pdo = $this->get_pdo();
        $sql = "SELECT SUM(smoking_number) AS sum FROM smoking_tbl WHERE user_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $data = $row['sum'];
        }
        if ($data == null)
            $data = 0;
        return $data;
    }

    function search_d($id)
    {

        $pdo = $this->get_pdo();
        $sql = "SELECT SUM(smoking_number) AS sum FROM smoking_tbl WHERE user_id = ? AND smoking_year = ? AND smoking_morth = ? AND smoking_day = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);
        $ps->bindValue(2, date("y"), PDO::PARAM_INT);
        $ps->bindValue(3, date("n"), PDO::PARAM_INT);
        $ps->bindValue(4, date("j"), PDO::PARAM_INT);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $data = $row['sum'];
        }
        if ($data == null)
            $data = 0;
        return $data;
    }

    function get_sumtobaco($id)
    {

        //配列の宣言（無いとエラーが発生した）
        $data = array();

        //吸ったタバコの量を取得
        $thismorth_tobaco = $this->search_m($id, date("y"), date("m"));
        if (date("m") == 1) {
            $onemorth_tobaco = $this->search_m($id, date("y") - 1, 12);
            $twomorth_tobaco = $this->search_m($id, date("y") - 1, 11);
        } else if (date("m") == 2) {
            $onemorth_tobaco = $this->search_m($id, date("y"), date("m") - 1);
            $twomorth_tobaco = $this->search_m($id, date("y") - 1, 12);
        } else {
            $onemorth_tobaco = $this->search_m($id, date("y"), date("m") - 1);
            $twomorth_tobaco = $this->search_m($id, date("y"), date("m") - 2);
        }
        $all_tobaco = $this->search_a($id);
        $today_tobaco = $this->search_d($id);

        //1日のタバコ関係
        $thismorth_money = floor($thismorth_tobaco * 27.5);
        $thismorth_money_zei = floor($thismorth_tobaco * 27.5 * 0.617);

        $thismorth = array('num' => $thismorth_tobaco, 'money' => $thismorth_money, 'tax' => $thismorth_money_zei);

        //今月のタバコ関係
        $onemorth_money = floor($onemorth_tobaco * 27.5);
        $onemorth_money_zei = floor($onemorth_tobaco * 27.5 * 0.617);

        $onemorth = array('num' => $onemorth_tobaco, 'money' => $onemorth_money, 'tax' => $onemorth_money_zei);


        $data = array('this_morth' => $thismorth,'one_morth'=> $onemorth);
        // ,'one_morth' => $onemorth,'two_morth' => $twomorth,'all' => $all,'today' => $today);

        return $data;
    }
}
