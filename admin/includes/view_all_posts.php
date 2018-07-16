 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                   
                                    <th>Post Id</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Post Content</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                               <?php
                                
                                $query="SELECT * FROM posts";
                                $select_posts_row=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_posts_row))
                                {
                                    $post_id=$row['post_id'];
                                    $post_author=$row['post_author'];
                                    $post_title=$row['post_title'];
                                    $post_category_id=$row['post_category_id'];
                                    $post_image=$row['post_image'];
                                    $post_tags=$row['post_tags'];
                                    $post_content=$row['post_content'];
                                    $post_date=$row['post_date'];
                                    $post_status=$row['post_status'];
                                    echo "<tr>";
                                    echo "<td>{$post_id}</td>";
                                     $query="SELECT * FROM categories WHERE cat_id={$post_category_id}";
                                    $select_categories_id=mysqli_query($connection,$query);
                 
                              while($row=mysqli_fetch_assoc($select_categories_id))
                             {
                                $cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];  
                            
                                   
                                    
                                    echo "<td> {$cat_title}</td>";
                                    
                                    
                                    
                              }
                                    
                                    echo "<td> {$post_title}</td>";
                                    echo "<td>{$post_author}</td>";
                                    echo "<td>{$post_date}</td>";
                                    echo "<td><img width='100px' src='../images/$post_image' alt='image'/></td>";
                                    echo "<td>{$post_content}</td>";
                                    echo "<td>{$post_status}</td>";
                                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'><button>Edit</button></a></td>";
                                    echo "<td><a href='posts.php?delete={$post_id}'><button>Delete</button></a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                
                                
                                
                            </tbody>
                        </table>
                        <?php

                        if(isset($_GET['delete']))
                        {
                            
                            $the_post_id=$_GET['delete'];
                            $query="DELETE FROM posts WHERE post_id={$the_post_id}";
                            $delete_post_query=mysqli_query($connection,$query);
                            header("Location:posts.php");
                            
                        }



                        ?>