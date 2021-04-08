<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>CATERING-KU ONLINE</title>
    <!-- Bootstrap Styles-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="<?php echo base_url(); ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?php echo base_url(); ?>assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Select2-->  
    <link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/Lightweight-Chart/cssCharts.css"> 
    <!-- TABLE STYLES-->
    <link href="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!--Logo-->
    <link rel="icon" type="icon" href="<?php echo base_url(); ?>assets/img/logo.jpg">
</head>
        <!-- /. NAV SIDE  -->
<body class="bg-primary">
	<div class="container">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="margin-top: 50px;">
                    <div class="panel panel-default" style="box-shadow: black 0 0 21px; border-radius: 8px;">
                        <div class="panel-heading">
                            <div class="number">
                                <div class="icon text-center">
                                    <i class="fa fa-truck fa-5x text-success"></i>
                                </div>
                            </div>
                            <div class="card-title">
                                <div class="title text-center text-danger" style="font-family:'cooper' "><h3>CATERING-KU</h3></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>login/action">
                                <div class="form">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user text-primary"></i>
                                        </div>
                                        <input name="username" type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form" style="margin-top: 10px;">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock text-success"></i>
                                        </div>
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>