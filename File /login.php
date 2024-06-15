<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR7 Fitness Center - Login</title>
    <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <form id="login-form" action="login.php" method="POST">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="email" placeholder="EMAIL" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
            <p class="signup-link">Don't have an account? <a href="../signin/signin.php">Sign up</a></p>
        </div>
    </div>
    <?php
        include "../db/db.php";


        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];			

            $squery = "SELECT * FROM `users` WHERE `EMAIL`='$email'";
            $query = mysqli_query($con,$squery);

            $email_count = mysqli_num_rows($query);
			if($email_count==1){
				$data = mysqli_fetch_assoc($query);
				$pass = password_verify($password,$data['PASSWORD']);
				
				if($pass){
					$_SESSION['NAME'] = $data['USER NAME'];
					?>
						<script>
							location.replace("../index.php");
						</script>
					<?php
				}else{
					?>
						<script>
							alert("wrong password");
						</script>
					<?php
				}
			}
        }    
    ?>
</body>
</html>


