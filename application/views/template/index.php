
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  class="active-menu" href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-archive"></i> Menu Barang<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>satuan"><i class="fa fa-list-ol"></i> Satuan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>kategori"><i class="fa fa-list-ul"></i> Kategori</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>barang"><i class="fa fa-archive"></i> Data Barang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>supplier"><i class="fa fa-users"></i> Supplier</a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url(); ?>barangmasuk"><i class="fa fa-truck"></i> Barang Masuk</a>
                    </li> 
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> Issue Barang<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a  href="<?php echo base_url(); ?>issue"><i class="fa fa-shopping-cart"></i> Issue Reguler</a></a>
                            </li>
                            <li>
                                <a  href="<?php echo base_url(); ?>issuebc"><i class="fa fa-shopping-cart"></i> Issue Backcarge</a></a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-money"></i> Sales<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a  href="<?php echo base_url(); ?>sales"><i class="fa fa-money"></i> Sales Reguler</a></a>
                            </li>
                            <li>
                                <a  href="<?php echo base_url(); ?>salesbc"><i class="fa fa-money"></i> Sales Backcarge</a></a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            <i class="fa fa-home"></i> BERANDA<small>Selamat Datang <?php echo strtoupper($this->session->userdata('nama')); ?></small>
                        </h1>
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3>
                                <?php foreach($t_brg as $b){
                                    echo $b->total;
                                } ?>                        
                                </h3>
								<small>total barang</small>
							</h3> 
						</div>
						<div class="icon">
						   <a href="<?php echo base_url() ?>barang"><i class="fa fa-archive fa-5x red"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3>
                                <?php
                                foreach($t_sup as $s){
                                    echo $s->sup;
                                }
                                ?>                        
                                </h3>
								<small>Supplier</small>
							</h3> 
						</div>
						<div class="icon">
						   <a href="<?php echo base_url() ?>supplier"><i class="fa fa-users fa-5x blue"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3>
                                <?php
                                foreach($b_mas as $b){
                                    echo $b->masuk;
                                }
                                ?>                        
                                </h3>
								<small>Barang Masuk</small>
							</h3> 
						</div>
						<div class="icon">
						   <a href="<?php echo base_url(); ?>barangmasuk"><i class="fa fa-truck fa-5x green"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3>
                                    <?php
                                    foreach($issue as $is){
                                        echo $is->issue;
                                    }
                                    ?>
                                </h3>
								<small>Issue Barang</small>
							</h3> 
						</div>
						<div class="icon">
						   <a href="<?php echo base_url() ?>issue"><i class="fa fa-shopping-cart fa-5x yellow"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
				   
                </div>
				     <div class="row">
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Issue Barang</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="line-chart" class="chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Perbandingan Sales dan Issue Barang</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="bar-chart" class="chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
				
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Profit</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="82" ><span class="percent">82%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Sales</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="55" ><span class="percent">55%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Customers</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="84" ><span class="percent">84%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>No. of Visits</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="46" ><span class="percent">46%</span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
		
				<div class="row">
				<div class="col-md-5">
						<div class="panel panel-default">
						<div class="panel-heading">
							Line Chart
						</div>
						<div class="panel-body">
							<div id="morris-line-chart"></div>
						</div>						
					</div>   
					</div>		
					
						<div class="col-md-7">
					<div class="panel panel-default">
					<div class="panel-heading">
                                Bar Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
						
					</div>  
					</div>
					
				</div> 
			 
				
				
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">                            
							<div class="panel-heading">
							Area Chart
						</div>
						<div class="panel-body">
							<div id="morris-area-chart"></div>
						</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
				<div class="row">
				<div class="col-md-12">
				
					</div>		
				</div> 	
                <!-- /. ROW  -->

                <!-- /. ROW  -->
			
		
				