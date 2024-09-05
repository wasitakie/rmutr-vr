<?php
session_start();
include '../config/connect.php';
include '../session/sessionAdmin.php';
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

    <div class="container mt-5">
        <form class="max-w-md ms-auto " method="get" action="#">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full pt-2 ps-10 pb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" name="search" value="<?= $_GET["search"] ?>" />
                <button type="submit"
                    class="text-white absolute end-2 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-0.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

    <div class="container mt-3 ">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-center" style="width: 8%;">
                            ลำดับที่
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 5%;">
                            BIB
                        </th>
                        <th scope="col" class="px-6 py-3 dark:bg-gray-800 bg-gray-50 text-center" style="width: 20%;">
                            ชื่อ-นามสกุล
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            วันที่สมัคร
                        </th>
                        <th scope="col" class="px-6 py-3 dark:bg-gray-800 bg-gray-50" style="width: 12%;">
                            สังกัด
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 15%;">
                            รายละเอียด
                        </th>
                        <th scope="col" class="px-6 py-3 dark:bg-gray-800 bg-gray-50 text-center" style="width: 20%;">
                            คะแนน
                        </th>
                        <th scope="col" class="px-6 py-3 dark:bg-gray-800 bg-gray-50 text-center" style="width: 10%;">
                            cal รวม
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'myclass.php';
                    $obj = new myClass;
                    $search = "%{$_GET["search"]}%";


                    $se = $con->prepare("SELECT * FROM register WHERE rg_name LIKE ?  ORDER BY rg_id desc");
                    $se->execute([$search]);
                    $n = 1;
                    while ($r = $se->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 text-center">
                            <?= $n ?> .
                        </th>
                        <td class="px-6 py-4 text-center">
                            <?= $r["rg_tag_num"] ?>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800 text-center">
                            <?= $r["rg_name"] . " " . $r["rg_sname"] . "-" . $obj->idStudent($r["rg_id"]) ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?= $obj->date($r["rg_id"]) ?>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            <?= $r["rg_area"] ?>
                        </td>
                        <td class="px-6 py-4 text-center">

                            <a type="button" href="studentDetailAllArea.php?id=<?= $r["rg_id"] ?>"
                                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800  rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 ">ดูรายละเอียด</a>

                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800 text-center">
                            <div class="" style="margin-top: -0.5rem;">
                                <a type="button" href="studentAllScore.php?idSr=<?= $r["rg_id"] ?>"
                                    class="relative inline-flex items-center p-2 text-xs text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-center">ให้คะแนนกิจกรรม
                                    <span class="sr-only">Notifications</span>
                                    <div
                                        class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                        <?= $obj->countUser($r["rg_id"]) ?></div>

                                </a>
                            </div>

                        </td>
                        <td class="px-6 py-4  text-center">
                            <?= $obj->sumCal($r["rg_id"]) ?>
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