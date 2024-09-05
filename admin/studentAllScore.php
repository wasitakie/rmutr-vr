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





    <div class="container mt-3 ">




        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 5%;">
                            ลำดับที่
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 5%;">
                            รูปกิจกรรม
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            กิจกรรมที่ทำ
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 10%;">
                            วัน/เดือน/ปี
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 5%;">
                            แคลลอรี่
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 8%;">
                            บันทึกข้อมูล
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'myclass.php';
                    $obj = new myClass;
                    $score = $con->prepare("SELECT * FROM history WHERE ht_id_student  = ?");
                    $score->execute([$_GET["idSr"]]);

                    $sum = 0;

                    $n = 1;
                    while ($r = $score->fetch(PDO::FETCH_ASSOC)) {

                        if ($r["ht_status"] == "1") {
                            $colorBtn = '<button type="submit"
                                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">บันทึกข้อมูลเรียบร้อยแล้ว</button>';
                        } elseif ($r["ht_status"] == "0") {
                            $colorBtn = '<button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">ยังไม่บันทึกข้อมูล</button>';
                        }


                    ?>
                        <form method="post" action="insertAdmin.php?g=updateScore&id=<?= $_GET["idSr"] ?>">
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    <?= $n ?>
                                </th>
                                <td class="px-6 py-4 text-center">

                                    <div class="Img" data-modal-target="medium-modal" data-modal-toggle="medium-modal" data-id="../images/student/<?= $r["ht_img"] ?>">

                                        <img class="h-10" id="imgShow" src="../images/student/<?= $r["ht_img"] ?>" alt="<?= $r["ht_action"] ?>">
                                    </div>




                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?= $r["ht_action"] ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?= $r["ht_year"] . "-" . $r["ht_month"] . "-" . $r["ht_day"] ?>
                                </td>
                                <td class="px-6 py-4 text-center">

                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cal" name="cal" value="<?= $r["ht_cal"] ?>" />
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <input type="hidden" id="" name="idHt" value="<?= $r["ht_id"] ?>" />
                                    <?= $colorBtn ?>
                                </td>
                            </tr>
                        </form>
                    <?php
                        $n++;
                    }
                    ?>
                </tbody>
            </table>
        </div>








    </div>

    <!-- Default Modal -->
    <div id="medium-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        แสดงรูปภาพกิจกรรม
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="showImg"></div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="medium-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">ปิด</button>
                </div>
            </div>
        </div>
    </div>



    <?php include "../footer-title/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../b5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".Img").click(function() {
                var img = $(this).attr("data-id");
                var url = 'showImg.php';

                $.post(url, {
                    img: img
                }, function(data) {
                    $(".showImg").html(data);
                })
            })
        });
    </script>
</body>

</html>