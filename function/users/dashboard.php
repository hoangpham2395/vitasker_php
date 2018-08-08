<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i> Doashboard</li>
                    <li>Index</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 15px;"></div>

<div class="col-lg-3 col-md-6">
    <div class="social-box red">
        <i class="fa fa-users"></i>
        <ul>
            <li>
                <sctrong>
                    <span>Users</span>
                </sctrong>
            </li>
            <li>
                <sctrong>
                    <?php 
                    $query = mysqli_query($conn, "SELECT COUNT(user_id) as count FROM user");
                    $row = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $row['count'];?></span>
                </sctrong>
            </li>
        </ul>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="social-box blue">
        <i class="fa fa-suitcase"></i>
        <ul>
            <li>
                <sctrong>
                    <span>jobs</span>
                </sctrong>
            </li>
            <li>
                <sctrong>
                    <?php 
                    $query = mysqli_query($conn, "SELECT COUNT(job_id) as count FROM job");
                    $row = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $row['count'];?></span>
                </sctrong>
            </li>
        </ul>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="social-box green">
        <i class="fa fa-comment"></i>
        <ul>
            <li>
                <sctrong>
                    <span>fboders</span>
                </sctrong>
            </li>
            <li>
                <sctrong>
                    <?php 
                    $query = mysqli_query($conn, "SELECT COUNT(oder_id) as count FROM fboders");
                    $row = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $row['count'];?></span>
                </sctrong>
            </li>
        </ul>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="social-box orange">
        <i class="fa fa-align-center"></i>
        <ul>
            <li>
                <sctrong>
                    <span>categories</span>
                </sctrong>
            </li>
            <li>
                <sctrong>
                    <?php 
                    $query = mysqli_query($conn, "SELECT COUNT(category_id) as count FROM category");
                    $row = mysqli_fetch_array($query);
                    ?>
                    <span><?php echo $row['count'];?></span>
                </sctrong>
            </li>
        </ul>
    </div>
</div>