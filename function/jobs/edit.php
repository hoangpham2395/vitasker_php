<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jobs</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-suitcase"></i> Jobs</li>
                    <li><i class="fa fa-ppencil"></i> Edit job</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php 
$job_id = $_GET['id'];

if (isset($_POST['submit'])) {
    if (empty($_POST['job_name'])) {
        $err = "Job can't be blank";
    } else {
        $job_name = $_POST['job_name'];
    }

    if (empty($err)) {
        $sql_edit = "UPDATE job SET job_name = '$job_name' WHERE job_id = '$job_id'";
        mysqli_query($conn, $sql_edit);
        header('location:index.php?page_layout=jobs');
    }
}
?>

<div class="content mt-3">
    <div class="card">
        <div class="card-header">Add new fboder</div>
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

                $sql = "SELECT * FROM job WHERE job_id='".$job_id."'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                ?>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="message">Job:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-suitcase"></i></span>
                            </div>
                            <input type="text" name="job_name" class="form-control" value="<?php echo isset($_POST['job_name']) ? $_POST['job_name'] : $row['job_name']; ?>">
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