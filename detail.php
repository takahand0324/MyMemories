<?php
    require('dbconnect.php');

    // ２．SQL文を実行する
    $sql = 'SELECT * FROM feeds WHERE `id` = ?';
    // SQLを実行
    $data = array($_GET['id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

// $comments = array();
// while (1) {
//   $rec = $stmt->fetch(PDO::FETCH_ASSOC);
//   if ($rec == false) {
//     break;
//   }
//   $comments[] = $rec;
// }

// ３．データベースを切断する
$dbh = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Memories</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/chart.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><i class="fa fa-camera" style="color: #fff;"></i></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Main page</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <div class="main-contents">
            <div class="col-lg-10 col-lg-offset-1 centered">
                <div class="col-xs-4">
                    <a href="" class="trim"><img class="picture" src="post_img/<?php echo $rec['img_name']; ?>" alt=""></a>
                </div>
                <div class="col-xs-8">
                    <div class="details">
                        <h3 class="post-title"><span><?php echo $rec['title'] ?></span></h3>
                        <h4 class="post-date"><span><?php echo date('Ymd', strtotime($rec['date'])) ?></span></h4><br>
                        <h3 class="post-detail"><span><?php echo $rec['detail'] ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="f">
        <div class="container">
            <div class="row">
                <p>I <i class="fa fa-heart"></i> Cubu.</p>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
