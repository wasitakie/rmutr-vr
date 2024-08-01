<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
include '../config/connect.php';

if ($_GET["g"] == "registerInsert") {

    $ck = $con->prepare(" SELECT* FROM register ORDER BY rg_id DESC ");
    $ck->execute();
    $r = $ck->fetch(PDO::FETCH_ASSOC);

    $countId = $r["rg_id"] + 1;
    $numTag = "RC" . sprintf("%03d", $countId);

    $in = $con->prepare("INSERT INTO register(rg_fix_name, rg_name, rg_sname, rg_id_code, rg_area, rg_study, rg_branch,rg_tag_num) VALUES (?,?,?,?,?,?,?,?)");
    $in->execute([$_POST["fixName"], $_POST["name"], $_POST["sName"], $_POST["idCode"], $_POST["area"], $_POST["study"], $_POST["branch"], $numTag]);

    if (empty($in)) {
        echo "no";
    } else {
        echo '<script>
        $(document).ready(function() {
    Swal.fire({ 
      title: "บันทึกข้อมูล",
       text: "บันทึกข้อมูลเรียบร้อยแล้ว",
        icon: "success" 
      }).then(function() {

        window.location.href = "register.php";
        })});
        </script>';
    }
}

if ($_GET["g"] == "checkName") {
    $ch = $con->prepare("SELECT * FROM register WHERE rg_id_code = ? ");
    $ch->execute([$_POST["idCode"]]);
    $num = $ch->fetchColumn();
    if ($num == 1) {
        $r = $ch->fetch(PDO::FETCH_ASSOC);
        $_SESSION["idCode"] = $r["rg_id_code"];
        header("location:detailStudent.php");
    } else {
        echo "";
    }
}
