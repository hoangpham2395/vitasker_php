<script language="javascript">
    function deleteFboder(){
        var conf = confirm('Are you sure?');
        return conf;
    }
</script>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Fboders</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-comment"></i> Fboders</li>
                    <li><i class="fa fa-th-list"></i> List of fboders</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="card">
        <div class="card-header">Filter by category</div>
        <div class="card-body">
            <form method="get">
                <input type="hidden" name="page_layout" value="fboders">
                <div class="row">
                    <div class="input-group input-group-sm col-md-6">
                        <select class="form-control" name="category_id">
                            <option>--- Select category ---</option>
                            <?php 
                            $select = isset($_GET['category_id']) ? $_GET['category_id'] : 0; 
                            $sql_cate = "SELECT * FROM category";
                            $query_cate = mysqli_query($conn, $sql_cate);
                            while ($rows_cate = mysqli_fetch_array($query_cate)) {
                                ?>
                                <option value="<?php echo $rows_cate['category_id'];?>"  <?php echo ($rows_cate['category_id'] == $select) ? 'selected' : ''; ?> ><?php echo $rows_cate['category_name'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <!-- <div class="input-group-prepend">
                            
                        </div> -->
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-sm btn-danger">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">List of Fboders</div>
        <div class="card-body ">
            <a href="index.php?page_layout=fboders" class="btn btn-success" style="margin-bottom: 15px;">Reload</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" style=" font-size: 12px;">
                    <thead class="thead-dark">
                        <th>No.</th>
                        <th>Message</th>
                        <th>Category</th>
                        <th>Job</th>
                        <th>Post By</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php 
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Number user of page
                        $perPage = (isset($_GET['perPage'])) ? $_GET['perPage'] : 10;    

                        // First row
                        $firstRow = ($page - 1) * $perPage;

                        $filter = isset($_GET['category_id']) ? " WHERE category_id = '".$_GET['category_id']."'" : "";
                        $sql = "SELECT * FROM fboders" . $filter . " LIMIT $firstRow, $perPage";
                        $query = mysqli_query($conn, $sql);
                        $no = 1;

                        while ($row = mysqli_fetch_array($query)) {
                            if (empty($row)) {
                                ?>
                                <tr>
                                    <td colspan="13"><i class="fa fa-exclamation-triangle"></i> Not data</td>
                                </tr>
                                <?php
                            } else { 
                                $category_name = mysqli_fetch_array(mysqli_query($conn, "SELECT category_name FROM category WHERE category_id = '".$row['category_id']."'"));
                                $job = mysqli_fetch_array(mysqli_query($conn, "SELECT job_name FROM job WHERE job_id = '".$row['job_id']."'"));
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo $category_name['category_name']; ?></td>
                                    <td><?php echo $job['job_name']; ?></td>
                                    <td><?php echo $row['postBy']; ?></td>
                                    <td><?php echo $row['phoneNumber']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><a href='index.php?page_layout=edit_fboder&id=<?php echo $row["oder_id"];?>' class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
                                    <td>
                                        <a onclick="return confirm('Are you sure?');" href="/delete.php?id=<?php echo $row['oder_id'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $no ++;
                            }
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
