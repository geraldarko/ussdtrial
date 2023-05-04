<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Forgot Password - Akuafo</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../images/img/cover.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
            <p class="login-card-description">Kindly input the 6-digit OTP code sent to your email.</p>
                <form>
                    <?php 
                    if(isset($_SESSION['errors'])){
                        $errors = $_SESSION['errors'];
                        foreach($errors as $error) {
                        ?>
                            <small style="color: red"><?=$error."<br>";?></small> 
                        <?php 
                        }
                    }
                    $_SESSION['errors'] = null; 
                    ?>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="digit1" name="digit1" maxlength="1" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="digit2" name="digit2" maxlength="1" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="digit3" name="digit3" maxlength="1" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="digit4" name="digit4" maxlength="1" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="digit5" name="digit5" maxlength="1" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="digit6" name="digit6" maxlength="1" required>
                        </div>
                    </div>
                    <button name="submit" id="button" class="btn btn-block login-btn mb-4"> <a href="" class="text-reset"></a>Submit </button>
                </form>
                <p class="mt-2 text-center"><a href="changepassword.php" class="text-reset">Back to password reset</a><br>
                <a href="" class="text-reset">Send code again</a></p>
                <nav class="login-card-footer-nav">
                </nav>

                
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>