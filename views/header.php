
<?php
$modules = array(
    "hcontract" => "قراردادهای کلان",
    "mcontract" => "قراردادهای متوسط",
    "project" => "پروژه های عمرانی",
    "tender" => "مناقصات",
    "bigsales" => "مزایدات",
);
include_once("../includes/functions.php");
if (isset($_POST['filter']) && !empty($_POST['filter']['cat'])) {
    if ($_POST['filter']['cat'] == "contract")
        header("Location: views/hcontract.php?txt=" . $_POST['filter']['txt']);

    if ($_POST['filter']['cat'] == "mcontract")
        header("Location: views/mcontract.php?txt=" . $_POST['filter']['txt']);

    if ($_POST['filter']['cat'] == "tender")
        header("Location: views/tender.php?txt=" . $_POST['filter']['txt']);

    if ($_POST['filter']['cat'] == "project")
        header("Location: views/project.php?txt=" . $_POST['filter']['txt']);

}
$result = "";
if (isset($_POST['filter']) && empty($_POST['filter']['cat']) && !empty($_POST['filter']['txt']))
    $result = search($_POST['filter']['txt']);

$up=0;
?>
<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <title>سامانه شفافیت شهرداری اراک</title>
    <meta charset="utf-8">
    <meta name="Description" content="سامانه عیان سامانه ای برای شفافیت و شهر هوشمند.شهرداری اراک حدیث خدمت و سازندگی"/>
    <meta name="Keywords"
          content="قراردادها،قراردادهای کلان،قراردادهای متوسط،سامانه،شفافیت،شهرداری،اراک،سامانه عیان،مزایده،مناقصه"/>
    <meta id="MetaRobots" name="ROBOTS" content="INDEX, FOLLOW"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo URLhome ?>css/bootstrap-rtl.css">
    <link rel="stylesheet" href="<?php echo URLhome ?>css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo URLhome ?>css/index2.css">
    <link rel="stylesheet" href="<?php echo URLhome ?>css/main.css">
    <link rel="stylesheet" href="<?php echo URLhome ?>css/index2-animate.css">
    <script src="<?php echo URLhome ?>js_2/modernizr.js"></script>
    <script src="<?php echo URLhome ?>js_2/search-toggle-mobile.js"></script>
    <meta name="google-site-verification" content="VW6BQOoc6PW_wgGDm8Pd7AoTkdoFoGQHWzcwj5N7shU"/>
</head>
<body>


