<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Users</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-users"></i> Users</li>
                    <li><i class="fa fa-th-list"></i> List of users</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="card">
        <div class="card-header">List of users</div>
        <div class="card-body">
            <form method="get">
                <input type="hidden" name="page_layout" value="users">
                <div class="row">
                    <div class="input-group input-group-sm col-md-3">
                        <select id="page_users" name="perPage" class="form-control" >
                            <option selected="select" value="10">Rows per page</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" style=" font-size: 12px; margin-top: 15px;">
                    <thead class="thead-dark text-center">
                        <th>No.</th>
                        <th>User name</th>
                        <th>Facebook</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Kind</th>
                        <th>Job</th>
                        <th>Sex</th>
                        <th>Birthday</th>
                    </thead>
                    <tbody id="tbody_users">
                        <?php 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Number user of page
                        $perPage = (isset($_GET['perPage'])) ? $_GET['perPage'] : 10;    

                        // First row
                        $firstRow = ($page - 1) * $perPage;

                        $sql = "SELECT * FROM user LIMIT $firstRow, $perPage";
                        // echo $sql;
                        $query = mysqli_query($conn, $sql);
                        $no = 1;

                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no; ?></td>
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
                    </tbody>
                </table>
                <?php 
                $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"));
                $totalPage = ceil($totalRow/$perPage);

                $listPage = '';

                if ($totalPage > 1) {
                    for($i=1; $i <= $totalPage; $i++){
                        if($i == $page){
                            $listPage .= '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
                        }
                        else{
                            $listPage .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page_layout=usersp&page='.$i.'">'.$i.'</a></li>';
                        }
                    }
                }
                ?>

                <!-- Pagination -->
                
                <div class="col-md-12 text-center">
                    <ul class="pagination">
                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href='index.php?page_layout=users&page=<?php echo $page - 1; ?>' aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php echo $listPage; ?>
                        <li class="page-item <?php echo ($page == $totalPage) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="index.php?page_layout=users&page=<?php echo $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 