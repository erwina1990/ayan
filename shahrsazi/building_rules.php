<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="../css/ol.css" rel="stylesheet"/>
    <link href="../css/bulding_rules.css" rel="stylesheet"/>
    <style>

    </style>
    <title>عیان</title>
</head>
<body>
<div class="container-fluid d-none" style="padding-right: 0;padding-left: 0;">
    <div class="row" style="margin-right: 0;margin-left: 0;">
        <div class="col-md-4 text-right d-none d-md-block" style="padding-top: 25px;padding-right: 0;">
            <div class="HeaderRight">
                <img src="../img/shafafiat.png" style="height: 77px" class="img-fluid" alt="">
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div><img src="../img/tahzib.png" class="img-fluid" alt=""></div>
            <img src="../img/_21.png" class="hidden-header-img hidden-header-img-right" alt="">
            <div class="HeaderTitle HeaderTitleHover">
                <img src="../img/layer_3.png" class="img-fluid" alt="">
                <img src="../img/shahrdari_arak.png" class="img-fluid HeaderTitleLastImg" alt="">
                <a class="aHeaderTitle" href="/"></a>
            </div>
            <img src="../img/zarebin.png" class="hidden-header-img hidden-header-img-left" alt="">
        </div>
        <div class="col-md-4 text-left d-none d-md-block" style="padding-top: 25px;padding-left: 0;">
            <div class="HeaderLeft">
                <img src="../img/ayan.jpg" style="height: 77px" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

<div style="position: relative">
    <div class="container">
        <header>
            <div class="cd-dropdown-wrapper">
                <a class="cd-dropdown-trigger" href="#0">منو</a>
                <div class="CircleMenu"></div>
                <nav class="cd-dropdown">
                    <h2>عیان</h2>
                    <a href="#0" class="cd-close">بستن</a>
                    <ul class="cd-dropdown-content">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li><a href="/views/hcontract.php">قراردادهای کلان</a></li>
                        <li><a href="/views/mcontract.php">قراردادهای متوسط</a></li>
                        <li class="has-children">
                            <a href="#">اطلاعات شهرسازی</a>
                            <ul class="cd-dropdown-icons is-hidden">
                                <li class="go-back"><a href="#0">منو</a></li>
                                <li>
                                    <a class="cd-dropdown-item item-1" href="/shahrsazi/building_rules.php">
                                        ضوابط شهرسازی
                                    </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-2" href="/shahrsazi/karbari.php">
                                        دریافت نقشه کاربری ها
                                    </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-3" href="#">
                                        دریافت نقشه منطقه بندی
                                    </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-4" href="/excel/parvaneh.xlsx">
                                        دریافت اکسل محاسبه عوارض پروانه </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-5" href="/shahrsazi/madeh_5.php">
                                        مصوبات کمیسیون ماده ۵
                                    </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-6" href="#">
                                        گردش کار صدور پروانه ساختمانی
                                    </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-7" href="#">
                                        گردش کار صدور پایان کار ساختمانی
                                    </a>
                                </li>

                                <li>
                                    <a class="cd-dropdown-item item-8" href="#">
                                        گردش کار صدور گواهی و استعلام
                                    </a>
                                </li>

                            </ul> <!-- .cd-dropdown-icons -->
                        </li> <!-- .has-children -->
                        <li><a href="/views/boodjeh.php">بودجه</a></li>
                        <li><a href="/views/project.php">پروژه های عمرانی</a></li>
                        <li><a href="/views/tender.php">مناقصات</a></li>
                    </ul> <!-- .cd-dropdown-content -->
                </nav> <!-- .cd-dropdown -->
            </div> <!-- .cd-dropdown-wrapper -->
        </header>
        <button class="btn-BackPage" type="button" onclick="history.back();">بازگشت <i class="mdi mdi-chevron-left"></i>
        </button>
    </div>
</div>
<div class="MainBody">
    <!--<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="DivInputSearch">
                    <input type="text" placeholder="جستجو ..." class="InputSearch">
                    <img src="../img/search_ek1.png" alt="">
                </div>
            </div>
        </div>
    </div>-->
    <div class="container-fluid">
        <div class="BoxBody text-center"
             style="padding: 0; background: rgba(255, 255, 255, 1);width: 100%;margin: 15px 0;">
            <div class="row ribban">
                <div class="col-lg-6">
                    <input type="text" id="address" class="form-control" placeholder="جستجوی آدرس ..."/>
                    <div id="address_result" style="display: none"></div>
                </div>
                <div class="col-lg-3">
                    <div class="ribban-hide" style="text-align: right">
                        <span>محدوده :</span>
                        <span id="region"></span>
                    </div>
                    <div style="text-align: right">
                        <span class="">ضوابط :</span>
                        <span id="rules"></span>
                    </div>
                </div>
                <div class="col-lg-3 ribban-zababet" style="text-align: right">
                    <a id="stepNext" class="btn btn-primary btn-stepNext">مرحله ی بعد</a>
                    <div class="chkRoad" style="text-align: right; float: left">
                        <label for="chkRoad">
                            <input type="checkbox" id="chkRoad" onclick="changeRoadLayer(this);"
                                   checked="checked"/><span style="display:block;float:right">لایه معابر</span>
                        </label>
                        <label for="chkStatellite">
                            <input type="checkbox" id="chkStatellite" onclick="changeSattelliteLayer(this);"
                                   checked="checked"/><span style="display:block;float:right">لایه ماهواره ای</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map" style="height: 80%;"></div>
</div>
<input type="hidden" id="city_input"/>
<div id="city_result" class="hide"></div>
<input type="hidden" id="city_id"/>
<input type="hidden" id="lng"/>
<input type="hidden" id="lat"/>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.menu-aim.js"></script>
<script src="../js/main.js"></script>
<script src="../js/map.js" type="text/javascript"></script>
<script src="../js/satia.min.js" type="text/javascript"></script>
<script src="../js/ayanmap.js?v=1.5" type="text/javascript"></script>
<script src="../js/bulding_rules.js?v=1.1" type="text/javascript"></script>
</body>
</html>
<?php
