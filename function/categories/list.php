<script language="javascript">
    function deleteCategory(){
        var conf = confirm('Are you sure?');
        return conf;
    }
</script>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Categories</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-align-center"></i> Categories</li>
                    <li><i class="fa fa-th-list"></i> List of categories</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="card">
        <div class="card-header">List of categories</div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" style=" font-size: 12px;">
                    <thead class="thead-dark text-center">
                        <th width="10%">No.</th>
                        <th width="70%">Category</th>
                        <th width="10%">Edit</th>
                        <th width="10%">Delete</th>
                    </thead>
                    <tbody>
                        <?php  
                        $sql = "SELECT * FROM category";
                        $query = mysqli_query($conn, $sql);
                        $no = 1;

                        while ($row = mysqli_fetch_array($query)) {
                            if (empty($row)) {
                                ?>
                                <tr>
                                    <td colspan="4"><i class="fa fa-exclamation-triangle"></i> Not data</td>
                                </tr>
                                <?php
                            } else { 
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td class="text-center"><a href="index.php?page_layout=edit_category&id=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
                                    <td class="text-center"><a onclick="return deleteCategory();" href="function/categories/delete.php?id=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
                            }
                            $no ++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
