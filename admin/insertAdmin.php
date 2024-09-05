<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
include '../config/connect.php';


if ($_GET["g"] == "checkAdmin") {
    $ch = $con->prepare("SELECT * FROM admin WHERE ad_user = ? AND ad_pass = ?");
    $ch->execute([$_POST["username"], $_POST["password"]]);
    $num = $ch->rowCount();
    if ($num == 1) {
        $r = $ch->fetch(PDO::FETCH_ASSOC);
        $_SESSION["admin"] = $r["ad_id"];
        header("location:studentAll.php");
    } else {
        header("location:index.php");
    }
}

if ($_GET["g"] == "updateScore") {
    $id = $_GET["id"];

    try {
        $score = $con->prepare("UPDATE history SET ht_cal = ?, ht_status = ? WHERE ht_id = ?");
        $score->execute([$_POST["cal"], 1, $_POST["idHt"]]);

        if (empty($score)) {
            echo "no";
        } else {
            echo '<script>
        $(document).ready(function() {

         Swal.fire({
                icon: "success",
                title: "บันทึกข้อมูล",
                text: "บันทึกเรียบร้อยแล้ว",
                confirmButtonText: "ตกลง",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                window.location.href = "studentAllScore.php?idSr=' . $id . '";
            });
    });
        </script>';
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}