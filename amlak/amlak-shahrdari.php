<?php include_once "../views/header.php";
$type = $_GET['type'];

if (isset($_GET['txt']))
    $_POST['filter']['amlak_tks_propertydetails'] = $_GET['txt'];
if (isset($_POST['filter']))
    $amlak_shahrdari = get_amlakShahrdari($type, $_POST['filter']);
else
    $amlak_shahrdari = get_amlakShahrdari($type);
?>

    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="amlak.php">املاک شهرداری</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>املاک <?php echo str_replace("'", "", $type) ?></li>
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
                            <th>نام ملک</th>
                            <th>بهره بردار </th>
                            <th>آدرس ملک</th>
                            <th>پلاک</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                            </td>
                            <td>
                                <input type="text" name="filter[amlak_tks_propertydetails]"
                                       value="<?php if (isset($_POST['filter']['amlak_tks_propertydetails'])
                                           && !empty($_POST['filter']['amlak_tks_propertydetails'])) echo $_POST['filter']['amlak_tks_propertydetails'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1933]"
                                       value="<?php if (isset($_POST['filter']['cf_1933'])
                                           && !empty($_POST['filter']['cf_1933'])) echo $_POST['filter']['cf_1933'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1935]"
                                       value="<?php if (isset($_POST['filter']['cf_1935'])
                                           && !empty($_POST['filter']['cf_1935'])) echo $_POST['filter']['cf_1935'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1961]"
                                       value="<?php if (isset($_POST['filter']['cf_1961'])
                                           && !empty($_POST['filter']['cf_1961'])) echo $_POST['filter']['cf_1961'] ?>">
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
                                    <td><?php echo $amlak['amlak_tks_propertydetails']; ?></td>
                                    <td><?php echo $amlak['cf_1933']; ?></td>
                                    <td><?php echo $amlak['cf_1935']; ?></td>
                                    <td><?php echo $amlak['cf_1961']; ?></td>
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
                                <input type="text" placeholder="نام ملک" name="filter[amlak_tks_propertydetails]"
                                       value="<?php if (isset($_POST['filter']['amlak_tks_propertydetails'])
                                           && !empty($_POST['filter']['amlak_tks_propertydetails'])) echo $_POST['filter']['amlak_tks_propertydetails'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="نوع ملک" name="filter[cf_1933]"
                                       value="<?php if (isset($_POST['filter']['cf_1933'])
                                           && !empty($_POST['filter']['cf_1933'])) echo $_POST['filter']['cf_1933'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="آدرس ملک" name="filter[cf_1935]"
                                       value="<?php if (isset($_POST['filter']['cf_1935'])
                                           && !empty($_POST['filter']['cf_1935'])) echo $_POST['filter']['cf_1935'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="آدرس ملک" name="filter[cf_1961]"
                                       value="<?php if (isset($_POST['filter']['cf_1961'])
                                           && !empty($_POST['filter']['cf_1961'])) echo $_POST['filter']['cf_1961'] ?>">
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
                            <th>نام ملک</th>
                            <td><?php echo $amlak['amlak_tks_propertydetails']; ?></td>
                        </tr>
                        <tr>
                            <th>بهره بردار </th>
                            <td><?php echo $amlak['cf_1933']; ?></td>
                        </tr>
                        <tr>
                            <th> آدرس ملک</th>
                            <td><?php echo $amlak['cf_1935']; ?></td>
                        </tr>
                        <tr>
                            <th> پلاک</th>
                            <td><?php echo $amlak['cf_1961']; ?></td>
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

