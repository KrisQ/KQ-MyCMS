<?php

function confirm($result) {
    global $connection;
     if (!$result) {
        
        die("QUERY FAILED .". mysqli_error($connection));
        
    }
    
    
    
}

function insert_categories() {
    
    global $connection;
    
       if (isset($_POST['submit'])) {
                                
                                $cat_title = $_POST['cat_title'];
                                
                                if ($cat_title == "" || empty($cat_title) ) {
                                    
                                    echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Oh snap!</strong> <a href="" class="alert-link"></a>This field should not be empty.
</div>';
                                    
                                } else {
                                    
                                    $query = "INSERT INTO categories(cat_title) ";
                                    $query .= "VALUE('{$cat_title}') ";
                                    $create_category_query = mysqli_query($connection,$query);
                                    
                                    
                                    if (!$create_category_query) {
                                        
                                        die('QUERY FAILED'.mysqli_error($connection));
                                        
                                    }
                                    
                                    echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Well done!</strong> You successfully created a new Category <a href="#" class="alert-link"></a>.
</div>';
                                    
                                }
                                
                            }
    
}

function find_all_categories(){
    global $connection;
    
                                     
 $query = "SELECT * FROM categories";
                    $select_Categories = mysqli_query($connection,$query);
                                
                                   while ($row = mysqli_fetch_assoc($select_Categories)) {
                    $cat_id = $row['cat_id'];  
                    $cat_title = $row['cat_title'];
                    echo "<tr>";   
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                    echo "</tr>";
                        
                    }
                                
    
    
}

function delete_categories() {
    global $connection;
                                     
                                 if(isset($_GET['delete'])) {
                                     
                                     $the_cat_id = $_GET['delete'];
                                     
                                     $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                     $delete_query = mysqli_query($connection,$query);
                                     header("location: categories.php");
                                     
                                     
                                     
                                 }
    
    
    
    
}






?>