<div class="first-body">
    <h1 hidden>سامانه شفافیت شهرداری اراک</h1>
    <div id="cover-display"  style=""></div>

    <div class="mainBODY">
        <div class="header-menu">

            <div class="header">
                <div class="row " style="margin: auto">
                    <div class="col-2">
                        <div class=" float-right ">
                            <div class="">
                                <a class="menu cd-drp-trigger" href="#0" title="منو"></a>

                                <nav class="cd-dropdown">
                                    <!-- <h2>عیان</h2>-->
                                    <a href="#0" class="cd-close">بستن</a>
                                    <ul class="cd-dropdown-content">
                                        <li><a href="<?php echo URLhome ?>">صفحه اصلی</a></li>
                                        <li class="has-children"> <a >قرارداد</a>
                                            <ul class="cd-dropdown-icons is-hidden">
                                                <li class="go-back"><a href="#0">بازگشت</a></li>
                                                <li>
                                                    <a class="cd-dropdown-item item-1"
                                                       href="<?php echo URLhome ?>views/hcontract.php">
                                                        قراردادهای کلان
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="cd-dropdown-item item-1"
                                                       href="<?php echo URLhome ?>views/mcontract.php">
                                                        قراردادهای متوسط
                                                    </a>
                                                </li>
                                            </ul> <!-- .cd-dropdown-icons -->
                                        </li>
                                        <li><a href="<?php echo URLhome ?>amlak/amlakShahrdari.php">املاک شهرداری</a></li>
                                        <li class="has-children">
                                            <a >اطلاعات شهرسازی</a>
                                            <ul class="cd-dropdown-icons is-hidden">
                                                <li class="go-back"><a href="#0">بازگشت</a></li>
                                                <li>
                                                    <a class="cd-dropdown-item item-1"
                                                       href="<?php echo URLhome ?>shahrsazi/building_rules.php">
                                                        ضوابط شهرسازی
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="cd-dropdown-item item-2" href="<?php echo URLhome ?>shahrsazi/karbari.php">
                                                        دریافت نقشه کاربری ها
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="cd-dropdown-item item-3"
                                                       href="<?php echo URLhome ?>shahrsazi/mantaghe_bandi.php">
                                                        دریافت نقشه منطقه بندی
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="cd-dropdown-item item-4" href="<?php echo URLhome ?>excel/parvaneh.xlsx">
                                                        دریافت اکسل محاسبه عوارض پروانه
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="cd-dropdown-item item-5" href="<?php echo URLhome ?>shahrsazi/madeh_5.php">
                                                        مصوبات کمیسیون ماده ۵
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="cd-dropdown-item item-6" href="<?php echo URLhome ?>views/workflow.php">
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
                                        <li><a href="<?php echo URLhome ?>views/boodjeh.php">بودجه</a></li>
                                        <li><a href="<?php echo URLhome ?>views/project.php">پروژه های عمرانی</a></li>
                                        <li><a href="<?php echo URLhome ?>views/tender.php">مناقصات</a></li>
                                        <li><a href="<?php echo URLhome ?>views/bigsales.php">مزایده ها</a></li>
                                        <li><a href="<?php echo URLhome ?>views/baazaarche.php">کانکس ها و بازارچه ها</a></li>
                                        <li><a href="<?php echo URLhome ?>mosavabat-shora/shoraha.php">اطلاعات شورای شهر</a></li>
                                        <li><a href="<?php echo URLhome ?>views/shahrdari.php">اطلاعات مدیران و کارکنان شهرداری</a></li>
                                    </ul> <!-- .cd-dropdown-content -->
                                </nav> <!-- .cd-dropdown -->
                            </div> <!-- .cd-dropdown-wrapper -->
                        </div>


                    </div>
                    <div class="col-8">
                        <div class="header-text">
                            <a href="<?php echo URLhome ?>" title="سامانه شفاف سازی عیان">
                                <p>سامانه شفاف سازی عیان</p>
                                <div class="logo"></div>
                            </a>

                        </div>
                    </div>
                    <div class="col-2">
                        <a href="http://arak.ir/" target="_blank" title="شهرداری اراک">
                            <div class="shahrdari-logo"></div>
                        </a>
                        <button class="btn-BackPage"  type="button" onclick="history.back();"> بازگشت <i class="mdi mdi-chevron-left"></i></button>
                    </div>
                </div>
            </div>

        </div>
        <div class="cd-menu-serach">
            <div class=" ">
                <header class="cd-main-header animate-search">
                    <nav class="cd-main-nav-wrapper">
                        <a href="#search" class="cd-search-trigger cd-text-replace" title="جستجو">
                            <span class="search"   style="color :#fff"></span></a>
                    </nav> <!-- .cd-main-nav-wrapper -->

                    <a href="#0" class="cd-nav-trigger cd-text-replace" title="منو">منو<span></span></a>
                </header>
                <div id="search" class="cd-main-search <?php if ($result) echo 'is-visible'; ?>">
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
                                if ($result) {
                                    foreach ($result as $res):
                                        $title = "";
                                        $terms = explode(" ", $res['title']);
                                        if (count($terms) > 20) {
                                            $i = 0;
                                            foreach ($terms as $term):
                                                if ($i > 20)
                                                    break;
                                                $title .= $term . " ";
                                                $i++;
                                            endforeach;
                                            $title .= "....";
                                        } else
                                            $title = $res['title'];
                                        ?>
                                        <li>
                                            <h6><a class="cd-nowrap"
                                                   href="../views/<?php echo $res['type'] ?>.php?id=<?php echo $res['id'] ?>&txt=<?php echo $title ?>">
                                                    <span style="color: orangered;"><?php echo $modules[$res['type']] ?>-</span>&nbsp;<?php echo $title; ?>
                                                </a>
                                            </h6>
                                        </li>
                                    <?php endforeach;
                                }
                                ?>
                            </ul>
                        </div> <!-- .news -->
                    </div> <!-- .cd-search-suggestions -->

                    <a href="#0" class="close cd-text-replace"></a>
                </div> <!-- .cd-main-search -->
                <script src="../js_2/main.js"></script>


            </div>
        </div>