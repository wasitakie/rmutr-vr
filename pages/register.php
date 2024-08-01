<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMUTR-VR</title>
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
            <form action="insertRegister.php?g=registerInsert" method="post">
                <div class="mb-3 mt-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คำนำหน้าชื่อ</label>
                    <input type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="fixName" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ</label>
                    <input type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล</label>
                    <input type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sName" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสนักศึกษา</label>
                    <input type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="idCode" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">พื้นที่ (แยกสี)</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="area">
                        <option selected>- ระบุพื่นที่ -</option>
                        <option value="พื้นที่ศาลายา">-พื้นที่ศาลายา-</option>
                        <option value="พื้นที่บพิตรพิมุข จักรวรรดิ">-พื้นที่บพิตรพิมุข จักรวรรดิ</option>
                        <option value="วิทยาลัยเพาะช่าง">-วิทยาลัยเพาะช่าง</option>
                        <option value="วิทยาเขตวังไกลกังวล">-วิทยาเขตวังไกลกังวล</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">คณะที่ศึกษา</label>
                    <input type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="study" />
                </div>
                <div class="mb-3">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สาขาที่ศึกษา</label>
                    <input type="text" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="branch" />
                </div>

                <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">บันทึก</button>

            </form>
        </div>

    </div>




    <?php include "../footer/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <script src="../b5/js/bootstrap.min.js"></script>


</body>

</html>