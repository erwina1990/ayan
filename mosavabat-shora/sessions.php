<?php include_once "../views/header.php";
if (isset($_GET['txt']))
    $_POST['filter']['commission_tks_title'] = $_GET['txt'];
if (isset($_POST['filter']))
    $mosavabat = get_sessions($_POST['filter']);
else
    $mosavabat = get_sessions();
?>

    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="/mosavabat-shora/shoraha.php">اطلاعات شوراها</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li> جلسات شورا</li>
    </ul>
    <div class="BoxBody text-center">
    <div style="padding: 0 10px 30px 10px">
        <form method="post">
            <div class="table-responsive display-table-pc" style="max-height: 700px" align="center">
                <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" cellspacing="0"
                       cellpadding="0" border="1">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>شماره جلسه</th>
                        <th>مکان جلسه</th>
                        <th>تاریخ جلسه</th>
                        <th>نوع جلسه</th>
                        <th>مصوبات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="trInputs">
                        <td>
                            <input type="submit" class="btn btn-info"
                                   style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                        </td>
                        <td>
                            <input type="text" name="filter[sessioninfo_tks_sessionnumber]"
                                   value="<?php if (isset($_POST['filter']['sessioninfo_tks_sessionnumber'])
                                       && !empty($_POST['filter']['sessioninfo_tks_sessionnumber'])) echo $_POST['filter']['sessioninfo_tks_sessionnumber'] ?>">
                        </td>
                        <td>
                            <input type="text" name="filter[cf_1770]"
                                   value="<?php if (isset($_POST['filter']['cf_1770'])
                                       && !empty($_POST['filter']['cf_1770'])) echo $_POST['filter']['cf_1770'] ?>">
                        </td>
                        <td>
                            <input type="text" name="filter[cf_1766]"
                                   value="<?php if (isset($_POST['filter']['cf_1766'])
                                       && !empty($_POST['filter']['cf_1766'])) echo $_POST['filter']['cf_1766'] ?>">
                        </td>
                        <td>
                            <input type="text" name="filter[cf_1768]"
                                   value="<?php if (isset($_POST['filter']['cf_1768'])
                                       && !empty($_POST['filter']['cf_1768'])) echo $_POST['filter']['cf_1768'] ?>">
                        </td>
                        <td></td>
                    </tr>
                    <?php $session = '';
                    $sum = 1;
                    if ($mosavabat) {
                        $count = 1;
                        /*while ($mosavab=mysqli_fetch_array($mosavabat)){
                            echo $mosavab['sessioninfoid']." ";}*/
                        foreach ($mosavabat as $mosavab):
                            if ($mosavab['modifiedtime'] > $up) $up = $mosavab['modifiedtime']; //Getting the latest update
                            $sdate = preg_split("/\-/", $mosavab['cf_1766']);
                            ?>

                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>صحن علنی  <?php echo $mosavab['sessioninfo_tks_sessionnumber']; ?></td>
                                <td><?php echo $mosavab['cf_1770']; ?></td>
                                <td><?php echo gregorian_to_jalali($sdate[0], $sdate[1], $sdate[2]); ?></td>
                                <td><?php echo $mosavab['cf_1768']; ?></td>
                                <td>
                                    <a href="mo.php?session=<?php echo $mosavab['sessioninfoid'] . '&number_id=' . $mosavab['sessioninfo_tks_sessionnumber'] ?>">مشاهده
                                        مصوبات</a></td>
                            </tr>
                            <?php

                            $session = $mosavab['sessioninfoid'];
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
    </div>
    <div class="display-table-mob">
        <form method="post">
            <div>
                <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
            </div>
            <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                <span style="font-size: 12px;color: #fff;">تعداد کل  جلسات شورا: <?php echo $count - 1; ?></span>
            </div>
            <table class="table widefat  table-tender1  table-bordered  table-striped"
                   style="border: 2px solid #218838;margin:5px auto;background: white;">
                <thead>
                <div class="trInputsMob">
                    <div>
                        <input type="text" placeholder="شماره جلسه" name="filter[sessioninfo_tks_sessionnumber]"
                               value="<?php if (isset($_POST['filter']['sessioninfo_tks_sessionnumber'])
                                   && !empty($_POST['filter']['sessioninfo_tks_sessionnumber'])) echo $_POST['filter']['sessioninfo_tks_sessionnumber'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="مکان جلسه" name="filter[cf_1770]"
                               value="<?php if (isset($_POST['filter']['cf_1770'])
                                   && !empty($_POST['filter']['cf_1770'])) echo $_POST['filter']['cf_1770'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="تاریخ جلسه" name="filter[cf_1766]"
                               value="<?php if (isset($_POST['filter']['cf_1766'])
                                   && !empty($_POST['filter']['cf_1766'])) echo $_POST['filter']['cf_1766'] ?>">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                    </div>
                </div>
                </thead>
                <?php
                if ($mosavabat){
                $count = 1;
                foreach ($mosavabat

                as $contract):
                $sdate = preg_split("/\-/", $contract['cf_1766']);

                ?>
                <tbody>
                <tr>
                    <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;" class="header-table">
                        صحن علنی <?php echo $count; ?></td>
                </tr>
                <tr>
                    <th>شماره جلسه</th>
                    <td><?php echo $contract['sessioninfo_tks_sessionnumber']; ?></td>
                </tr>
                <tr>
                    <th>مکان جلسه</th>
                    <td><?php echo $contract['cf_1770']; ?></td>
                </tr>
                <tr>
                    <th>تاریخ جلسه</th>
                    <td><?php echo gregorian_to_jalali($sdate[0], $sdate[1], $sdate[2]) ?></td>
                </tr>
                <tr>
                    <th>نوع جلسه</th>
                    <td><?php echo $contract['cf_1768']; ?></td>
                </tr>
                <tr>
                    <th>مصوبات جلسه</th>
                    <td>
                        <a href="mo.php?session=<?php echo $mosavab['sessioninfoid'] . '&number_id=' . $mosavab['sessioninfo_tks_sessionnumber'] ?>">مشاهده
                            مصوبات</a></td>
                </tr>

                <?php
                $count++;
                endforeach;
                } else {
                    echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                } ?>
                </tbody>
            </table>
        </form>
    </div>
    </div>
<?php include_once "../views/footer.php";
last_update($up);
