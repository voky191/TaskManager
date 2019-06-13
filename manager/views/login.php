<?php include ROOT.'/layouts/header.php'; ?>
<?php
if(isset($errors) && is_array($errors))
{
    foreach($errors as $error)
    {
        echo $error."! ";
    }
}
?>

    <form action="#" method="post">
        <label>
            <p class="label-txt">ENTER YOUR NAME</p>
            <input type="text" name="name" class="input">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">ENTER YOUR PASSWORD</p>
            <input type="text" name="password" class="input">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <input class="button" type="submit" name="submit" value="Submit"/>
    </form>
<?php include ROOT.'/layouts/footer.php'; ?>