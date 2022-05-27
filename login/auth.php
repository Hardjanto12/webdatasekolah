<?php 

class login{    
    public function auth(){
        if(isset($_POST['login'])){
        $db = new database();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $selectuser = "select * from admin where username = '$username' AND password = '$password'";   
        $test = $db->auth($selectuser);
            if ($test > 0) {
                header("location:../admin.php?p=home");
                }
            else if ($test <= 0 ) {
            $fail = '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
            <i class="bi bi-exclamation-triangle-fill"></i>  Password/Username salah, silahkan coba lagi!
            </div>
            </div>';
            echo $fail;
                } 
            }
        }
}  
?>