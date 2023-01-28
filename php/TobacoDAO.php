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
        $ps->bindValue(3, date("Y"), PDO::PARAM_INT);
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

    function create_smoking_date($user, $num, $year, $morth, $date)
    {
        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO smoking_tbl (user_id,smoking_number,smoking_year,smoking_morth,smoking_day) VALUE (?,?,?,?,?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user, PDO::PARAM_INT);
        $ps->bindValue(2, $num, PDO::PARAM_INT);
        $ps->bindValue(3, $year, PDO::PARAM_INT);
        $ps->bindValue(4, $morth, PDO::PARAM_INT);
        $ps->bindValue(5, $date, PDO::PARAM_INT);

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
        $ps->bindValue(2, date("Y"), PDO::PARAM_INT);
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

    function search_if($money)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT if_thing,if_story FROM if_tbl WHERE if_money <= ? ORDER BY if_money DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $money, PDO::PARAM_INT);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $if_thing = $row['if_thing'];
            $if_story = $row['if_story'];
        }
        if ($search == null)
            $data = 0;
        else
            $data = array('if_money' => $if_thing, 'if_story' => $if_story);

        return $data;
    }

    function get_sumtobaco($id)
    {

        //配列の宣言（無いとエラーが発生した）
        $data = array();

        //吸ったタバコの量を取得
        $thismorth_tobaco = $this->search_m($id, date("Y"), date("m"));
        if (date("m") == 1) {
            $onemorth_tobaco = $this->search_m($id, date("Y") - 1, 12);
            $twomorth_tobaco = $this->search_m($id, date("Y") - 1, 11);
        } else if (date("m") == 2) {
            $onemorth_tobaco = $this->search_m($id, date("Y"), date("m") - 1);
            $twomorth_tobaco = $this->search_m($id, date("Y") - 1, 12);
        } else {
            $onemorth_tobaco = $this->search_m($id, date("Y"), date("m") - 1);
            $twomorth_tobaco = $this->search_m($id, date("Y"), date("m") - 2);
        }
        $all_tobaco = $this->search_a($id);
        $today_tobaco = $this->search_d($id);

        //今月のタバコ関係
        $thismorth_money = floor($thismorth_tobaco * 27.5);
        $thismorth_money_zei = floor($thismorth_tobaco * 27.5 * 0.617);
        $thismorth_tar = $thismorth_tobaco * 6;
        $thismorth_nicotine = $thismorth_tobaco * 4;
        $thismorth_time = $thismorth_tobaco * 4;
        $lifespan = floor($thismorth_tobaco * 14.4);
        $thismorth_lifespan = "";
        if ($lifespan > 525600) {
            $thismorth_lifespan .= floor($lifespan / 525600) . "年";
            $lifespan = floor($lifespan % 525600);
        }
        if ($lifespan > 43800) {
            $thismorth_lifespan .= floor($lifespan / 43800) . "か月";
            $lifespan = floor($lifespan % 43800);
        }
        if ($lifespan > 1440) {
            $thismorth_lifespan .= floor($lifespan / 1440) . "日";
            $lifespan = floor($lifespan % 1440);
        }
        if ($lifespan > 60) {
            $thismorth_lifespan .= floor($lifespan / 60) . "時間";
            $lifespan = floor($lifespan % 60);
        }
        $if = $this->search_if($thismorth_money);



        $thismorth = array('num' => $thismorth_tobaco, 'money' => $thismorth_money, 'tax' => $thismorth_money_zei, 'tar' => $thismorth_tar, 'nicotine' => $thismorth_nicotine, 'time' => $thismorth_time, 'lifespan' => $thismorth_lifespan, 'if' => $if);

        //先月のタバコ関係
        $onemorth_money = floor($onemorth_tobaco * 27.5);
        $onemorth_money_zei = floor($onemorth_tobaco * 27.5 * 0.617);
        $onemorth_tar = $onemorth_tobaco * 6;
        $onemorth_nicotine = $onemorth_tobaco * 4;
        $onemorth_time = $onemorth_tobaco * 4;
        $lifespan = floor($onemorth_tobaco * 14.4);
        $onemorth_lifespan = "";
        if ($lifespan > 525600) {
            $onemorth_lifespan .= floor($lifespan / 525600) . "年";
            $lifespan = floor($lifespan % 525600);
        }
        if ($lifespan > 43800) {
            $onemorth_lifespan .= floor($lifespan / 43800) . "か月";
            $lifespan = floor($lifespan % 43800);
        }
        if ($lifespan > 1440) {
            $onemorth_lifespan .= floor($lifespan / 1440) . "日";
            $lifespan = floor($lifespan % 1440);
        }
        if ($lifespan > 60) {
            $onemorth_lifespan .= floor($lifespan / 60) . "時間";
            $lifespan = floor($lifespan % 60);
        }
        $if = $this->search_if($onemorth_money);



        $onemorth = array('num' => $onemorth_tobaco, 'money' => $onemorth_money, 'tax' => $onemorth_money_zei, 'tar' => $onemorth_tar, 'nicotine' => $onemorth_nicotine, 'time' => $onemorth_time, 'lifespan' => $onemorth_lifespan, 'if' => $if);


        //先々月のタバコ関係
        $twomorth_money = floor($twomorth_tobaco * 27.5);
        $twomorth_money_zei = floor($twomorth_tobaco * 27.5 * 0.617);
        $twomorth_tar = $twomorth_tobaco * 6;
        $twomorth_nicotine = $twomorth_tobaco * 4;
        $twomorth_time = $twomorth_tobaco * 4;
        $lifespan = floor($twomorth_tobaco * 14.4);
        $twomorth_lifespan = "";
        if ($lifespan > 525600) {
            $twomorth_lifespan .= floor($lifespan / 525600) . "年";
            $lifespan = floor($lifespan % 525600);
        }
        if ($lifespan > 43800) {
            $twomorth_lifespan .= floor($lifespan / 43800) . "か月";
            $lifespan = floor($lifespan % 43800);
        }
        if ($lifespan > 1440) {
            $twomorth_lifespan .= floor($lifespan / 1440) . "日";
            $lifespan = floor($lifespan % 1440);
        }
        if ($lifespan > 60) {
            $twomorth_lifespan .= floor($lifespan / 60) . "時間";
            $lifespan = floor($lifespan % 60);
        }
        $if = $this->search_if($twomorth_money);



        $twomorth = array('num' => $twomorth_tobaco, 'money' => $twomorth_money, 'tax' => $twomorth_money_zei, 'tar' => $twomorth_tar, 'nicotine' => $twomorth_nicotine, 'time' => $twomorth_time, 'lifespan' => $twomorth_lifespan, 'if' => $if);

        //今日のタバコ関係
        $today_money = floor($today_tobaco * 27.5);
        $today_money_zei = floor($today_tobaco * 27.5 * 0.617);
        $today_tar = $today_tobaco * 6;
        $today_nicotine = $today_tobaco * 4;
        $today_time = $today_tobaco * 4;
        $lifespan = floor($today_tobaco * 14.4);
        $today_lifespan = "";
        if ($lifespan > 525600) {
            $today_lifespan .= floor($lifespan / 525600) . "年";
            $lifespan = floor($lifespan % 525600);
        }
        if ($lifespan > 43800) {
            $today_lifespan .= floor($lifespan / 43800) . "か月";
            $lifespan = floor($lifespan % 43800);
        }
        if ($lifespan > 1440) {
            $today_lifespan .= floor($lifespan / 1440) . "日";
            $lifespan = floor($lifespan % 1440);
        }
        if ($lifespan > 60) {
            $today_lifespan .= floor($lifespan / 60) . "時間";
            $lifespan = floor($lifespan % 60);
        }
        $if = $this->search_if($today_money);



        $today = array('num' => $today_tobaco, 'money' => $today_money, 'tax' => $today_money_zei, 'tar' => $today_tar, 'nicotine' => $today_nicotine, 'time' => $today_time, 'lifespan' => $today_lifespan, 'if' => $if);


        //今までのタバコ関係
        $all_money = floor($all_tobaco * 27.5);
        $all_money_zei = floor($all_tobaco * 27.5 * 0.617);
        $all_tar = $all_tobaco * 6;
        $all_nicotine = $all_tobaco * 4;
        $all_time = $all_tobaco * 4;
        $lifespan = floor($all_tobaco * 14.4);
        $all_lifespan = "";
        if ($lifespan > 525600) {
            $all_lifespan .= floor($lifespan / 525600) . "年";
            $lifespan = floor($lifespan % 525600);
        }
        if ($lifespan > 43800) {
            $all_lifespan .= floor($lifespan / 43800) . "か月";
            $lifespan = floor($lifespan % 43800);
        }
        if ($lifespan > 1440) {
            $all_lifespan .= floor($lifespan / 1440) . "日";
            $lifespan = floor($lifespan % 1440);
        }
        if ($lifespan > 60) {
            $all_lifespan .= floor($lifespan / 60) . "時間";
            $lifespan = floor($lifespan % 60);
        }
        $if = $this->search_if($all_money);



        $all = array('num' => $all_tobaco, 'money' => $all_money, 'tax' => $all_money_zei, 'tar' => $all_tar, 'nicotine' => $all_nicotine, 'time' => $all_time, 'lifespan' => $all_lifespan, 'if' => $if);



        $data = array('this_morth' => $thismorth,'one_morth' => $onemorth,'two_morth' => $twomorth,'today' => $today,'all' => $all);

        return $data;
    }
}
