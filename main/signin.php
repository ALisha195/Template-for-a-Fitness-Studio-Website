<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
    <title>CR7 Fitness Center - Sign Up</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="signup-container">
        <div class="signup-box">
            <h1>Sign Up</h1>
            <form id="signup-form" method="POST">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" name="submit">Sign Up</button>
            </form>
            <p class="login-link">Already have an account? <a href="../login/login.php">Log in</a></p>
        </div>
    </div>
    <?php
        
		include '../db/db.php';
        
        if(isset($_POST['submit'])){
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $pass = password_hash($password,PASSWORD_BCRYPT);

            $insert = "INSERT INTO `users`(`USER NAME`, `EMAIL`, `PASSWORD`) VALUES ('$name','$email','$pass')";
            $query = mysqli_query($con,$insert);
			
			if($query){
				$_SESSION['NAME']=$name;
				?>
					<script>
						location.replace("../index.php");
					</script>
				<?php
			}
        }
    ?>
</body>
</html>

