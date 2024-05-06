<?php
session_start(); // Start the session at the very beginning

if (isset($_POST['submit'])) { // Check if the form was submitted
    $username = $_POST['username'];
    $password = $_POST['password']; // In a real application, passwords should be hashed

    // Database connection
    $conn = new mysqli("localhost", "u151986272_tbl", "Tbl@13124", "u151986272_tbl");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check the username and password
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true; // Set the session
        $_SESSION['username'] = $username; // Store the username in session
        header("Location: index.php"); // Redirect to index.php or the dashboard
        exit();
    } else {
        $error = "Invalid username or password"; // Save error to display later
    }

    $stmt->close();
    $conn->close();
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">The Big Lad</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>
                <form id="stripe-login" action="login.php" method="POST"> <!-- Make sure to point this to the correct PHP file -->
                      <div class="field padding-bottom--24">
                        <label for="username">User Name</label>
                        <input type="text" name="username">
                      </div>
                      <div class="field padding-bottom--24">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                      </div>
                      <div class="field padding-bottom--24">
                        <input type="submit" name="submit" value="Continue">
                      </div>
                      <?php if (!empty($error)): ?> <!-- Display an error message if credentials are wrong -->
                        <p style="color: red;"><?php echo $error; ?></p>
                      <?php endif; ?>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>