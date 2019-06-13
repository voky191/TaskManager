<?php include ROOT.'/layouts/header.php'; ?>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Mail</th>
        <th scope="col">Text</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>
        <th scope="col">Details</th>


    </tr>
    </thead>
    <tbody>
    <?php foreach ($newsList as $newsItem): ?>
    <tr>

        <th scope="row"><?php echo "$newsItem[id]" ?></th>
        <td><?php echo "$newsItem[name]" ?></td>
        <td><?php echo "$newsItem[mail]" ?></td>
        <td><?php echo "$newsItem[text]" ?></td>
        <td><?php
            if($newsItem[image]!="") {
                echo "<img src='/images/" . $newsItem[image] . "' height='100' width='200'>";
            }
            ?></td>
        <td><?php echo "$newsItem[status]" ?></td>
        <td><?php echo "<a href='/news/$newsItem[id]'>";
        ?><button type="button" class="btn btn-default">Watch</button></a></td>


    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include ROOT.'/layouts/footer.php'; ?>