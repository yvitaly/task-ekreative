<?php

session_start();

include ('db_connect.php');

if (empty($_SESSION['is_logged_in']) || empty($_SESSION['admin'])) {
    echo 'Permisssion denied';
    exit();
}

if(!empty($_POST)){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $dbh = connect();

    $sql = "INSERT INTO posts (title, content, date ) VALUES (?,?,?)";
    $dbh->prepare($sql)->execute([$title, $content, date("Y/m/d/H/i/s")]);

    header('Location: posts.php');
}

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

<div class="conteiner w-50 d-flex justify-content-center mt-4" >

    <form action="add_post.php" method="post" >
        <input type="text" class="form-control" name="title" id="title" placeholder="Input Title"></br>
        <textarea class="form-control" placeholder="Your Content" name="content"></textarea></br>
        <button class="btn btn-success" type="submit"> Submit </button>
    </form>
</div>

</body>
</html>


