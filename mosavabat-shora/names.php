<?php include_once "../views/header.php";
if (isset($_GET['txt']))
    $_POST['filter']['commission_tks_title'] = $_GET['txt'];
if (isset($_POST['filter']))
    $names_shoraha = get_names_shoraaha($_POST['filter']);
else
    $names_shoraha = get_names_shoraaha();

?>
    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="/mosavabat-shora/shoraha.php">اطلاعات شوراها</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>اعضای شورا</li>
    </ul>
    <div class="BoxBody text-center">
    <div style="padding: 0 10px">
        <form method="post">
            <div class="table-responsive display-table-pc" style="max-height: 700px" align="center">
                <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" cellspacing="0"
                       cellpadding="0" border="1">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی</th>
                        <th>تاریخ شروع مسئولیت</th>
                        <th>تاریخ پایان مسئولیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="trInputs">
                        <td>
                            <input type="submit" class="btn btn-info"
                                   style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                        </td>
                        <td>
                            <input disabled type="text" name="filter[councilmembers_tks_name]"
                                   value="<?php if (isset($_POST['filter']['councilmembers_tks_name'])
                                       && !empty($_POST['filter']['councilmembers_tks_name'])) echo $_POST['filter']['councilmembers_tks_name'] ?>">
                        </td>
                        <td>
                            <input disabled type="text" name="filter[cf_1692]"
                                   value="<?php if (isset($_POST['filter']['cf_1692'])
                                       && !empty($_POST['filter']['cf_1692'])) echo $_POST['filter']['cf_1692'] ?>">
                        </td>
                        <td>
                            <input disabled type="text" name="filter[cf_1694]"
                                   value="<?php if (isset($_POST['filter']['cf_1694'])
                                       && !empty($_POST['filter']['cf_1694'])) echo $_POST['filter']['cf_1694'] ?>">
                        </td>

                    </tr>
                    <?php
                    if ($names_shoraha) {
                        $count = 1;
                        foreach ($names_shoraha as $name):
                            if ($name['modifiedtime'] > $up) $up = $name['modifiedtime']; //Getting the latest update

                            $fdate = preg_split("/\-/", $name['cf_1798']);
                            $ldate = preg_split("/\-/", $name['cf_1800']);
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $name['councilmembers_tks_name']; ?></td>
                                <td><?php echo gregorian_to_jalali($fdate[0], $fdate[1], $fdate[2]); ?></td>
                                <td><?php echo gregorian_to_jalali($ldate[0], $ldate[1], $ldate[2]); ?></td>
                            </tr>
                            <?php
                            $count++;
                        endforeach;
                    } else {
                        echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </form>
        <form method="post">
            <div class="display-table-mob">
                <div>
                    <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
                </div>
                <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                    <span style="font-size: 12px;color: #fff;">اعضای کل شورا :  <?php echo $count - 1; ?></span>
                </div>
                <table class="table widefat  table-tender1  table-bordered  table-striped"
                       style="border: 2px solid #218838;margin:5px auto;background: white;">
                    <thead>
                    <div class="trInputsMob">
                        <div>
                            <input type="text" placeholder="نام و نام خانوادگی" name="filter[councilmembers_tks_name]"
                                   value="<?php if (isset($_POST['filter']['councilmembers_tks_name'])
                                       && !empty($_POST['filter']['councilmembers_tks_name'])) echo $_POST['filter']['councilmembers_tks_name'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="تاریخ شرع مسئولیت" name="filter[cf_1692]"
                                   value="<?php if (isset($_POST['filter']['cf_1692'])
                                       && !empty($_POST['filter']['cf_1692'])) echo $_POST['filter']['cf_1692'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" تاریخ پایان مسولیت" name="filter[cf_1694]"
                                   value="<?php if (isset($_POST['filter']['cf_1694'])
                                       && !empty($_POST['filter']['cf_1694'])) echo $_POST['filter']['cf_1694'] ?>">
                        </div>

                        <div>
                            <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                        </div>
                    </div>
                    </thead>
                    <?php
                    if ($names_shoraha){
                    $count = 1;
                    foreach ($names_shoraha

                    as $name):
                    $fdate = preg_split("/\-/", $name['cf_1798']);
                    $ldate = preg_split("/\-/", $name['cf_1800']);
                    ?>
                    <tbody>
                    <tr>
                        <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff" class="header-table">
                            اعضای شورا</td>
                    </tr>
                    <tr>
                        <th>نام و نام خانوادگی</th>
                        <td><?php echo $name['councilmembers_tks_name']; ?></td>
                    </tr>
                    <tr>
                        <th>تاریخ شروع مسئولیت</th>
                        <td><?php echo gregorian_to_jalali($fdate[0], $fdate[1], $fdate[2]); ?></td>
                    </tr>
                    <tr>
                        <th> تاریخ پایان مسئولیت</th>
                        <td><?php echo gregorian_to_jalali($ldate[0], $ldate[1], $ldate[2]); ?></td>
                    </tr>

                    <?php
                    $count++;
                    endforeach;

                    } else {
                        echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                    } ?>
                    <div id="resultSearch" style="display: none">
                        <span style="font-size: 12px">جستجو انجام شد. تعداد جستجو: <?php echo $count - 1; ?></span>
                    </div>
                    </tbody>
                </table>
            </div>

        </form>
    </div>

    </div>
<?php include_once "../views/footer.php";
last_update($up);
