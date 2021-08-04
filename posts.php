<?php
session_start();


if (empty($_SESSION['is_logged_in'])) {
    echo 'Permisssion denied';
    exit();
}


$userPDO = 'root';
$passwordPDO = '';
$dbh = new PDO('mysql:host=localhost;dbname=ekreative-db', $userPDO, $passwordPDO);

$result = $dbh->query(" SELECT * FROM `posts` ");



if (!empty($_GET['order'])) {
    $result = $dbh->query(" SELECT * FROM `posts` ORDER BY `date` " . $_GET['order']);
}
$posts = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</head>
<body>
<div class="d-flex justify-content-around">
    <div>
        <a class="btn btn-primary" href="logout.php" role="button">Log Out</a>
        <a class="btn btn-primary" href="add_post.php" role="button">Add Post</a>
        <a class="btn btn-primary" href="edit_posts.php" role="button">Edit Post</a>
    </div>
    <div>
        <a class="btn btn-primary" role="button" href="posts.php?order=ASC"> &#9660; </a>
        <a class="btn btn-primary" role="button" href="posts.php?order=DESC"> &#9650;</a>
    </div>
</div>
<div class="conteiner mt-4">
    <?php  foreach ($posts as $post) : ?>
    <h1 style="text-align: center"> <?php  echo $post['title']; ?></h1>
    <p> <?php  echo $post['content']; ?></p>
    <p><time><?php  echo $post['date']; ?></time> </p>
        <hr>
    <?php endforeach;  ?>


</div>

</body>
</html>
