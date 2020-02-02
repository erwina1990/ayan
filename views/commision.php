<?php
include_once("../includes/functions.php");
include_once("../includes/date.php");
include_once "header.php";


if (isset($_GET['txt']))
    $_POST['filter']['commission_tks_title'] = $_GET['txt'];

if (isset($_POST['filter']))
    $commisions = get_commission($_POST['filter']);
else
    $commisions = get_commission();

?>

    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="/shahrsazi/shahrsazi.php">اطلاعات شهرسازی</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>کمیسیون</li>
    </ul>

    <div class="BoxBody text-center">
        <div style="padding: 0 8px;">
            <form method="post">
                <div class="table-responsive display-table-pc" >
                    <table class="widefat table-gharardad-kalan table-bordered table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th class="hide-sm-table">زمان مصوبه</th>
                            <th>محل مصوبه</th>
                            <th>متن مصوبه</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                            </td>
                            <td>
                                <input type="text" name="filter[commission_tks_title]"
                                       value="<?php if (isset($_POST['filter']['commission_tks_title'])
                                           && !empty($_POST['filter']['commission_tks_title'])) echo $_POST['filter']['commission_tks_title'] ?>">
                            </td>
                            <td class="hide-sm-table">
                                <input type="text" name="filter[cf_1586]"
                                       value="<?php if (isset($_POST['filter']['cf_1586'])
                                           && !empty($_POST['filter']['cf_1586'])) echo $_POST['filter']['cf_1586'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1588]"
                                       value="<?php if (isset($_POST['filter']['cf_1588'])
                                           && !empty($_POST['filter']['cf_1588'])) echo $_POST['filter']['cf_1588'] ?> ">

                            </td>
                            <td>
                                <input type="text" name="filter[cf_1590]"
                                       value="<?php if (isset($_POST['filter']['cf_1590'])
                                           && !empty($_POST['filter']['cf_1590'])) echo $_POST['filter']['cf_1590'] ?>">
                            </td>

                        </tr>
                        <?php
                        if ($commisions) {
                            $count = 1;
                            foreach ($commisions as $commision):
                                if ($commision['modifiedtime'] > $up) $up = $commision['modifiedtime']; //Getting the latest update
                                $date = preg_split("/\-/", $commision['cf_1586']);
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $commision['commission_tks_title']; ?></td>
                                    <td class="hide-sm-table text-center"><?php echo gregorian_to_jalali($date[0], $date[1], $date[2]); ?></td>
                                    <td><?php echo $commision['cf_1588']; ?></td>
                                    <td><?php echo $commision['cf_1590']; ?></td>

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
            <?php
            if ($commisions) {
                $count = 1;
                foreach ($commisions as $commision):
                    $date = preg_split("/\-/", $commision['cf_1586']);
                    ?>
                    <div>
                        <table class="table widefat  table-tender1  table-bordered  table-striped"
                               style="border: 2px solid #85bdcc;">
                            <tr>
                                <td COLSPAN="2" style="font-weight: bold" class="header-table">شماره
                                    کمیسیون <?php echo $count; ?></td>
                            </tr>
                            <tr>
                                <th>عنوان</th>
                                <td><?php echo $commision['commission_tks_title']; ?></td>
                            </tr>
                            <tr>
                                <th>زمان مصوبه</th>
                                <td><?php echo gregorian_to_jalali($date[0], $date[1], $date[2]); ?></td>
                            </tr>
                            <tr>
                                <th>محل مصوبه</th>
                                <td><?php echo $commision['cf_1588']; ?></td>
                            </tr>
                            <tr>
                                <th>متن مصوبه</th>
                                <td class="text-justify"><?php echo $commision['cf_1590']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    $count++;
                endforeach;
            } else {
                echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
            }
            ?>
        </div>
    </div>
<?php
include_once "footer.php";
last_update($up);







