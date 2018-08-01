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
                    <li><i class="fa fa-pencil"></i> Edit fboder</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php  
$fb_id = $_GET['id'];

if (isset($_POST['new_fboder'])) {
    $errors = [];

    if (empty($_POST['message'])) {
        $errors['message'] = "Message can't be blank";
    } else {
        $message = $_POST['message'];
    } 
    if (empty($_POST['category_id'])) {
        $errors['category_id'] = "Category can't be blank";
    } else {
        $category_id = $_POST['category_id'];
    }

    if (empty($_POST['job_id'])) {
        $errors['job_id'] = "Job can't be blank";
    } else {
        $job_id = $_POST['job_id'];
    }

    if (empty($_POST['postLink'])) {
        $errors['postLink'] = "Post Link can't be blank";
    } else {
        $postLink = $_POST['postLink'];
    }

    if (empty($_POST['postBy'])) {
        $errors['postBy'] = "Post By can't be blank";
    } else {
        $postBy = $_POST['postBy'];
    }

    if (empty($_POST['postWall'])) {
        $errors['postWall'] = "Post Wall can't be blank";
    } else {
        $postWall = $_POST['postWall'];
    }

    if (empty($_POST['postDate'])) {
        $errors['postDate'] = "Post Date can't be blank";
    } else {
        $postDate = $_POST['postDate'];
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Email can't be blank";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['phoneNumber'])) {
        $errors['phoneNumber'] = "Phone number can't be blank";
    } else {
        $phoneNumber = $_POST['phoneNumber'];
    }

    if (empty($_POST['address'])) {
        $errors['address'] = "Address can't be blank";
    } else {
        $address = $_POST['address'];
    }

    if (empty($errors)) {
        $sql_edit = "UPDATE fboders SET message = '$message', category_id = '$category_id', job_id = '$job_id', postLink = '$postLink', postBy = '$postBy', postWall = '$postWall', postDate = '$postDate', email = '$email', phoneNumber = '$phoneNumber', address = 'address' WHERE fb_id = '$fb_id'";
        // echo $sql;
        $query_edit = mysqli_query($conn, $sql_edit);
        $_SESSION['fboder']['edit'] = "Edit success!";
        header('location:index.php?page_layout=fboders');
    }
}
    
?>

<div class="content mt-3">
    <div class="card">
        <div class="card-header">Edit fboder</div>
        <div class="card-body">
            <form method="post" action="">
                <?php 
                if (!empty($errors)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul style="margin-left: 15px;">
                                    <?php  
                                    foreach ($errors as $err) {
                                        echo '<li>'.$err.'</li>';
                                    } 
                                    ?>
                                </ul>
                            </div>  
                        </div>
                    </div>  
                    <?php
                }

                $sql = "SELECT * FROM fboders WHERE fb_id = '".$fb_id."'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                ?>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="message">Message:</label>
                        <textarea name="message" rows="5" placeholder="Message" class="form-control"><?php echo isset($_POST['message']) ? $_POST['message'] : $row['message'];  ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Category:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bars"></i></span>
                            </div>
                            <select class="form-control" name="category_id">
                                <?php 
                                $select_cate = isset($_POST['category_id']) ? $_POST['category_id'] : $row['category_id']; 
                                $sql_cate = "SELECT * FROM category";
                                $query_cate = mysqli_query($conn, $sql_cate);
                                while ($rows_cate = mysqli_fetch_array($query_cate)) {
                                    ?>
                                    <option value="<?php echo $rows_cate['category_id'];?>" <?php echo ($rows_cate['category_id'] == $select_cate) ? 'selected' : ''; ?> ><?php echo $rows_cate['category_name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="job_id">Job:</label> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-suitcase"></i></span>
                            </div>
                            <select class="form-control" name="job_id">
                                <?php 
                                $select_job = isset($_POST['job_id']) ? $_POST['job_id'] : $row['job_id']; 
                                $sql_job = "SELECT * FROM job";
                                $query_job = mysqli_query($conn, $sql_job);
                                while ($rows_job = mysqli_fetch_array($query_job)) {
                                    ?>
                                    <option value="<?php echo $rows_job['job_id'];?>" <?php echo ($rows_job['job_id'] == $select_job) ? 'selected' : ''; ?> ><?php echo $rows_job['job_name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="postLink">Post Link:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-link"></i></span>
                            </div>
                            <input type="text" name="postLink" class="form-control" value="<?php echo isset($_POST['postLink']) ? $_POST['postLink'] : $row['postLink'];  ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="postBy">Post By:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="postBy" class="form-control" value="<?php echo isset($_POST['postBy']) ? $_POST['postBy'] : $row['postBy'];  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6"> 
                        <label for="postWall">Post Wall:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bullseye"></i></span>
                            </div>
                            <input type="text" name="postWall" class="form-control" value="<?php echo isset($_POST['postWall']) ? $_POST['postWall'] : $row['postWall'];  ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="postDate">Post Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="date" name="postDate" class="form-control" value="<?php echo isset($_POST['postDate']) ? date('Y-m-d', strtotime($_POST['postDate'])) : date('Y-m-d', strtotime($row['postDate']));  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6"> 
                        <label for="email">Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope-open"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $row['email'];  ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="phoneNumber">Phone number:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="tel" name="phoneNumber" class="form-control" value="<?php echo isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : $row['phoneNumber'];  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address">Address:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                            </div>
                            <input type="text" name="address" class="form-control" value="<?php echo isset($_POST['address']) ? $_POST['address'] : $row['address'];  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" name="new_fboder">Save</button>
                        <a href="index.php?page_layout=fboders" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 