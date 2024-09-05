<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
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

    if ($_FILES["imageProfile"]["name"] == "") {
        $new_imagesP = "";
    } else {
        $images = $_FILES["imageProfile"]["tmp_name"];
        $new_imagesP = "Image_" . $_FILES["imageProfile"]["name"];
        //copy($_FILES["fileImg"]["tmp_name"], "../images/product/" . $_FILES["fileImg"]["name"]);
        $width = 200; //*** Fix Width & Heigh (Autu caculate) ***//
        $size = GetimageSize($images);
        $height = round($width * $size[1] / $size[0]);
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
        ImageJPEG($images_fin, "../images/student/" . $new_imagesP);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);

        //$nameImg .= $new_images . "/";
    }

    $in = $con->prepare("INSERT INTO register(rg_image,rg_fix_name, rg_name, rg_sname, rg_id_code, rg_tal, rg_add_detail, rg_area, rg_study, rg_branch,rg_tag_num) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $in->execute([$new_imagesP, $_POST["fixName"], $_POST["name"], $_POST["sName"], $_POST["idCode"], $_POST["tal"], $_POST["addDetail"], $_POST["area"], $_POST["study"], $_POST["branch"], $numTag]);

    if (empty($in)) {
        echo "no";
    } else {
        echo '<script>
        $(document).ready(function() {
    
         Swal.fire({
                icon: "success",
                title: "ลงทะเบียน",
                text: "ลงทะเบียนเรียบร้อยแล้ว กรุณา Login เข้าระบบอีกครั้ง",
                confirmButtonText: "ตกลง",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                window.location.href = "index.php";
            });
    });
        </script>';
    }
}

if ($_GET["g"] == "checkName") {
    $ch = $con->prepare("SELECT * FROM register WHERE rg_id_code = ? ");
    $ch->execute([$_POST["idCode"]]);
    $num = $ch->rowCount();
    if ($num == 1) {
        $r = $ch->fetch(PDO::FETCH_ASSOC);
        $_SESSION["idCode"] = $r["rg_id_code"];
        header("location:detailStudent.php");
    } else {
        echo "";
    }
}

if ($_GET["g"] == "insertStudentA") {

    //echo $_POST["idStudent"];
    if ($_FILES["imageA"]["name"] == "") {
        $new_imagesA = "";
    } else {
        $images = $_FILES["imageA"]["tmp_name"];
        $new_imagesA = "Image_" . $_FILES["imageA"]["name"];
        //copy($_FILES["fileImg"]["tmp_name"], "../images/product/" . $_FILES["fileImg"]["name"]);
        $width = 350; //*** Fix Width & Heigh (Autu caculate) ***//
        $size = GetimageSize($images);
        $height = round($width * $size[1] / $size[0]);
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
        ImageJPEG($images_fin, "../images/student/" . $new_imagesA);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);

        //$nameImg .= $new_images . "/";
    }


    $day = date("d");
    $month = date("m");
    $year = date("Y");

    try {
        $inA = $con->prepare("INSERT INTO history( ht_img, ht_action, ht_cal, ht_id_student, ht_status, ht_day,ht_month,ht_year) VALUES (?,?,?,?,?,?,?,?)");
        $inA->execute([$new_imagesA, $_POST["detailA"], 0, $_POST["idStudent"], 0, $day, $month, $year]);
        if (empty($inA)) {
            echo "no";
        } else {
            // $upR = $con->prepare("UPDATE register SET rg_image = ? WHERE rg_id =? ");
            // $upR->execute([ $_POST["idStudent"]]);
            echo '<script>
                $(document).ready(function() {
            Swal.fire({ 
              title: "บันทึกข้อมูล",
               text: "บันทึกข้อมูลเรียบร้อยแล้ว",
                icon: "success",
                timer:1500
              }).then(function() {

                window.location.href = "detailStudent.php";
                })});
                </script>';
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_GET["g"] == "updateStudent") {
    echo "hhh->" . $_POST["upImage"];


    if (empty($_FILES["imageProfileEdit"]["name"])) {
        $new_images2 = $_POST["upImage"];
    } else {
        $images = $_FILES["imageProfileEdit"]["tmp_name"];
        $new_images2 = "Thumbnails_" . $_FILES["imageProfileEdit"]["name"];
        //copy($_FILES["fileImg"]["tmp_name"], "../images/product/" . $_FILES["fileImg"]["name"]);
        $width = 450; //*** Fix Width & Heigh (Autu caculate) ***//
        $size = GetimageSize($images);
        $height = round($width * $size[1] / $size[0]);
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
        ImageJPEG($images_fin, "../images/student/" . $new_images2);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);
    }

    try {
        $up = $con->prepare("UPDATE register SET rg_image = ?, rg_fix_name =?, rg_name =?, rg_sname =?,rg_tal =?,rg_add_detail= ?, rg_area =?, rg_study =?, rg_branch =? WHERE rg_id =? ");
        $up->execute([$new_images2, $_POST["fixName"], $_POST["name"], $_POST["sName"], $_POST["tal"], $_POST["addDetail"], $_POST["area"], $_POST["study"], $_POST["branch"], $_POST["idStudentEdit"]]);
        if (empty($up)) {
            echo "no";
        } else {
            echo '<script>
        $(document).ready(function() {
    Swal.fire({ 
      title: "บันทึกข้อมูล",
       text: "บันทึกข้อมูลเรียบร้อยแล้ว",
        icon: "success",
        timer:1500
      }).then(function() {

        window.location.href = "detailStudent.php";
        })});
        </script>';
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


if ($_GET["g"] == "deleteProfile") {
    $de = $con->prepare("DELETE FROM register WHERE rg_id = ?");
    $de->execute([$_GET["id"]]);

    if (empty($de)) {
        echo "no";
    } else {
        echo '<script>
    $(document).ready(function() {
Swal.fire({ 
  title: "ลบข้อมูล",
   text: "ลบข้อมูลเรียบร้อยแล้ว",
    icon: "success",
    timer:1500
  }).then(function() {

    window.location.href = "signOut.php";
    })});
    </script>';
    }
}
