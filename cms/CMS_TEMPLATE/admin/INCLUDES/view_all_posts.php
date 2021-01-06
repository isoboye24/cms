 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Title</td>
                                    <td>Author</td>
                                    <td>Category</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Comments</td>
                                    <td>Tags</td>                                    
                                    <td>Date</td>
                                </tr>
                            </thead>
                            <tbody>
<?php
                                
    global $connection;
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);
                                
    if(!$select_posts)
    {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_posts))
    {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_category_id}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img width = '40' src='images/{$post_image}' </td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_date}</td>";
                
        echo "</tr>";
    }         
                                
 ?>                                  
                                   
                                    <td>10</td>
                                    <td>Bootstrap Framework</td>
                                    <td>Isoboye Vincent</td>
                                    <td>Bootstrap</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>comments</td>
                                    <td>Tags</td>
                                    <td>Date</td>
                                
                            </tbody>
                        </table>
                        
                        