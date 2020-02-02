<?php include_once "../views/header.php";
$num = $_GET['session'];
$id = $_GET['id'];
$mosavabat_sesstion = View_details($num, $id);


?>


<ul class="SiteMap">
    <li><a href="/">صفحه اول</a></li>
    <i class="mdi mdi-chevron-left"></i>
    <li><a href="/"> مصوبات شورا</a></li>
    <i class="mdi mdi-chevron-left"></i>
    <li>مشاهده مصوبات جلسه</li>
</ul>
<div class="BoxBody text-right">
    <div style="padding: 0 10px">
        <form method="post">
            <div class="table-responsive display-table-pc" style="max-height: 700px" align="center">
                <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" cellspacing="0"
                       cellpadding="0" border="1">
                    <thead>
                    <tr>
                        <th>عنوان مصوبه</th>
                        <th> متن مصوبه</th>
                        <th> کمیسیون مربوطه</th>
                        <th> تاریخ جلسه</th>
                        <th> افراد موافق</th>
                        <th>افراد مخالف</th>
                        <th>افراد ممتنع</th>
                        <th>وضعیت مصوبه</th>
                        <th>وضعیت تصویب </th>
                        <th>نیاز به مصوبه </th>
                    </tr>
                    </thead>
                    <tbody>
        <?php
while($as=mysqli_fetch_array($mosavabat_sesstion)){
    $sdate = preg_split("/\-/",$as['cf_1766']);
      ?>

        <tr>

            <td class="text-right"><?php echo $as['approvals_tks_approvaltitle']; ?></td>
            <td class="text-right"><?php echo $as['cf_1728']; ?></td>
            <td class="text-right"><?php echo $as['cf_1734']; ?></td>
            <td><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]); ?></td>
            <td class="text-right"><?php echo str_replace("|##|", "-", $as['cf_1744']); ?></td>
            <td class="text-right"><?php echo str_replace("|##|", "-", $as['cf_1746']); ?></td>
            <td class="text-right"><?php echo str_replace("|##|", "-", $as['cf_1748']); ?></td>
            <td><?php echo $as['cf_1756']; ?></td>
            <td><?php echo $as['cf_1738']; ?></td>
            <td><?php echo $as['cf_1742']; ?></td>
        </tr>
        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<?php include_once "../views/footer.php"; ?>
