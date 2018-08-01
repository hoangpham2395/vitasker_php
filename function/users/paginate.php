<?php 
                        $page = isset($_POST['page']) ? ' LIMIT $page' : 'LIMIT 1';
                        $sql = "SELECT * FROM user ".$page;
                        echo $sql;
                        $query = mysqli_query($conn, $sql);
                        $no = 1;

                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['url_facebook']; ?></td>
                                <td><?php echo $row['user_phone']; ?></td>
                                <td><?php echo $row['user_city']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_kind']; ?></td>
                                <td><?php echo $row['user_job']; ?></td>
                                <td><?php echo $row['user_sex']; ?></td>
                                <td><?php echo $row['user_birth']; ?></td>
                            </tr>
                            <?php
                            $no ++;
                        }
                        ?>