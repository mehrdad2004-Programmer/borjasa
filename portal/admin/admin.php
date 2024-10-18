<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پرتال مستاجرین</title>
    <link rel="stylesheet" href="../../statics/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../statics/css/portal/mostager/index.css">
    <link rel="stylesheet" href="../../statics/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="text-center">
        <?php //adding header and menue?>
        <?php require_once "../components/header.php";?>
    </div>

    <div class="container mt-3">
        <div class="container-fluid bg-success p-1 rounded-3 text-light fw-bold">
            <span>صندوق ساختمان</span>
        </div>
        <div class="container-fluid d-lg-flex mt-2">
            <div class="container">
                <div class="container notification public border mt-3 rounded-3 shadow">

                </div>
            </div>
            <div class="container">
                <div class="container notification public border mt-3 rounded-3 shadow">

                </div>
            </div>
        </div>

        <div class="container-fluid d-lg-flex mt-2">
            <div class="container">
                <div class="container notification public border mt-3 rounded-3 shadow">

                </div>
            </div>
            <div class="container">
                <div class="container notification public border mt-3 rounded-3 shadow">

                </div>
            </div>
        </div>
    </div>

    <div class="container p-3">
        <div class="container bg-success text-right text-light p-1 fw-bold rounded-3 mt-3">
            <span>اطلاعیه های ساختمان</span>
        </div>
        <div class="container-fluid d-lg-flex mt-4">
            <div class="container">
                <div class="container bg-success text-light fw-bold text-right rounded-3 p-1">
                    <span>اعلانات عمومی</span>
                </div>
                <div class="container notification public border mt-3 rounded-3 shadow">

                </div>
            </div>
            <div class="container">
                <div class="container bg-success text-light fw-bold text-right rounded-3 p-1">
                    <span>اعلانات خصوصی</span>
                </div>
                <div class="container notification public border mt-3 rounded-3 shadow">

                </div>
            </div>
        </div>
        <div class="container p-3">
            <button type="button" class=" btn btn-outline-success  p-2 fw-bold rounded-3 mt-2 d-lg-flex">افزودن
                اطلاییه</button>
        </div>
    </div>

    <div class="container">
        <div class="container bg-success text-right text-light p-1 fw-bold rounded-3 mt-3">
            <span>وضعیت تیکت ها</span>
        </div>
        <div class="container mt-3 table-responsive overflow-scroll p-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام فرستنده</th>
                        <th>موضوع</th>
                        <th>تاریخ ارسال</th>
                        <th>وضعیت</th>
                        <th>ملاحظات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>مهرداد کلاته عربی</td>
                        <td>........</td>
                        <td>1403/6/23-20:56</td>
                        <td>پاسخ داده شده</td>
                        <td>مشاهده تیکت</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class=" btn btn-outline-success  p-1 fw-bold rounded-3">افزودن تیکت جدید</button>

        </div>
        <div class="container">
            <div class="container bg-success text-right text-light p-1 fw-bold rounded-3 mt-3">
                <span>وضعیت دبیرخانه استاد</span>
            </div>
            <div class="container mt-3 table-responsive overflow-scroll p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>فرستنده</th>
                            <th>گیرنده</th>
                            <th>موضوع</th>
                            <th>تارییخ</th>
                            <th>شماره</th>
                            <th>پیوست</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>5454545</td>
                            <td>1403/05/06</td>
                            <td>موفق</td>
                            <td>6555555</td>
                            <td>6555555</td>
                            <td>6555555</td>
                            <td>اقبصثبثتابل</td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class=" btn btn-outline-success  p-1 fw-bold rounded-3">افزودن تیکت جدید</button>

            </div>
        </div>
    </div>

    <?php //adding header and menue?>
        <?php require_once "../components/footer.php";?>
    <div>


        <script src="statics/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>