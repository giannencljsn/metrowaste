<?php 
// Database connection parameters
$host = "localhost";
$username = "root"; 
$password = "";
$database = "hrsystemci";

// Create a database connection
$connect = mysqli_connect($host, $username, $password, $database);






// Check the connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recover</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>

<?php 
if(isset($_POST["recover"])){
    // Database connection parameters
    $host = "localhost";
    $username = "root"; 
    $password = "";
    $database = "hrsystemci";

    // Create a database connection
    $connect = mysqli_connect($host, $username, $password, $database);

    // Check the connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST["email"];

    $sql = mysqli_query($connect, "SELECT * FROM employee WHERE em_email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){
        ?>
        <script>
            alert("<?php echo "Sorry, no emails exist "?>");
        </script>
        <?php
    } else {
        // generate token by binaryhexa 
        $token = bin2hex(random_bytes(50));

        // session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        // h-hotel account
        $mail->Username='imdummydumb70@gmail.com';
        $mail->Password='eiod eddu xuvm ldwe';

        // send by h-hotel email
        $mail->setFrom('imdummydumb70@gmail.com', 'Password Reset');
        // get email from input
        $mail->addAddress($_POST["email"]);
        //$mail->addReplyTo('lamkaizhe16@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Recover your password";
        // url
        $resetPasswordUrl = site_url('forgotPassword/resetPassword');
        
        $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            <a href='$resetPasswordUrl'>$resetPasswordUrl</a>
            <br><br>
            <p>With regards,</p>
            <b>Metrowaste</b>";
            
        if(!$mail->send()){
            ?>
            <script>
                alert("<?php echo "Invalid Email "?>");
            </script>
            <?php
        } else {
            ?>
            <script>
                    window.location.href = '<?php echo site_url('ForgotPassword/notification'); ?>';
            </script>
            <?php
        }
    }

    // Close the database connection
    mysqli_close($connect);
}
?>


