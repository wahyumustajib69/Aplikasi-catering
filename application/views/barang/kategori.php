<!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li>
                        <a class="active-menu" href="#"><i class="fa fa-archive"></i> Menu Barang<span class="fa arrow"></span></a>
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
                                <a  href="<?php echo base_url(); ?>issue"><i class="fa fa-shopping-cart"></i> Issue Backcarge</a></a>
                            </li>
                        </ul>
                    </li>  
                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Charts JS</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Morris Chart</a>
                            </li>
                            </ul>
                        </li>   
                            
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
<div id="page-wrapper" >
	<div class="header"> 
        <h1 class="page-header">
            <i class="fa fa-list-ul"></i> Kategori Barang
        </h1>
		<ol class="breadcrumb" style="margin-top: -30px; background-color: #333333;">
			<li><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalKategori"><i class="fa fa-plus-circle"></i>
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
                        Data Kategori Barang
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('notif')?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID KATEGORI</th>
                                        <th>NAMA KATEGORI</th>
                                        <th>KETERANGAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; foreach($kategori as $row){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->id_ktg; ?></td>
                                        <td><?php echo $row->nm_ktg; ?></td>
                                        <td><?php echo $row->ket; ?></td>
                                        <td align="center">
                                            <a href="javascript:;"
                                            data-id="<?php echo $row->id_ktg; ?>"
                                            data-nama="<?php echo $row->nm_ktg; ?>"
                                            data-ket="<?php echo $row->ket; ?>"
                                            data-toggle="modal" data-target="#EditKategori"
                                            >
                                            <button data-toggle="modal" data-target="#UbahKategori" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> </button>
                                            </a>
                                            <a href="javascript:;" data-id="<?php echo $row->id_ktg; ?>"
                                            data-nama="<?php echo $row->nm_ktg; ?>" data-toggle="modal" data-target="#HapusKategori" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> </a>
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
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>kategori/simpanKategori">
                <div class="modal fade" id="ModalKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-list-ul"></i> TAMBAH KATEGORI</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="id_ktg" value="<?php echo $kode; ?>" class="form-control" placeholder="Nama Kategori" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nm_ktg" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Ket</label>
                                        <div class="col-sm-10">
                                            <textarea name="ket" class="form-control" required="required" placeholder="Keterangan"></textarea>
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
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>kategori/updateKategori">
                <div class="modal fade" id="EditKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-list-ul"></i> UPDATE KATEGORI</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="id_ktg" id="id" class="form-control" placeholder="Id Kategori" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nm_ktg" id="nama" class="form-control" placeholder="Nama Kategori" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Ket</label>
                                        <div class="col-sm-10">
                                            <textarea name="ket" id="ket" class="form-control" required="required" placeholder="Keterangan"></textarea>
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
                <!--END Modal Edit-->

                <!--Modal Hapus-->
                <form method="post" action="<?php echo base_url(); ?>kategori/deleteKategori">
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