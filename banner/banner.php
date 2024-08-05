<div class="container-fluid" style="margin: 0px; padding: 0px">
    <nav>
        <div class="banner">
            <img src="../images/kcal.png" alt="" srcset="" width="230px">


            <div class="menu">
                <ul>
                    <li><a href="./index.php">หน้าหลัก</a></li>
                    <li><a href="./student.php">รายชื่อผู้สมัคร</a></li>
                    <li><a href="./allCal.php">ส่งผลสะสมแคลอรี่</a></li>
                    <li><a href="./report.php">รายงานผล</a></li>
                    <li><a href="./sumMary.php">สรุปผล</a></li>


                </ul>

            </div>

            <div class="menuSub" id="menuSub">
                <ul>
                    <li><a href="./index.php">หน้าหลัก</a></li>
                    <li><a href="./student.php">รายชื่อผู้สมัคร</a></li>
                    <li><a href="./allCal.php">ส่งผลสะสมแคลอรี่</a></li>
                    <li><a href="./report.php">รายงานผล</a></li>
                    <li><a href="./sumMary.php">สรุปผล</a></li>
                    <li class="btnSub"><button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 btn-login">ลงชื่อเข้าใช้
                            / ลงทะเบียน</button></li>

                </ul>

            </div>
            <div class="btn btnClose">
                <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 btn-login">ลงชื่อเข้าใช้
                    / ลงทะเบียน</button>
            </div>
            <div class="btn-list"><i class="bi bi-list"></i></div>

        </div>
    </nav>
</div>




<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full" style="z-index: 999999;position:absolute;">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    ลงชื่อเข้าใช้
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="insertRegister.php?g=checkName" method="post">
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสประจำตัว</label>
                        <input type="text" name="idCode" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <!-- <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">รหัสผ่าน</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div> -->

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">เข้าสู่ระบบ</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        ลงทะเบียนเข้าใช้งาน ? <a href="register.php" class="text-blue-700 hover:underline dark:text-blue-500">ลงทะเบียน</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('.menuSub').hide();

        $('.btn-list').click(function() {
            $('.menuSub').toggle();
        })
    })
</script>