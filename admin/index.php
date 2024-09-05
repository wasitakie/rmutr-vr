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

    <div class="container mt-5 m-auto">


        <div class="w-auto max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 m-auto">
            <form class="space-y-6" action="insertAdmin.php?g=checkAdmin" method="post">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Admin</h5>
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        username</label>
                    <input type="text" name="username" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                </div>
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        password</label>
                    <input type="password" name="password" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">เข้าสู่ระบบ</button>
                <!-- <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create
                        account</a>
                </div> -->
            </form>
        </div>

    </div>




    <?php include "../footer-title/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="../b5/js/bootstrap.min.js"></script>
</body>

</html>