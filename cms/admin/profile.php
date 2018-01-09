<?php include "includes/admin_header.php";  ?>
<?php include "functions.php"; ?>
<?php ob_start(); ?>
    
    <?php 
    
    if (isset($_SESSION['username'])) {
        
        $username1 = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '$username1' ";
        
        $select_user_profile_query = mysqli_query($connection,$query);
        
        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            
                    $user_id = $row['user_id'];
                    $username = $row['username'];  
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
            
            
        }
          
    }

    ?>
    
    <?php 
    
    if (isset($_POST['update_profile'])) {
        
            global $connection;
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

//    $post_date = date('Y-m-d');
    
//    move_uploaded_file($post_image_temp,"../images/$post_image");
    
  $query = "UPDATE users SET ";
    $query .= "username ='{$username}', ";
    $query .= "user_password ='{$user_password}', ";
    $query .= "user_firstname ='{$user_firstname}', ";
    $query .= "user_lastname ='{$user_lastname}', ";
    $query .= "user_email ='{$user_email}', ";
    $query .= "user_role ='{$user_role}' ";
    $query .= "WHERE username ='{$username1}' ";
    
    $update_user = mysqli_query($connection,$query);
    confirm($update_user);
        
    }
    

    ?>
   

    <div id="wrapper">

        <!-- Navigation -->
     <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>           
                    <hr>
                    
                    <?php
                        if (isset($_POST['update_profile'])) {
                            
                             echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Well done!</strong> You successfully updated your Profile <a href="#" class="alert-link"></a>.
</div>';
                            
                        }
?>
                    
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
    </div>
    
    <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
    </div>
    
    <div class="form-group">
    <select name="user_role" id="">
    <option value="subscriber"><?php echo $user_role; ?></option>
     <?php 
        if ($user_role == 'admin') {
    
    echo '<option value="subscriber">Subscriber</option>';
    
        } else {
    echo '<option value="admin">Admin</option>';
    
        }
    ?>
    </select>
    </div>
    
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
    </div>
    
    <div class="form-group">
    <label for="user_email">eMail</label>
    <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
    </div>
    
    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
    </div>

    
    <div class="form-group">
    <input type="submit" name="update_profile" value="Update Profile" class="btn btn-lg btn-primary">
    </div>
    
</form>
 
                    
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php"; ?>