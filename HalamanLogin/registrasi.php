<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Regristrasi</title>
</head>
<body>
    <div class="center">
      <h1>Regristrasi</h1>
      <form method="post" action="Tambahuser.php">
        <div class="txt_field">
          <input type="text" required name="username">
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required  name="password">
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="email" required name="email">
          <span></span>
          <label>Email</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          back to login <a href="Form.php">Login</a>
        </div>
      </form>
    </div>   
</body>
</html>