<?php 
include '../database.php';

class authentication{    
    
    function register($username, $password, $confirmpassword){
        $register = new database();
        
            if ($password = $confirmpassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                // check duplicate
                $query = "SELECT * FROM admin WHERE username = '$username'";
                $result = mysqli_query($register->conn, $query);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    echo "Username sudah ada";
                    return false;
                }
                else{
                    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hash')";
                    mysqli_query($register->conn, $query);
                    echo "<script>alert('Register berhasil');</script>";
                    return true;
                }
            } else {
                echo 'Password tidak sama';
            }

    }

    public function auth($username, $password){
        $db = new database();
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($db->conn, $query);
        $data = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        

        if ($count > 0) {
            if (password_verify($password, $data['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id_admin'] = $data['id_admin'];
                header("location:../admin.php?p=home");
            } else {
                echo "<script>alert('Password salah');</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan');</script>";
        }
    }

    // verify session
    public function verify(){
        session_start();
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }  

}  
?>