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
    <div class="container">
        <?php //adding header and menues?>
        <?php require_once "../components/header.php";?>
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

        <div class="container">
            <div class="container bg-success text-right text-light p-1 fw-bold rounded-3 mt-3">
                <span>سوابق پرداخت</span>
            </div>
            <div class="container mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>شماره فاکتور</th>
                            <th>تاریخ پرداخت</th>
                            <th>وضعیت</th>
                            <th>کد رهگیری</th>
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
                            <td><a href="#" class="btn btn-primary">مشاهده</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="container">
            <div class="container bg-success text-right text-light p-1 fw-bold rounded-3 mt-3">
                <span>سوابق پرداخت</span>
            </div>
            <div class="container mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>شماره فاکتور</th>
                            <th>تاریخ پرداخت</th>
                            <th>وضعیت</th>
                            <th>کد رهگیری</th>
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
                            <td><a href="#" class="btn btn-primary">مشاهده</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <div class="container bg-success text-right text-light p-1 fw-bold rounded-3 mt-3">
                <span>نظرسنجی و رای گیری</span>
            </div>
            <div class="container mt-3 shadow rounded-3">
                <div class="container p-5 text-muted text-center">
                    <span>نظرسنجی ای موجود نمی باشد</span>
                </div>
            </div>
        </div>
        <?php //adding footer?>
        <?php require_once "../components/footer.php"?>
    </div>




    <script src="statics/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>