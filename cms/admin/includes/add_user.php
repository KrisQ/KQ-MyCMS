<?php 
  
if (isset($_POST['create_users'])){
    
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
    
    $query = "INSERT INTO users(user_firstname, user_lastname,user_role,username,user_email,user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' ) ";
    
    $create_user_query = mysqli_query($connection,$query);
    
   confirm($create_user_query);
    
    echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Well done!</strong> You successfully created a new User <a href="#" class="alert-link"></a>.
</div>';
                  
    
    
}

?>

  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
    <select name="user_role" id="">
    <option value="subscriber"> - Select Option</option>
    <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
    </select>
    </div>
    
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
    <label for="user_email">eMail</label>
    <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
    </div>

    
    <div class="form-group">
    <input type="submit" name="create_users" value="Add User" class="btn btn-lg btn-primary">
    </div>
    
</form>
