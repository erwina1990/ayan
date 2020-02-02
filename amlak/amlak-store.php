<?php include_once "../views/header.php";
$type = $_GET['type'];

if (isset($_GET['txt']))
    $_POST['filter']['store_tks_tenantname'] = $_GET['txt'];
if (isset($_POST['filter']))
    $amlak_shahrdari = get_amlakStore( $_POST['filter']);
else
    $amlak_shahrdari = get_amlakStore();
?>

    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="amlak.php">املاک شهرداری</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>املاک مغازه ها</li>
    </ul>
    <div class="BoxBody text-center">
        <div style="padding: 0 10px">
            <form method="post">
                <div class="table-responsive display-table-pc" align="center">
                    <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl"
                           cellspacing="0"
                           cellpadding="0" border="1">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام مستاجر</th>
                            <th>نوع ملک</th>
                            <th>آدرس ملک</th>
                            <th>متراژ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                            </td>
                            <td>
                                <input type="text" name="filter[store_tks_tenantname]"
                                       value="<?php if (isset($_POST['filter']['store_tks_tenantname'])
                                           && !empty($_POST['filter']['store_tks_tenantname'])) echo $_POST['filter']['store_tks_tenantname'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1971]"
                                       value="<?php if (isset($_POST['filter']['cf_1971'])
                                           && !empty($_POST['filter']['cf_1971'])) echo $_POST['filter']['cf_1971'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1983]"
                                       value="<?php if (isset($_POST['filter']['cf_1983'])
                                           && !empty($_POST['filter']['cf_1983'])) echo $_POST['filter']['cf_1983'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1973]"
                                       value="<?php if (isset($_POST['filter']['cf_1973'])
                                           && !empty($_POST['filter']['cf_1973'])) echo $_POST['filter']['cf_1973'] ?>">
                            </td>

                        </tr>
                        <?php
                        if ($amlak_shahrdari) {
                            $count = 1;
                            foreach ($amlak_shahrdari as $amlak):
                                if ($amlak['modifiedtime'] > $up) $up = $amlak['modifiedtime']; //Getting the latest update
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $amlak['store_tks_tenantname']; ?></td>
                                    <td ><?php echo $amlak['cf_1971']; ?></td>
                                    <td ><?php echo $amlak['cf_1983']; ?></td>
                                    <td ><?php echo $amlak['cf_1973']; ?></td>

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
                                <input type="text" placeholder="نام مستاجر" name="filter[store_tks_tenantname]"
                                       value="<?php if (isset($_POST['filter']['store_tks_tenantname'])
                                           && !empty($_POST['filter']['store_tks_tenantname'])) echo $_POST['filter']['store_tks_tenantname'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="نوع ملک" name="filter[cf_1971]"
                                       value="<?php if (isset($_POST['filter']['cf_1971'])
                                           && !empty($_POST['filter']['cf_1971'])) echo $_POST['filter']['cf_1971'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="آدرس ملک" name="filter[cf_1983]"
                                       value="<?php if (isset($_POST['filter']['cf_1983'])
                                           && !empty($_POST['filter']['cf_1983'])) echo $_POST['filter']['cf_1983'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="متراژ ملک" name="filter[cf_1973]"
                                       value="<?php if (isset($_POST['filter']['cf_1973'])
                                           && !empty($_POST['filter']['cf_1973'])) echo $_POST['filter']['cf_1973'] ?>">
                            </div>

                            <div>
                                <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                            </div>
                        </div>
                        </thead>
                        <?php
                        if ($amlak_shahrdari){
                        $count = 1;
                        foreach ($amlak_shahrdari

                        as $amlak):


                        ?>
                        <tbody>
                        <tr>
                            <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff"
                                class="header-table">
                                اعضای شورا
                            </td>
                        </tr>
                        <tr>
                            <th>نام مستاجر</th>
                            <td><?php echo $amlak['store_tks_tenantname']; ?></td>
                        </tr>
                        <tr>
                            <th>نوع ملک</th>
                            <td><?php echo $amlak['cf_1971']; ?></td>
                        </tr>
                        <tr>
                            <th> آدرس ملک</th>
                            <td><?php echo $amlak['cf_1983']; ?></td>
                        </tr>
                        <tr>
                            <th> متراژ ملک</th>
                            <td><?php echo $amlak['cf_1973']; ?></td>
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

