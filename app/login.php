<?php
 session_start();

if (isset($_POST['user_name']) && isset($_POST['password'])) {
    // Include database connection file
    include "../DB_connection.php";

    // Checks if form data has been submitted via POST.
     function validate_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

    // A helper function to sanitize user inputs against XSS and injection attacks.
    $user_name = validate_input($_POST['user_name']);
    $password = validate_input($_POST['password']);

    if (empty($user_name)) {
        $em = "User name is required";
        header("Location: ../login.php?error=$em");
        exit();
    }  else  if (empty($password)) {
        $em = "Password is required";
        header("Location: ../login.php?error=$em");
        exit();
    }  else {
        

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_name]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $usernameDb = $user['username'];
            $passwordDb = $user['password'];
            $role = $user['role'];
            $id = $user['id'];

            if ($user_name === $usernameDb) {
                if (password_verify($password, $passwordDb)) {
                    if ($role == "admin") {
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $usernameDb;
                        header("Location: ../index.php");

                    } else if ($role == "employee") {
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $usernameDb;
                        header("Location: ../index.php");
                    }
                    
                } else {
                    $em = "Incorrect user name or password";
                    header("Location: ../login.php?error=$em");
                    exit();
            }
                
            } else {
                    $em = "Incorrect user name or password";
                    header("Location: ../login.php?error=$em");
                    exit();
            }
        }
    }

} else {
    // Redirect to login page if the form is not submitted
    $em = "Unknown error occurred";
    header("Location: ../login.php?error=$em");
    exit();
}

?>