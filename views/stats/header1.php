<?php

include_once("../../includes/functions.php");

if(isset($_GET['txt']))
    $_POST['filter']['commission_tks_title'] = $_GET['txt'];

if (isset($_POST['filter']))
    $baazaarches = get_baazaarche($_POST['filter']);
else
    $baazaarches = get_baazaarche();

if (isset($_GET['id']))
    $baazaarches = getBaazaarcheById($_GET['id']);
$BaazaarcheList = getBaazaarcheList();
$StructuresBa = StructuresBaazaarche();
$GuildBaazaarche= GuildBaazaarche();

setcookie('user', 'Ali Bagheri', time() + (10));

?>

<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../../css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/index-animate.css">
    <script src="../../js/modernizr.js"></script>

    <title>عیان</title>
    <meta name="google-site-verification" content="VW6BQOoc6PW_wgGDm8Pd7AoTkdoFoGQHWzcwj5N7shU" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script>var satia = "<img src=../../img/top12.png />";</script>
    <script type="text/javascript" src="../../js/scrolltopcontrol.js"></script>

    <script type="text/javascript">
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if(e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';   }
    </script>
</head>
<body style="background: #ffffff">  <!-- add -->
<?php
$modules = array(
    "hcontract" => "قراردادهای کلان",
    "mcontract" => "قراردادهای متوسط",
    "project" => "پروژه های عمرانی",
    "tender" => "مناقصات",
    "bigsales" => "مزایدات",
);

if(isset($_POST['filter']) && !empty($_POST['filter']['cat'])) {
    if ($_POST['filter']['cat'] == "contract")
        header("Location: hcontract.php?txt=" . $_POST['filter']['txt']);

    if ($_POST['filter']['cat'] == "mcontract")
        header("Location: mcontract.php?txt=" . $_POST['filter']['txt']);

    if ($_POST['filter']['cat'] == "tender")
        header("Location: tender.php?txt=" . $_POST['filter']['txt']);

    if ($_POST['filter']['cat'] == "project")
        header("Location: project.php?txt=" . $_POST['filter']['txt']);

}
$result = "";
if(isset($_POST['filter']) && empty($_POST['filter']['cat']) && !empty($_POST['filter']['txt']))
    $result = search($_POST['filter']['txt']);


$r=0;?>

<!--<div class="GradientTop"></div>-->
<div class="main-dis">
    <div class="header-disp">
        <div class="container-fluid" style="padding-right: 0;padding-left: 0;">
            <div class="row" style="margin-right: 0;margin-left: 0;">
                <div class="col-md-4 text-right d-none d-md-block" style="padding-top: 25px;padding-right: 0;">
                    <div class="HeaderRight">
                        <img src="../../img/shafafiat.png" style="height: 77px" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="dis-tahzib-tab" ><img src="../../img/Tahzib10.png" class="img-fluid"  alt=""></div>
                <div class="col-md-4 text-center tah-disp">
                    <div class="dis-tahzib"><img src="../../img/tahzib.png" class="img-fluid"  alt=""></div>

                    <img src="../../img/_21.png" class="hidden-header-img hidden-header-img-right" alt="">
                    <div class="HeaderTitle HeaderTitleHover">
                        <img src="../../img/layer_3.png" class="img-fluid" alt="">
                        <!--<img src="../../img/shahrdari_arak.png" class="img-fluid HeaderTitleLastImg" alt="">-->
                        <a class="aHeaderTitle" href="/"></a>
                    </div>
                    <img src="../../img/zarebin.png" class="hidden-header-img hidden-header-img-left" alt="">
                </div>
                <div class="col-md-4 text-left d-none d-md-block" style="padding-top: 25px;padding-left: 0;">
                    <div class="HeaderLeft">
                        <img src="../../img/khedmat.png" style="height: 77px" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div style="position: relative">
            <div class="container-fluid nav-border">
                <header class="header-menu">
                    <div class="cd-dropdown-wrapper">
                        <a class="cd-dropdown-trigger" href="#0" title="منو">منو</a>
                        <div class="CircleMenu"></div>
                        <nav class="cd-dropdown">
                            <h2>عیان</h2>
                            <a href="#0" class="cd-close">بستن</a>
                            <ul class="cd-dropdown-content">
                                <li><a href="/">صفحه اصلی</a></li>
                                <li><a href="/views_11/hcontract.php">قراردادهای کلان</a></li>
                                <li><a href="/views_11/mcontract.php">قراردادهای متوسط</a></li>
                                <li class="has-children">
                                    <a href="#">اطلاعات شهرسازی</a>
                                    <ul class="cd-dropdown-icons is-hidden">
                                        <li class="go-back"><a href="#0" title="منو">منو</a></li>
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
                                                دریافت اکسل محاسبه عوارض پروانه
                                            </a>
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
                                <li><a href="/views_11/boodjeh.php">بودجه</a></li>
                                <li><a href="/views_11/project.php">پروژه های عمرانی</a></li>
                                <li><a href="/views_11/tender.php">مناقصات</a></li>
                            </ul> <!-- .cd-dropdown-content -->
                        </nav> <!-- .cd-dropdown -->
                    </div> <!-- .cd-dropdown-wrapper -->
                </header>
                <header class="cd-main-header animate-search">

                    <nav class="cd-main-nav-wrapper">
                        <a href="#search" class="cd-search-trigger cd-text-replace"><span>جستجو</span></a>
                    </nav> <!-- .cd-main-nav-wrapper -->

                    <a href="#0" class="cd-nav-trigger cd-text-replace" title="منو">منو<span></span></a>
                </header>

                <div id="search" class="cd-main-search <?php if($result) echo 'is-visible';?>">
                    <form method="post">
                        <input type="search" placeholder="جستجو ..." name="filter[txt]">
                        <input type="submit" value="جستجو ..." class="bottom-serch">
                        <div class="cd-select">
                            <span></span>
                            <select name="filter[cat]">
                                <option value="">همه زیر برنامه ها</option>
                                <option value="contract">قراردادهای کلان</option>
                                <option value="mcontract">قراردادهای متوسط</option>
                                <option value="tender">مناقصه</option>
                                <option value="category3">مزایده</option>
                                <option value="project">پروژه ها</option>
                            </select>
                            <span class="contract">همه زیر برنامه ها</span>
                        </div>
                    </form>

                    <div class="cd-search-suggestions" style="text-align: right;">
                        <div class="news">
                            <!--<h3>News</h3>-->
                            <ul>
                                <?php
                                if($result) {
                                    foreach ($result as $res):
                                        $title = "";
                                        $terms = explode(" ", $res['title']);
                                        if(count($terms)>20) {
                                            $i = 0;
                                            foreach ($terms as $term):
                                                if ($i > 20)
                                                    break;
                                                $title .= $term . " ";
                                                $i++;
                                            endforeach;
                                            $title .= "....";
                                        }
                                        else
                                            $title = $res['title'];
                                        ?>
                                        <li>
                                            <h6><a class="cd-nowrap" href="<?php echo $res['type']?>.php?id=<?php echo $res['id']?>&txt=<?php echo $title?>"><span style="color: orangered;"><?php echo $modules[$res['type']] ?>-</span>&nbsp;<?php echo $title; ?></a></h6>
                                        </li>
                                    <?php endforeach;
                                }
                                ?>

                                <!--<li>-->
                                <!--<a class="image-wrapper" href="#0"><img src="img/placeholder.png" alt="News image"></a>-->
                                <!--<h4><a class="cd-nowrap" href="#0">Incidunt voluptatem adipisci voluptates fugit beatae culpa eum, distinctio, assumenda est ad</a></h4>-->
                                <!--<time datetime="2016-01-12">Jan 28, 2016</time>-->
                                <!--</li>-->

                                <!--<li>-->
                                <!--<a class="image-wrapper" href="#0"><img src="img/placeholder.png" alt="News image"></a>-->
                                <!--<h4><a class="cd-nowrap" href="#0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, esse.</a></h4>-->
                                <!--<time datetime="2016-01-12">Jan 12, 2016</time>-->
                                <!--</li>-->
                            </ul>
                        </div> <!-- .news -->

                        <!--<div class="quick-links">-->
                        <!--<h3>Quick Links</h3>-->
                        <!--<ul>-->
                        <!--<li><a href="#0">Find a store</a></li>-->
                        <!--<li><a href="#0">Accessories</a></li>-->
                        <!--<li><a href="#0">Warranty info</a></li>-->
                        <!--<li><a href="#0">Support</a></li>-->
                        <!--<li><a href="#0">Contact us</a></li>-->
                        <!--</ul>-->
                        <!--</div> &lt;!&ndash; .quick-links &ndash;&gt;-->
                    </div> <!-- .cd-search-suggestions -->

                    <a href="#0" class="close cd-text-replace"></a>
                </div> <!-- .cd-main-search -->
                <div class="HeaderRepeat"></div>
                <div>
                    <button class="btn-BackPage" type="button" onclick="history.back();">بازگشت <i class="mdi mdi-chevron-left"></i></button>
                    <div class="CircleBack"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="MainBody main-dis">
        <div class="container-fluid">









<?php
