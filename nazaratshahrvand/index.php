<?php
include  '../views/header.php';
require_once "action.php";
?>

    <style>
        .nazaratshahrvand{
            max-width: 600px;
            width: 100%;
            margin: auto;
            border: 1px solid #858a8a;
            padding: 60px 20px;
            box-shadow: 0 0 13px -1px #858a8a;
            border-radius: 5px;
            background: #fff;
            min-height: 400px;
        }
        .nazaratshahrvand input[type='text'],.nazaratshahrvand input[type='email'] ,.nazaratshahrvand textarea{
            margin-top: 10px;
            width: 100%;
        }
        .nazaratshahrvand input[type='submit']{
            margin: 10px;
            background: #0ab90a;
            color: #fff;
            float: left;
        }
        .error {
            color: #FF0000;
        }
    </style>


    <div class="container-fluid row " style="margin: 0;padding: 0; ">
        <ul class="SiteMap">
            <li><a href="/">صفحه اول</a></li>
            <i class="mdi mdi-chevron-left"></i>

            <li>ثبت نظر شهروندان</li>
        </ul>
        <div class="MainBody-copy col-md-12 main-dis margin-div">
            <div class="nazaratshahrvand">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <input name="name_family" type="text" placeholder="نام و نام خانوادگی.." value="<?php  echo $name; ?>" >
                    <span class="error">*<?php echo $nameErr; ?></span><br>

                    <input name="email_user" type="text" placeholder="ایمیل.." value="<?php  echo $email; ?>" >
                    <span class="error">*<?php echo $emailErr; ?></span><br>

                    <textarea name="comment" placeholder="متن نظر شما.." value="<?php  echo $comment; ?>"> </textarea><br>

                    <input type="submit" name="send_message" value="ارسال نظر">

                </form>
                <div class="clear" ></div>
            </div>

        </div><!--end of MainBody-->
    </div>


<?php
include '../views/footer.php';

