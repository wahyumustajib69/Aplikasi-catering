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
                        <a class="active-menu" href="<?php echo base_url(); ?>barangmasuk"><i class="fa fa-truck"></i> Barang Masuk</a>
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
            <i class="fa fa-truck"></i> Data Barang Masuk
        </h1>
        <ol class="breadcrumb" style="margin-top: -30px; background-color: #333333;">
            <li><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalBarang"><i class="fa fa-plus-circle"></i>
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
                        Data Barang Masuk
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('notif')?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID MASUK</th>
                                        <th>NAMA BARANG</th>
                                        <th>TGL MASUK</th>
                                        <th>SUPPLIER</th>
                                        <th>JUMLAH</th>
                                        <th>HARGA</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; foreach($join_masuk as $row){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->id_masuk; ?></td>
                                        <td><?php echo $row->nm_brg; ?></td>
                                        <td><?php echo $row->tgl_masuk; ?></td>
                                        <td><?php echo $row->nm_sup; ?></td>
                                        <td><?php echo $row->jml_masuk; ?></td>
                                        <td align="right"><?php echo $row->harga; ?></td>
                                        <td align="center">
                                            <a data-toggle="modal" data-target="#EditMasuk<?php echo $row->id_masuk; ?>" data-popup="tooltip" data-placement="top"  class="btn btn-xs btn-info" > <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" data-id="<?php echo $row->id_masuk; ?>"
                                            data-nama="<?php echo $row->nm_brg; ?>" data-toggle="modal" data-target="#HapusMasuk<?php echo $row->id_masuk; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> </a>
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
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>barangmasuk/simpanMasuk">
                <div class="modal fade" id="ModalBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-truck"></i> TAMBAH BARANG MASUK</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id_masuk" value="<?php echo $id_masuk; ?>" class="form-control" placeholder="Id Barang" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Barang</label>
                                        <div class="col-sm-9">
                                            <select name="id_brg" class="form-control barang" required="">
                                                <option selected="" disabled="">-Cari Barang-</option>
                                                <?php foreach($tmpbrg as $br): ?>
                                                <option value="<?php echo $br->id_brg; ?>"><?php echo $br->nm_brg.' | '.$br->harga; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl" class="form-control" placeholder="Id Barang" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                                        <div class="col-sm-9">
                                            <select name="sup" class="form-control" required="">
                                                <option selected="" disabled="">-PILIH-</option>
                                                <?php foreach ($sup as $st){ ?>
                                                <option value="<?php echo $st->id_sup; ?>"><?php echo $st->nm_sup.' | '.$st->nm_ktg; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="jml" class="form-control" placeholder="Jumlah" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="harga" class="form-control" placeholder="Harga Barang" required="">
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
                <?php foreach($join_masuk as $row): ?>
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>barangmasuk/updateMasuk">
                <div class="modal fade" id="EditMasuk<?php echo $row->id_masuk; ?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-truck"></i> UPDATE BARANG MASUK</h4>
                            </div>
                            <div class="modal-body">
                                <div id="tampil-modal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id_masuk" value="<?php echo $row->id_masuk; ?>" class="form-control" placeholder="Id Barang" readonly required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Barang</label>
                                        <div class="col-sm-9">
                                            <select name="id_brg" class="form-control barang2" required="" disabled="">
                                                <option selected="" disabled="">-Cari Barang-</option>
                                                <?php foreach($tmpbrg as $br): ?>
                                                <option value="<?php echo $br->id_brg; ?>"<?php if($br->id_brg == $row->id_brg){echo 'selected';} ?> ><?php echo $br->nm_brg; ?></option>
                                                <?php endforeach; ?>
                                            </select><input type="hidden" name="id_brg2" value="<?php echo $row->id_brg ?>">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl" class="form-control" value="<?php echo $row->tgl_masuk; ?>" placeholder="Id Barang" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                                        <div class="col-sm-9">
                                            <select name="sup" class="form-control" required="">
                                                <option selected="" disabled="">-PILIH-</option>
                                                <?php foreach ($sup as $st){ ?>
                                                <option value="<?php echo $st->id_sup; ?>" <?php if($st->id_sup==$row->supplier){echo 'selected';} ?>><?php echo $st->nm_sup.' | '.$st->nm_ktg; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="jml" class="form-control" placeholder="Stok Tersedia" required="" value="<?php echo $row->jml_masuk; ?>">
                                            <input type="hidden" name="jml_lama" value="<?php echo $row->jml_masuk; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="harga" class="form-control" placeholder="Harga Barang" required="" value="<?php echo $row->hrga; ?>">
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
                <?php endforeach; ?>
                <!--END Modal Edit-->

                <!--Modal Hapus-->
                <?php foreach($join_masuk as $row): ?>
                <form method="post" action="<?php echo base_url(); ?>barangmasuk/deleteMasuk">
                <div class="modal fade" id="HapusMasuk<?php echo $row->id_masuk; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                <h4 class="modal-title" id="myModalLabel" id="judul"><i class="fa fa-question-circle"></i> KONFIRMASI</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_brg" value="<?php echo $row->id_brg; ?>">
                                <input type="hidden" name="jmasuk" value="<?php echo $row->jml_masuk; ?>">
                                <input type="hidden" name="hrga" value="<?php echo $row->hrga; ?>">
                                <input type="hidden" name="id_hapus" id="id_hapus" value="<?php echo $row->id_masuk; ?>">
                                <h4 class="alert alert-info">Apakah Anda Yakin akan menghapus data <label class="text-danger"><?php echo $row->nm_brg; ?></label>?</h4>
                            </div>
                            <div class="modal-footer" style="background-color: #333333; color: #ffffff;">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> BATAL</button>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> HAPUS</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <?php endforeach; ?>

            </div>
        </div>
            <!-- /. ROW  -->
    </div>