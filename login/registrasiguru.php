<?php 
class registrasiguru {
    
    function registerguru($username, $password){
            $db = new database();
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // check duplicate
            $query = "SELECT * FROM admin WHERE username = '$username'";
            $result = mysqli_query($db->conn, $query);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                echo "Username sudah ada";
                return false;
            }
            else{
                $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hash')";
                mysqli_query($db->conn, $query);
                echo "<script>alert('Register berhasil');</script>";
                return true;
            }

    }
}
?>