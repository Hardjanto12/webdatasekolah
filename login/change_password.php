<!-- page to change password -->
<?php 
    include 'database.php';
    $db = new database();
    $id = $_SESSION['id_admin'];
    $username = $_SESSION['username'];
    $query = "SELECT * FROM admin WHERE id_admin = '$id'";
    $result = mysqli_query($db->conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
       $gantipassword = new authentication();
       $gantipassword->change_password($id ,$_POST['password'], $_POST['confirmpassword']);
    }
?>

<!-- bootstrap form ganti password -->
<div class="container p-3">
    <form action="login/proses.php?aksi=ganti-password" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?php echo $row['username']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>