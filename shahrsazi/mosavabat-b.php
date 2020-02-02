<?php
include '../views/header.php';
?>


    <ul class="SiteMap">
        <li><a href="<?php echo URLhome ?>">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="shahrsazi.php"> اطلاعات شهرسازی</a>
            <i class="mdi mdi-chevron-left"></i>
        <li><a href="m_t.php"> مصوبات تاثیرگذار شورای عالی شهرسازی و معماری ایران</a>
        </li> <i class="mdi mdi-chevron-left"></i>
        <li>مصوبات بلند مرتبه سازی</li>
    </ul>

    <div class="BoxBody text-center clear" style="width: 100%;">

<?php for ($i=1;$i<38;++$i) {

    ?>
    <div style="border: 2px solid #242323;width: 50%;margin: 10px auto" >
        <img src="../img/mosavabat-b/mosavabat-b (<?php echo $i?>).jpg" style="width: 100%"  alt="">

        <div style="color: red;background: white"><?php echo  'Page('; echo $i.')'; ?></div>
    </div>
    </div>
<?php }
include '../views/footer.php';
?>