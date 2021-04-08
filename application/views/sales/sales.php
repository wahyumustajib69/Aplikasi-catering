<!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> Beranda</a>
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
                        <a href="#"  class="active-menu"><i class="fa fa-money"></i> Sales<span class="fa arrow"></span></a>
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
<div id="page-wrapper" >
	<div class="header"> 
        <h1 class="page-header">
            <i class="fa fa-money"></i> SALES REGULER
        </h1>
		<ol class="breadcrumb" style="margin-top: -30px; background-color: #333333;">
			<li><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalSales"><i class="fa fa-plus-circle"></i>
                TAMBAH
                </button></li>
			
		</ol> 
	</div>
		
    <div id="page-inner" style="margin-top: -30px;"> 
                                            
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Data Sales
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('notif');?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID SALES</th>
                                        <th>TGL SALES</th>
                                        <th>JUMLAH SALES</th>
                                        <th>TOTAL ISSUE</th>
                                        <th>PROFIT COST</th>
                                        <th>FOOD COST</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($sales as $row){
                                        
                                    
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->id_sales; ?></td>
                                        <td><?php echo $row->tgl_sales; ?></td>
                                        <td class="text-right"><?php echo number_format($row->jml_sales); ?></td>
                                        
                                        <td class="text-right"><?php echo number_format($row->ttl_issue); ?></td>
                                        
                                        <td class="text-right">
                                            <?php 
                                            $sl = $row->jml_sales;
                                            $is = $row->ttl_issue;
                                            $fc = ($sl-$is);
                                            $pr = ($is/$sl)*100;
                                            echo number_format($fc);
                                            ?>
                                        </td>
                                        <td class="text-center"><?php echo round($pr,2).'%'; ?></td>
                                        <td align="center">
                                            <a data-toggle="modal" data-target="#EditSales<?php echo $row->id_sales; ?>" data-popup="tooltip" data-placement="top"  class="btn btn-xs btn-info" > <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" data-id="<?php echo $row->id_sales; ?>"
                                            data-nama="<?php echo $row->id_sales; ?>" data-toggle="modal" data-target="#HapusSales<?php echo $row->id_sales; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> </a>
                                        </td>
                                    </tr>
                                <?php  } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center"><b>GRAND TOTAL</b></td>
                                        <td class="text-right"><?php foreach($t_sal as $t){echo number_format($t->sal);}  ?></td>
                                        <td class="text-right"><?php foreach($t_isu as $i){echo number_format($i->tis);}  ?></td>
                                        <td class="text-right"><?php $s = $t->sal; $x = $i->tis; $a=$s-$x; echo number_format($a); ?></td>
                                        <td class="text-center"><?php $gf = ($x/$s)*100; echo round($gf,2).'%'; ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!--End Advanced Tables -->

                <!--  Modals Tambah-->
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>sales/simpanSales">
                <div class="modal fade" id="ModalSales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-money"></i> TAMBAH SALES</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id Sales</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id_sales" value="<?php echo $id_sl; ?>" class="form-control" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Sales</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Jumlah (Rp)</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="jml" class="form-control" placeholder="Jumlah Sales" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Issue</label>
                                        <div class="col-sm-9">
                                            <select name="tis" class="form-control" required="">
                                                <option disabled="" selected="">-Pilih Tanggal Issue-</option>
                                                <?php foreach($tt_sl as $t): ?>
                                                <option value="<?php echo $t->total; ?>"><?php echo $t->tgl_issue.' | Total = '.number_format($t->total); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> BATAL</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <!--Modal Edit-->
                <?php foreach ($sales as $row){ ?>
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>sales/updateSales">
                <div class="modal fade" id="EditSales<?php echo $row->id_sales; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-money"></i> UPDATE SALES</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id Sales</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id_sales" value="<?php echo $row->id_sales; ?>" class="form-control" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Sales</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl" value="<?php echo $row->tgl_sales; ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Jumlah (Rp)</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="jml" class="form-control" placeholder="Jumlah Sales" required="" value="<?php echo $row->jml_sales; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Issue</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="tis" class="form-control" placeholder="Jumlah Sales" required="" value="<?php echo $row->ttl_issue; ?>">
                                            <select name="tis" class="form-control" required="">
                                                <option disabled="" selected="">-Pilih Tanggal Issue-</option>
                                                <?php foreach($tt_sl as $t): ?>
                                                <option value="<?php echo $t->total; ?>" <?php if($t->total==$row->ttl_issue){echo 'selected';} ?>><?php echo $t->tgl_issue.' | Total = '.number_format($t->total); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> BATAL</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            	<?php } ?>
                <!--END Modal Edit-->

                <!--Modal Hapus-->
                <?php foreach ($sales as $row){ ?>
                <form method="post" action="<?php echo base_url(); ?>sales/deleteSales">
                <div class="modal fade" id="HapusSales<?php echo $row->id_sales; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-question-circle"></i> KONFIRMASI</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_sales" value="<?php echo $row->id_sales; ?>">
                                <h4 class="alert alert-info">Apakah Anda Yakin akan menghapus data <label class="text-danger"><?php echo $row->id_sales; ?></label> ?</h4>
                            </div>
                            <div class="modal-footer" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> BATAL</button>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> HAPUS</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <?php } ?>
            </div>
        </div>
            <!-- /. ROW  -->
    </div>