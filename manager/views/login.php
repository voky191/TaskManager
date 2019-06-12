<html>
<head>
    <title>Task Manager</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            background: darkgray;
        }
        form {
            width: 60%;
            margin: 60px auto;
            background: #efefef;
            padding: 60px 120px 80px 120px;
            text-align: center;
            -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            position: relative;
            margin: 40px 0px;
        }
        .label-txt {
            position: absolute;
            top: -1.6em;
            padding: 10px;
            font-family: sans-serif;
            font-size: .8em;
            letter-spacing: 1px;
            color: rgb(120,120,120);
            transition: ease .3s;
        }
        .input {
            width: 100%;
            padding: 10px;
            background: transparent;
            border: none;
            outline: none;
        }

        .line-box {
            position: relative;
            width: 100%;
            height: 2px;
            background: #BCBCBC;
        }

        .line {
            position: absolute;
            width: 0%;
            height: 2px;
            top: 0px;
            left: 50%;
            transform: translateX(-50%);
            background: #8BC34A;
            transition: ease .6s;
        }

        .input:focus + .line-box .line {
            width: 100%;
        }

        .label-active {
            top: -3em;
        }

        input.button {
            display: inline-block;
            padding: 12px 24px;
            background: rgb(220,220,220);
            font-weight: bold;
            color: rgb(120,120,120);
            border: none;
            outline: none;
            border-radius: 3px;
            cursor: pointer;
            transition: ease .3s;
        }

        input.button:hover {
            background: black;
            color: #ffffff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Task Manager</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/news/">Home</a></li>
            <li><a href="/news/new/">Create new task</a></li>
            <?php if(user::isGuest()): ?>
                <li class="active"><a href="/login">Login In</a></li>
                <li><a href="/register">Register</a></li>
            <?php else: ?>
                <li><a href="#"><?php echo "Hello, ".$_SESSION['user_name']; ?></a></li>
                <li><a href="/logout">Log out</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

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
</body>
</html>