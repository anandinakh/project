<?php 
include 'bakedhouse/koneksi.php';
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statement
    $stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Verifikasi kata sandi menggunakan password_verify
        if (password_verify($password, $data['password'])) {
            $_SESSION['id_user'] = $data['id_user'];

            if ($data["isAdmin"] == 1) {
              echo "<script>
                      alert('You have logged in as admin!')
                      window.location = 'bakedhouse/admin/admin-donat.php';
                  </script>";
            } else {
                echo "<script> 
                        alert('You have logged in as user!');
                        window.location = 'bakedhouse/index.php';
                    </script>";
            }
        } 
          else {
            echo "<script>
                    alert('Invalid password!')
                    window.location = 'index.php';
                </script>";
        }
        } else {
            echo "<script>
                    alert('Username not found!')
                    window.location = 'index.php';
                </script>";
        }

    // Menutup statement
    $stmt->close();
}

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Menggunakan password_hash
    $email=$_POST['email'];

    // Gunakan prepared statement untuk insert
    $stmt = $koneksi->prepare("INSERT INTO user (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();

    header("location:index.php");
    // Menutup statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="apple-touch-icon" href="../assets/img/ss.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/ss.ico" />

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  <div class="form">
    <form class="register-form" method="post">
      <input type="text" name="username" placeholder="name"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="email" name="email" placeholder="email address"/>
      <button type="submit" name="daftar">create</button>
      <p class="message">Already registered? <a href="index.php">Sign In</a></p>
    </form>
    <form class="login-form" method="post">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
