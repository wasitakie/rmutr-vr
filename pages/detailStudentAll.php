<?php
session_start();
include '../config/connect.php';
include '../session/sessionUser.php';

$st = $con->prepare("SELECT * FROM register WHERE rg_id_code = ?");
$st->execute([$_SESSION["idCode"]]);
$r = $st->fetch(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>

<body>
    <?php include "../banner/banner.php"; ?>
    <div class="container mt-3 text-end">
        <a type="button" href="detailStudent.php"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">กลับไปหน้ากิจกรรม</a>
        <a type="button" href="signOut.php"
            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">ออกจากระบบ</a>
    </div>

    <div class="container">


        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 5%;">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            รูปกิจกรรม
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 35%;">
                            ชื่อกิจกรรม
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 25%;">
                            ว/ด/ป
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" style="width: 20%;">
                            สถานะ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../array/array.php';
                    $se = $con->prepare(" SELECT* FROM history WHERE ht_id_student = ? ");
                    $se->execute([$_GET["id"]]);
                    $n = 1;
                    while ($r = $se->fetch(PDO::FETCH_ASSOC)) {

                        if ($r["ht_status"] == 0) {
                            $status = '<button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-3 py-2 text-xs  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">อยู่ระหว่างรอดำเนินการ</button>';
                        } elseif ($r["ht_status"] == 1) {
                            $status = '<button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300  rounded-lg px-3 py-2 text-xs dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">เรียบร้อยแล้ว</button>';
                        }

                        $dateEx = explode("-", $r["ht_update"]);
                        $daysEx = explode(" ", $dateEx[2]);
                        $day = $daysEx[0] . " " . $thaimonth[(int)$dateEx[1]]  . " " . ($dateEx[0] + 543) . '  <i class="bi bi-alarm"></i> ' . $daysEx[1];


                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            <?= $n ?> .
                        </th>
                        <td class="px-6 py-4 text-center">
                            <div class="Img" data-modal-target="medium-modal" data-modal-toggle="medium-modal"
                                data-id="../images/student/<?= $r["ht_img"] ?>">
                                <img src="../images/student/<?= $r["ht_img"] ?>" alt="<?= $r["ht_action"] ?>" srcset=""
                                    class="imgSize">
                            </div>

                        </td>
                        <td class="px-6 py-4">
                            <?= $r["ht_action"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $day ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?= $status ?>
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

    <!-- Default Modal -->
    <div id="medium-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        แสดงรูปภาพกิจกรรม
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                    <button data-modal-hide="medium-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">ปิด</button>
                </div>
            </div>
        </div>
    </div>


    <?php include "../footer-title/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../b5/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".btn-submit").click(function() {
            if ($(".detailA").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่กิจกรรม ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".imageA").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่รูปกิจกรรม ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
        })

        $(".deleteProfile").click(function() {
            let dataId = $(this).attr("data-id");
            Swal.fire({
                title: "ลบข้อมูล ?",
                text: "ยืนยันลบข้อมูลอีกครั้ง ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "ตกลง",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "ยกเลิก",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = 'insertRegister.php?id=' + dataId +
                        '&g=deleteProfile';
                }
            });

        })


        $('#imgProfile').bind('change', function() {
            var a = (this.files[0].size);

            if (a > 3000000) {
                Swal.fire({
                    title: "ขนาดไฟล์ใหญ่เกิน 3 MB ?",
                    text: "กรุณาเปลี่ยนรูป ให้มีขนาดเล็ก น้อยกว่า 3 MB ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            };
        });


        $(".Img").click(function() {

            var img = $(this).attr("data-id");

            var url = 'showImg.php';

            $.post(url, {
                img: img
            }, function(data) {
                $(".showImg").html(data);
            })
        })


    })
    </script>
</body>

</html>