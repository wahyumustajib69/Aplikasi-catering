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
                        <a class="active-menu" href="<?php echo base_url(); ?>supplier"><i class="fa fa-users"></i> Supplier</a>
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
<div id="page-wrapper" >
	<div class="header"> 
        <h1 class="page-header">
            <i class="fa fa-users"></i> Supplier
        </h1>
		<ol class="breadcrumb" style="margin-top: -30px; background-color: #333333;">
			<li><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalSupplier"><i class="fa fa-plus-circle"></i>
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
                        Data Supplier
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('notif')?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID SUPPLIER</th>
                                        <th>NAMA</th>
                                        <th>KATEGORI</th>
                                        <th>TELEPON</th>
                                        <th>EMAIL</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($join_ktg_sup as $row){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->id_sup; ?></td>
                                        <td><?php echo $row->nm_sup; ?></td>
                                        <td><?php echo $row->nm_ktg; ?></td>
                                        <td><?php echo $row->telp; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->almt; ?></td>
                                        <td align="center">
                                            <a data-toggle="modal" data-target="#EditSupplier<?php echo $row->id_sup; ?>" data-popup="tooltip" data-placement="top"  class="btn btn-xs btn-info" > <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" data-id="<?php echo $row->id_sup; ?>"
                                            data-nama="<?php echo $row->nm_sup; ?>" data-toggle="modal" data-target="#HapusKategori" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!--End Advanced Tables -->

                <!--  Modals Tambah-->
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>supplier/simpanSupplier">
                <div class="modal fade" id="ModalSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-users"></i> TAMBAH SUPPLIER</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id Supplier</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id_sup" value="<?php echo $id_supplier; ?>" class="form-control" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Supplier</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nm_sup" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select name="ktg" class="form-control" required="required">
                                            	<option selected="" disabled="">-PILIH-</option>
                                            	<?php foreach($ktg_sup as $spl): ?>
                                            	<option value="<?php echo $spl->id_ktg; ?>"><?php echo $spl->nm_ktg; ?></option>
                                            	<?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="telp_sup" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email_sup" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea name="alamat" class="form-control" required="required" placeholder="Keterangan"></textarea>
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
                <?php foreach ($supplier as $row){ ?>
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>supplier/updateSupplier">
                <div class="modal fade" id="EditSupplier<?php echo $row->id_sup; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-list-ul"></i> UPDATE SUPPLIER</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id Supplier</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id_sup" value="<?php echo $row->id_sup; ?>" class="form-control" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Supplier</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nm_sup" value="<?php echo $row->nm_sup; ?>" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select name="ktg" class="form-control" required="required">
                                            	<option selected="" disabled="">-PILIH-</option>
                                            	<?php foreach($ktg_sup as $spl): ?>
                                            	<option value="<?php echo $spl->id_ktg; ?>"<?php if($spl->id_ktg==$row->ktg){echo 'selected';} ?>><?php echo $spl->nm_ktg; ?></option>
                                            	<?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="telp_sup" value="<?php echo $row->telp; ?>" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email_sup" value="<?php echo $row->email; ?>" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea name="alamat" class="form-control" required="required" placeholder="Keterangan"><?php echo $row->almt; ?></textarea>
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
                <form method="post" action="<?php echo base_url(); ?>supplier/deleteSupplier">
                <div class="modal fade" id="HapusKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-question-circle"></i> KONFIRMASI</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_hapus" id="id_hapus">
                                <h4 class="alert alert-info">Apakah Anda Yakin akan menghapus data <input type="text" name="nama_hapus" id="nama_hapus" readonly="readonly" class="btn btn-sm btn-danger">?</h4>
                            </div>
                            <div class="modal-footer" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> BATAL</button>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> HAPUS</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
            <!-- /. ROW  -->
    </div>