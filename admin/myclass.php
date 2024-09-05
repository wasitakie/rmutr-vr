<?php

class myClass
{
    public function date($n)
    {
        include '../config/connect.php';
        include '../array/array.php';
        $dateSe = $con->prepare("SELECT * FROM history WHERE ht_id_student = ?");
        $dateSe->execute([$n]);
        $r = $dateSe->fetch(PDO::FETCH_ASSOC);

        echo $r["ht_day"] . " " . $thaimonth[(int)$r["ht_month"]] . " " . ($r["ht_year"] + 543);
    }

    public function idStudent($n)
    {
        include '../config/connect.php';
        $dateSe = $con->prepare("SELECT * FROM history WHERE ht_id_student = ?");
        $dateSe->execute([$n]);
        $r = $dateSe->fetch(PDO::FETCH_ASSOC);

        echo $r["ht_id_student"];
    }

    public function nameStudent($n)
    {
        include '../config/connect.php';
        $dateSe = $con->prepare("SELECT * FROM register WHERE rg_id = ?");
        $dateSe->execute([$n]);
        $r = $dateSe->fetch(PDO::FETCH_ASSOC);

        echo $r["rg_name"] . " " . $r["rg_sname"];
    }

    public function areaStudent($n)
    {
        include '../config/connect.php';
        $dateSe = $con->prepare("SELECT * FROM register WHERE rg_id = ?");
        $dateSe->execute([$n]);
        $r = $dateSe->fetch(PDO::FETCH_ASSOC);

        echo $r["rg_area"];
    }

    public function countUser($n)
    {
        include '../config/connect.php';
        $dateSe = $con->prepare("SELECT * FROM history WHERE ht_id_student = ? AND ht_status = ? ");
        $dateSe->execute([$n, 0]);
        $count = $dateSe->rowCount();

        return $count;
    }

    public function sumCal($n)
    {
        include '../config/connect.php';
        $dateSe = $con->prepare("SELECT * FROM history WHERE ht_id_student = ?");
        $dateSe->execute([$n]);
        while ($r = $dateSe->fetch(PDO::FETCH_ASSOC)) {
            $sum += $r["ht_cal"];
        };

        if ($sum == "") {
            echo $sum = 0;
        } else {
            echo $sum = number_format($sum);
        }
    }
    public function sumMaxCal($n)
    {
        include '../config/connect.php';
        $dateSe = $con->prepare("SELECT * FROM history WHERE ht_id_student = ? ");
        $dateSe->execute([$n]);
        while ($r = $dateSe->fetch(PDO::FETCH_ASSOC)) {
            $sum += $r["ht_cal"];
        };

        if ($sum == "") {
            echo $sum = 0;
        } else {
            echo $sum = number_format($sum);
        }
    }
}