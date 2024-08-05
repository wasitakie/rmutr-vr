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

</head>

<body>
    <?php include "../banner/banner.php"; ?>
    <div class="container mt-5">
        <div class="fs-5 fw-bold">ลงทะเบียน</div>
        <hr>
        <div class="ps-5 pe-5">
            <form action="insertRegister.php?g=registerInsert" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="file_input">ใส่รูปโปรไฟล์ของคุณ </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 "
                        aria-describedby="file_input_help" id="file_input" type="file" name="imageProfile"
                        accept="image/jpg, image/jpeg">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> JPG </p>
                </div>
                <div class="mb-3 ">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คำนำหน้าชื่อ</label>
                    <input type="text" id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 fixName"
                        name="fixName" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ</label>
                    <input type="text" id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 name"
                        name="name" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล</label>
                    <input type="text" id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 sName"
                        name="sName" />
                </div>
                <div class="mb-3">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสนักศึกษา</label>
                    <input type="text" id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 idCode"
                        name="idCode" />
                </div>
                <div class="mb-3">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรที่สามารถติดต่อได้</label>
                    <input type="text" id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 tal"
                        name="tal" />
                </div>

                <div class="mb-3">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่สำหรับจัดส่งของที่ระลึก</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 addDetail"
                        name="addDetail"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">พื้นที่
                        (แยกสี)</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 area"
                        name="area">
                        <option selected>- ระบุพื่นที่ -</option>
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
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 study"
                        name="study" />
                </div>
                <div class="mb-3">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สาขาที่ศึกษา</label>
                    <input type="text" id=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 branch"
                        name="branch" />
                </div>

                <button type="submit"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 btn-submit">บันทึก</button>

            </form>
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
            if ($(".fixName").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่คำนำหน้าชื่อ ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".name").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่ชื่อ ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".sName").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่นามสกุล ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".idCode").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่รหัสนักศึกษา ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".tal").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่เบอร์โทรที่สามารถติดต่อได้ ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".AddDetail").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่ที่อยู่สำหรับจัดส่งของที่ระลึก ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".area").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่พื้นที่(แยกสี) ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".study").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่คณะที่ศึกษา ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
            if ($(".branch").val() == "") {
                Swal.fire({
                    title: "โปรดข้อมูลให้ครบ ?",
                    text: "โปรดใส่สาขาที่ศึกษา ?",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                });
                return false;
            }
        })

    })
    </script>

</body>

</html>