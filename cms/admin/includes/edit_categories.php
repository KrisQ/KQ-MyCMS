 <form action="" method="post">
                            <div class="form-group">
                               <label for="cat_title">Edit Category</label>
                               
                               <?php 
                                
                                if(isset($_GET['edit'])) {
                                    
                                 $cat_id = $_GET['edit'];
                                
                                 $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                                 $select_Categories_id = mysqli_query($connection,$query);
                                
                                 while ($row = mysqli_fetch_assoc($select_Categories_id)) {
                                 $cat_id = $row['cat_id'];  
                                 $cat_title = $row['cat_title'];
                                 
                                 ?>
                                 <input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" type="text" name="cat_title" class="form-control">
                                 <?php
                                 }
                                }
                                ?>
                                
                                <?php 
                                //UPDATE QUERY
                                    
                                     if(isset($_POST['update_cat'])) {
                                     
                                     $the_cat_title = $_POST['cat_title'];
                                     
                                     $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                                     $update_query = mysqli_query($connection,$query);
                                         
                                         if (!$update_query) {
                                             die('QUERY FAILED'.mysqli_error($connection));
                                         } else { 
                                             echo '<br><div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Well done!</strong> You successfully updated a Category <a href="#" class="alert-link"></a>.
</div>';
                                         }
                                         
                                 }
                                
                                
                                ?>
                                
                                
                            </div>
                            
                             <div class="form-group">
                                <input type="submit" name="update_cat" value="Update" class="btn btn-primary">
                            </div>
                            
                        </form>