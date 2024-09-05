<?php
session_start();
include '../config/connect.php';
include '../session/sessionAdmin.php';
$de = $con->prepare("SELECT * FROM register WHERE rg_id  = ?");
$de->execute([$_GET["id"]]);
$r = $de->fetch(PDO::FETCH_ASSOC);
if ($r["rg_image"] == "") {
    $showImg = '../images/human.jpg';
} else {
    $showImg = '../images/student/' . $r["rg_image"] . '" alt="profile" ';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include "../footer-title/title.php" ?></title>
    <link rel="stylesheet" href="../b5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <?php include "../banner/bannerAdmin.php"; ?>


    <div class="container mt-3">
        <form action="" method="">
            <div class="flex flex-col items-center pb-10">

                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="<?= $showImg ?>" alt="Bonnie image" />

                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                    <?= $r["rg_fix_name"] . $r["rg_name"] . " " . $r["rg_sname"] ?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?= $r["rg_tag_num"] ?></span>
            </div>

            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คำนำหน้าชื่อ</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="fixName" value="<?= $r["rg_fix_name"] ?>" disabled />
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="name" value="<?= $r["rg_name"] ?>" disabled />
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="sName" value="<?= $r["rg_sname"] ?>" disabled />
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสนักศึกษา</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="idCode" value="<?= $r["rg_id_code"] ?>" disabled />
            </div>
            <div class="mb-3">
                <label for=""
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรที่สามารถติดต่อได้</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 tal"
                    name="tal" value="<?= $r["rg_tal"] ?>" disabled />
            </div>

            <div class="mb-3">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่สำหรับจัดส่งของที่ระลึก</label>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 addDetail"
                    name="addDetail" disabled><?= $r["rg_add_detail"] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">พื้นที่
                    (แยกสี)</label>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="area">
                    <option><?= $r["rg_area"] ?></option>
                    <option value="">-ระบุพื่นที่-</option>
                    <option value="พื้นที่ศาลายา">-พื้นที่ศาลายา-</option>
                    <option value="พื้นที่บพิตรพิมุข จักรวรรดิ">-พื้นที่บพิตรพิมุข จักรวรรดิ</option>
                    <option value="วิทยาลัยเพาะช่าง">-วิทยาลัยเพาะช่าง</option>
                    <option value="วิทยาเขตวังไกลกังวล">-วิทยาเขตวังไกลกังวล</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คณะที่ศึกษา</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="study" value="<?= $r["rg_study"] ?>" disabled />
            </div>
            <div class="mb-3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สาขาที่ศึกษา</label>
                <input type="text" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="branch" value="<?= $r["rg_branch"] ?>" disabled />
            </div>



        </form>


    </div>



    <?php include "../footer-title/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="../b5/js/bootstrap.min.js"></script>
</body>

</html>