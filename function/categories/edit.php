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
                    <li class="active"><i class="fa fa-suitcase"></i> Categories</li>
                    <li><i class="fa fa-ppencil"></i> Edit category</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php 
$category_id = $_GET['id'];

if (isset($_POST['submit'])) {
    if (empty($_POST['category_name'])) {
        $err = "Category can't be blank";
    } else {
        $category_name = $_POST['category_name'];
    }

    if (empty($err)) {
        $sql_edit = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'";
        mysqli_query($conn, $sql_edit);
        header('location:index.php?page_layout=categories');
    }
}
?>

<div class="content mt-3">
    <div class="card">
        <div class="card-header">Edit category</div>
        <div class="card-body">
            <form method="post" action="">
                <?php 
                if (!empty($err)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul style="margin-left: 15px;">
                                    <li><?php echo $err;?></li>
                                </ul>
                            </div>  
                        </div>
                    </div>  
                    <?php
                }

                $sql = "SELECT * FROM category WHERE category_id='".$category_id."'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                ?>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="message">Category:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-align-center"></i></span>
                            </div>
                            <input type="text" name="category_name" class="form-control" value="<?php echo isset($_POST['category_name']) ? $_POST['category_name'] : $row['category_name']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        <a href="index.php?page_layout=jobs" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>