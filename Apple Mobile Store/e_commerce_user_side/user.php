 <?php
                                                                include'./themepart/connection.php';
                                                                
                                                               
                                                                    $q= mysqli_query($conn,"select * from product ")or die("Error in select query". mysqli_error($conn));
                                                                  
                                                                    while ($prow= mysqli_fetch_array($q))
                                                                    {
                                                                        
                                                                        
                                                                        echo $prow['product_name']."<br/>";
                                                                        echo $prow['product_detail']."<br/>";
                                                                        echo $prow['brand_id']."<br/>";
                                                                        echo $prow['category_id']."<br/>";
                                                                        echo $prow['product_image']."<br/>";
                                                                    }
                                                                    
                                                                
                                                                ?>