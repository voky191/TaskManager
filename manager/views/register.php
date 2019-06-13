<?php include ROOT.'/layouts/header.php'; ?>
<?php
if($result == true):
?>
<p align="center">Registration completed</p>
<?php
else:
?>
<?php

if(isset($errors) && is_array($errors))
{
    echo '<ul>';
    foreach($errors as $error)
    {
        echo "<li>$error";
    }
    echo '<ul>';
}

?>
<form action="#" method="post">
    <label>
        <p class="label-txt">ENTER YOUR NAME</p>
        <input type="text" name="name" class="input" value="<?php echo $name; ?>">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">ENTER YOUR PASSWORD</p>
        <input type="text" name="password" class="input" value="<?php echo $pass; ?>">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <input class="button" type="submit" name="submit" value="Submit"/>
</form>
<?php endif; ?>
<?php include ROOT.'/layouts/footer.php'; ?>
