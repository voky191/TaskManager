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
        .task-body{
            text-align: center;
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
            <li class="active"><a href="/news/">Home</a></li>
            <li><a href="#">Login In</a></li>
            <li><a href="#">Create new task</a></li>
        </ul>
    </div>
</nav>

<div class="page-header">
    Task #<?php echo $newsItem[id]; ?>
</div>
<div class="task-body">
<p>
    <b>
        Name:
    </b>
    <?php echo $newsItem[name]; ?>
</p>
<p>
    <b>
        Mail:
    </b>
    <?php echo $newsItem[mail]; ?>
</p>
<p>
    <b>
        Task text:
    </b>
    <?php echo $newsItem[text]; ?>
</p>
<p>
    <b>
        Task Status:
    </b>
    <?php echo $newsItem[status]; ?>
</p>
    <a href="/news/edit"><button type="button" class="btn btn-warning">Edit task</button></a>
    <a href="/news/"><button type="button" class="btn btn-default">Return</button></a>

</div>
</body>
</html>