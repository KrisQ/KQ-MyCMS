<?php 
  
if (isset($_GET['edit_user'])) {
    
    $the_user_id = $_GET['edit_user'];
    
     $query = "SELECT * FROM users WHERE user_id=$the_user_id ";
                    $select_users = mysqli_query($connection,$query);
                                
                while ($row = mysqli_fetch_assoc($select_users)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];  
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];  
                    $user_role = $row['user_role'];
                }
    
}


if (isset($_POST['edit_users'])){
    
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
    $query .= "WHERE user_id ='{$the_user_id}' ";
    
    $update_user = mysqli_query($connection,$query);
    confirm($update_user);
    
    echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Well done!</strong> You successfully edited your User <a href="#" class="alert-link"></a>.
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
    <input type="submit" name="edit_users" value="Edit User" class="btn btn-lg btn-primary">
    </div>
    
</form>
