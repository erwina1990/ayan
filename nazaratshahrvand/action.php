<?php
require_once "../includes/connection.php";
require_once "../includes/functions.php";

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name_family"])) {
        $nameErr = "Name is required";

    } else {
        $name = check_input($_POST["name_family"]);// check if name only contains letters and whitespace

        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email_user"])) {
        $emailErr = "Email is required";
    } else {
        $email = check_input($_POST["email_user"]);// check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = check_input($_POST["comment"]);
    }

}







/*if (isset($_POST['send_message'])) {
    if (empty($_POST["name_family"]))
        $nameErr = "نام الزامی است";
    else{
        $name = check_input($_POST["name_family"]);
        if (!preg_match('/^[A-Za-z\s ]+$/', $name))
            $nameErr= 'فقط مجاز به استفاده از حروف و فاصله هستید.';

    }

    if (empty($_POST["email_user"])) {
        $emailErr = "ایمیل الزامی است";
    } else {
        $email = check_input($_POST["email_user"]);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL ))
            $emailErr='Invalid email format';

    }



    $comment = check_input($_POST["comment"]);

}*/


if (register_nazarat($name, $email, $comment)) {
    echo "<div>
<p id='message' hidden>پیام شما با موفقیت ثبت شد و در حال برسی میباشد. </p>
</div>
";

}

?>
<style>
    #message {
        background: #169116;
        color: #fff;
        position: absolute;
        top: 30%;
        right: calc(50% - 200px);
        z-index: 10;
        padding: 26px;
        border-radius: 100px 10px 100px 10px;
        box-shadow: 0 3px 23px 0px #4cf91c;
        text-shadow: 1px 3px 4px red;
        font-size: 15px;
    }
</style>






