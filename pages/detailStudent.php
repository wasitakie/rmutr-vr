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


</head>

<body>
    <?php include "../banner/banner.php"; ?>
    <div class="container mt-5 text-end">
        <a type="button" href="signOut.php"
            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">ออกจากระบบ</a>
    </div>
    <div class="container mt-3 m-auto">
        <div class="w-auto max-w-xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800
            dark:border-gray-700 m-auto">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                data-modal-target="crud-modal1" data-modal-toggle="crud-modal1">Edit</a>
                        </li>

                        <li>
                            <button type="button"
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white  deleteProfile"
                                data-id="<?= $r["rg_id"] ?>">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">

                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="<?= $showImg ?>" alt="Bonnie image" />

                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                    <?= $r["rg_fix_name"] . $r["rg_name"] . " " . $r["rg_sname"] ?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?= $r["rg_tag_num"] ?></span>
            </div>
            <div class="ps-5 pe-5">
                <form action="insertRegister.php?g=insertStudentA" method="post" enctype="multipart/form-data">
                    <!-- <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">ใส่รูปโปรไฟล์ของคุณ </label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 imageProfile"
                            aria-describedby="file_input_help" id="file_input" type="file" name="imageProfile"
                            accept="image/jpg, image/jpeg">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> JPG </p>
                    </div> -->
                    <div class="mb-3 ">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสนักศึกษา</label>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled value="<?= $r["rg_id_code"] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรที่สามารถติดต่อได้</label>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 tal"
                            name="tal" disabled value="<?= $r["rg_tal"] ?>" />
                    </div>

                    <div class="mb-3">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่สำหรับจัดส่งของที่ระลึก</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 addDetail"
                            name="addDetail" disabled><?= $r["rg_add_detail"] ?></textarea>
                    </div>
                    <div class="mb-3 ">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">พื้นที่
                            แยกสี</label>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled value="<?= $r["rg_area"] ?>" />
                    </div>
                    <div class="mb-3 ">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คณะที่ศึกษา</label>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled value="<?= $r["rg_study"] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สาขาที่ศึกษา</label>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled value="<?= $r["rg_branch"] ?>" />
                    </div>

                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">

                        <div class="mb-3">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">กิจกรรมที่ทำ</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 detailA"
                                name="detailA"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">ใส่รูปกิจกรรม</label>
                            <input id="imgProfile"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 imageA"
                                aria-describedby="file_input_help" id="file_input" type="file" name="imageA"
                                accept="image/jpg, image/jpeg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> JPG </p>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-5 mt-2">

                        <input type="hidden" name="idStudent" value="<?= $r["rg_id"] ?>">

                        <button type="submit"
                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 btn-submit">บันทึกข้อมูล</button>
                        <a type="button" href="detailStudentAll.php?id=<?= $r["rg_id"] ?>"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900btn-submit">ดูข้อมูลทั้งหมด
                        </a>
                    </div>

                </form>






            </div>
        </div>

    </div>




    <!--///////////////////////////////////////////////////////////// -->

    <!-- Main modal  edit -->
    <div id="crud-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        แก้ไขข้อมูลส่วนตัว
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">ปิด</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-3">
                    <form action="insertRegister.php?g=updateStudent" method="post" enctype="multipart/form-data">
                        <div class="mb-3  mt-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">ใส่รูปโปรไฟล์ของคุณ <span style="color: red;"> <?= $r["rg_image"] ?>
                                </span></label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 imageA"
                                aria-describedby="file_input_help" id="file_input" type="file" name="imageProfileEdit"
                                accept="image/jpg, image/jpeg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> JPG </p>
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คำนำหน้าชื่อ</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="fixName" value="<?= $r["rg_fix_name"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="name" value="<?= $r["rg_name"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="sName" value="<?= $r["rg_sname"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสนักศึกษา</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="idCode" value="<?= $r["rg_id_code"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรที่สามารถติดต่อได้</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 tal"
                                name="tal" value="<?= $r["rg_tal"] ?>" />
                        </div>

                        <div class="mb-3">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่สำหรับจัดส่งของที่ระลึก</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 addDetail"
                                name="addDetail"><?= $r["rg_add_detail"] ?></textarea>
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
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คณะที่ศึกษา</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="study" value="<?= $r["rg_study"] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สาขาที่ศึกษา</label>
                            <input type="text" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="branch" value="<?= $r["rg_branch"] ?>" />
                        </div>
                        <input type="hidden" name="idStudentEdit" value="<?= $r["rg_id"] ?>">
                        <input type="hidden" name="upImage" value="<?= $r["rg_image"] ?>">
                        <div class="mb-0">
                            <button type="submit"
                                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">บันทึก</button>
                        </div>


                    </form>
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


    })
    </script>
</body>

</html>