<?php
session_start();
include '../config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include "../footer-title/title.php" ?></title>
    <link rel="stylesheet" href="../b5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <?php include "../banner/banner.php"; ?>

    <div class="container mt-5">


        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 8%;">
                            ลำดับที่
                        </th>
                        <th scope="col" class="px-6 py-3 " style="width: 10%;">
                            ชื่อ-นามสกุล
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            วัน/เดือน/ปี
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            สังกัด
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            Cal ผลรวมสูงสุด
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../array/array.php';
                    include '../admin/myclass.php';
                    $obj = new myClass;
                    $se = $con->prepare(" SELECT ht_id_student ,SUM(ht_cal) as sumCount  FROM history GROUP BY ht_id_student ORDER BY sumCount DESC");
                    $se->execute();
                    $n = 1;
                    while ($r = $se->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            <?= $n ?> .
                        </th>
                        <td class="px-6 py-4 ">
                            <?= $obj->nameStudent($r["ht_id_student"]) ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?= $obj->date($r["ht_id_student"]) ?>
                        </td>
                        <td class="px-6 py-4 ">
                            <?= $obj->areaStudent($r["ht_id_student"]) ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?= $obj->sumMaxCal($r["ht_id_student"]) ?>
                        </td>
                    </tr>
                    <?php
                        $n++;
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>



    <?php include "../footer-title/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="../b5/js/bootstrap.min.js"></script>
</body>

</html>