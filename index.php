<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="conreiner d-flex justify-content-center mt-4">
  <div>
    <button class="btn btn-primary" data-toggle="collapse" data-target="#demo">Regisration</button>

    <div id="demo" class="collapse  ">
      <div class="mb-3">
        <form action="register.php" method="post" >
          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Input First Name"></br>
          <input  class="form-control" name="email" id="email" placeholder="Input your email"></br>
          <input type="password" class="form-control" name="password" id="password" placeholder="Input password"></br>
          <input type="checkbox"  name="role" id="role" >
          <label for="role">Is admin?</label></br>
          <button class="btn btn-success" type="submit"> Submit </button>
        </form>
      </div>
    </div>
  </div>
  <div>
    <button class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Login</button>
      <?php if (!empty($_SESSION['errors'])): ?>
          <?php foreach($_SESSION['errors'] as $error): ?>
              <p><?php echo $error; ?></p>
          <?php endforeach;  ?>
      <?php endif; ?>
      <?php unset($_SESSION['errors']); ?>
    <div id="demo2" class="collapse">
      <div class="mb-3">
        <form action="auth.php" method="post" >
          <input type="email" class="form-control" name="email" id="email" placeholder="Input your email"></br>
          <input type="password" class="form-control" name="password" id="password" placeholder="Input password"></br>
          <button class="btn btn-success" type="submit"> Log In </button>
        </form>
      </div>
    </div>
  </div>

</div>



  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>



</body>
</html>