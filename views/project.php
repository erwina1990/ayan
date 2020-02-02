<?php
include_once "header.php";
if (isset($_GET['txt']))
    $_POST['filter']['cf_1392'] = $_GET['txt'];
if (isset($_POST['filter']))
    $projects = get_project($_POST['filter']);
else
    $projects = get_project();
if (isset($_GET['id']))
    $projects = getProjectById($_GET['id']);
?>
    <ul class="SiteMap">
        <li><a href="<?php echo URLhome ?>">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>پروژه های عمرانی</li>
    </ul>
    <div class="BoxBody text-center " style="width: 100%;">
        <div class="" style="padding: 0 8px;">
            <form method="post">
                <div class="table-responsive display-table-pc" style="max-height: 700px;overflow-y: auto;">
                    <table class="widefat table-gharardad-motevaset table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th> پروژه</th>
                            <th> شماره قرارداد</th>
                            <th> تاریخ قرارداد</th>
                            <th>نام پیمانکار</th>
                            <th>مبلغ قرارداد مربوط به پروژه</th>
                            <th>محل پروژه</th>
                            <th> مبلغ آخرین صورت وضعیت</th>
                            <th> میزان جذب ریالی پروژه <br>(درصد)</th>
                            <th>پیشرفت فیزیکی پروژه <br>(درصد)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1392]"
                                       value="<?php if (isset($_POST['filter']['cf_1392'])
                                           && !empty($_POST['filter']['cf_1392'])) echo $_POST['filter']['cf_1392'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1394]"
                                       value="<?php if (isset($_POST['filter']['cf_1394'])
                                           && !empty($_POST['filter']['cf_1394'])) echo $_POST['filter']['cf_1394'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1396]"
                                       value="<?php if (isset($_POST['filter']['cf_1396'])
                                           && !empty($_POST['filter']['cf_1396'])) echo $_POST['filter']['cf_1396'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1398]"
                                       value="<?php if (isset($_POST['filter']['cf_1398'])
                                           && !empty($_POST['filter']['cf_1398'])) echo $_POST['filter']['cf_1398'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1436]"
                                       value="<?php if (isset($_POST['filter']['cf_1436'])
                                           && !empty($_POST['filter']['cf_1436'])) echo $_POST['filter']['cf_1436'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1402]"
                                       value="<?php if (isset($_POST['filter']['cf_1402'])
                                           && !empty($_POST['filter']['cf_1402'])) echo $_POST['filter']['cf_1402'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1438]"
                                       value="<?php if (isset($_POST['filter']['cf_1438'])
                                           && !empty($_POST['filter']['cf_1438'])) echo $_POST['filter']['cf_1438'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1594]"
                                       value="<?php if (isset($_POST['filter']['cf_1594'])
                                           && !empty($_POST['filter']['cf_1594'])) echo $_POST['filter']['cf_1594'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1406]"
                                       value="<?php if (isset($_POST['filter']['cf_1406'])
                                           && !empty($_POST['filter']['cf_1406'])) echo $_POST['filter']['cf_1406'] ?>">
                            </td>
                        </tr>
                        <?php
                        if ($projects) {
                            $count = 1;
                            foreach ($projects as $project):
                                if ($project['modifiedtime'] > $up) $up = $project['modifiedtime']; //Getting the latest update

                                $date = preg_split("/\-/", $project['cf_1396']);
                                $enddate = preg_split("/\-/", $project['cf_1598']);
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $project['cf_1392']; ?> </td>
                                    <td><?php echo $project['cf_1394']; ?></td>
                                    <td><?php echo gregorian_to_jalali($date[0], $date[1], $date[2]); ?></td>
                                    <td><?php echo $project['cf_1398']; ?></td>
                                    <td><?php echo number_format($project['cf_1436'] / 1000000); ?> میلیون ریال</td>
                                    <td><?php echo $project['cf_1402']; ?></td>
                                    <?php if ($project['cf_1438'] <= $project['cf_1436']) { ?>
                                        <td> <?php echo number_format($project['cf_1438'] / 1000000); ?> میلیون
                                        ریال</td><?php } else { ?>
                                        <td> <?php echo "<span style='color: red'>خطا : مبلغ آخرین صورت وضعیت از مبلغ کل قراداد بیشتر میباشد.</span>"; ?></td><?php } ?>
                                    <td><?php echo $project['cf_1594']; ?></td>
                                    <td><?php echo $project['cf_1406']; ?></td>
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
        </div>
        <div class="display-table-mob">
            <form method="post">
                <div>
                    <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
                </div>

                <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                    <span style="font-size: 12px;color: #fff;">تعداد کل پروژه های عمرانی: <?php echo $count - 1; ?></span>
                </div>
                <table class="table widefat  table-tender1  table-bordered  table-striped"
                       style="border: 2px solid #218838;margin:5px auto;background: white;">
                    <thead>
                    <div class="trInputsMob">
                        <div>
                            <input type="text" placeholder="نام پروژه" name="filter[cf_1392]"
                                   value="<?php if (isset($_POST['filter']['cf_1392'])
                                       && !empty($_POST['filter']['cf_1392'])) echo $_POST['filter']['cf_1392'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="شماره قرارداد" name="filter[cf_1394]"
                                   value="<?php if (isset($_POST['filter']['cf_1394'])
                                       && !empty($_POST['filter']['cf_1394'])) echo $_POST['filter']['cf_1394'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="تاریخ قرارداد" name="filter[cf_1396]"
                                   value="<?php if (isset($_POST['filter']['cf_1396'])
                                       && !empty($_POST['filter']['cf_1396'])) echo $_POST['filter']['cf_1396'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="نام پیمانکار " name="filter[cf_1398]"
                                   value="<?php if (isset($_POST['filter']['cf_1398'])
                                       && !empty($_POST['filter']['cf_1398'])) echo $_POST['filter']['cf_1398'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="مبلغ قرارداد مربوط به پروژه " name="filter[cf_1436]"
                                   value="<?php if (isset($_POST['filter']['cf_1436'])
                                       && !empty($_POST['filter']['cf_1436'])) echo $_POST['filter']['cf_1436'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="محل پروژه" name="filter[cf_1402]"
                                   value="<?php if (isset($_POST['filter']['cf_1402'])
                                       && !empty($_POST['filter']['cf_1402'])) echo $_POST['filter']['cf_1402'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="مبلغ آخرین صورت وضعیت" name="filter[cf_1438]"
                                   value="<?php if (isset($_POST['filter']['cf_1438'])
                                       && !empty($_POST['filter']['cf_1438'])) echo $_POST['filter']['cf_1438'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" میزان جذب ریالی پروژه(درصد)" name="filter[cf_1594]"
                                   value="<?php if (isset($_POST['filter']['cf_1594'])
                                       && !empty($_POST['filter']['cf_1594'])) echo $_POST['filter']['cf_1594'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" پیشرفت فیزیکی پروژه(درصد)" name="filter[cf_1406]"
                                   value="<?php if (isset($_POST['filter']['cf_1406'])
                                       && !empty($_POST['filter']['cf_1406'])) echo $_POST['filter']['cf_1406'] ?>">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                        </div>
                    </div>
                    </thead>
                    <?php
                    if ($projects){
                    $count = 1;
                    foreach ($projects

                    as $project):
                    $date = preg_split("/\-/", $project['cf_1396']);
                    $enddate = preg_split("/\-/", $project['cf_1598']);
                    ?>
                    <tbody>
                    <tr>
                        <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;" class="header-table">
                            پروژه شماره <?php echo $count; ?></td>
                    </tr>
                    <tr>
                        <th>نام پروژه</th>
                        <td><?php echo $project['cf_1392']; ?> </td>
                    </tr>
                    <tr>
                        <th> شماره قرارداد</th>
                        <td><?php echo $project['cf_1394']; ?></td>
                    </tr>
                    <tr>
                        <th> تاریخ قرارداد</th>
                        <td><?php echo gregorian_to_jalali($date[0], $date[1], $date[2]); ?></td>
                    </tr>
                    <tr>
                        <th>نام پیمانکار</th>
                        <td><?php echo $project['cf_1398']; ?></td>
                    </tr>
                    <tr>
                        <th>مبلغ قرارداد مربوط به پروژه</th>
                        <td><?php echo number_format($project['cf_1436'] / 1000000); ?> میلیون ریال</td>
                    </tr>
                    <tr>
                        <th>محل پروژه</th>
                        <td><?php echo $project['cf_1402']; ?></td>
                    </tr>
                    <tr>
                        <th>مبلغ آخرین صورت وضعیت</th>
                        <?php if ($project['cf_1438'] <= $project['cf_1438']) { ?>
                            <td> <?php echo number_format($project['cf_1438'] / 1000000); ?> میلیون
                            ریال</td><?php } else { ?>
                            <td> <?php echo "<span style='color: red'>خطا : مبلغ آخرین صورت وضعیت از مبلغ کل قراداد بیشتر میباشد.</span>"; ?></td><?php } ?>
                    </tr>
                    <tr>
                        <th> میزان جذب ریالی پروژه (درصد)</th>
                        <td><?php echo $project['cf_1594']; ?>%</td>
                    </tr>
                    <tr>
                        <th> پیشرفت فیزیکی پروژه (درصد)</th>
                        <td><?php echo $project['cf_1406']; ?>%</td>
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
            </form>
        </div>
    </div>
<?php include_once "footer.php";
last_update($up);

