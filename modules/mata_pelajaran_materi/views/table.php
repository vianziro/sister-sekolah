<div class="box box-primary">
    <div class="box-header with-border">
    	<h3 class="box-title">
            <i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp;Materi Mata Pelajaran
        </h3>
    </div>
    <div class="box-body">
        <form method="GET" action="<?=site_url('mata_pelajaran_materi')?>">
        	<div class="row">
                <div class="col-md-2">
                    <?php if($login_level == 'guru'){ ?>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <label>&nbsp;</label>
                            <div class="input-group">
                                <a href="<?=site_url('mata_pelajaran_materi/form')?>" class="btn btn-default">
                                    <i class="fa fa-plus hidden-xs"></i> Upload Baru
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Sekolah</label>
                        <?=form_dropdown('sekolah', $opt_sekolah, $sekolah, 'class="form-control" onchange="get_kelas()"')?>
                    </div>                    
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Kelas</label>
                        <div id="area_kelas">
                            <?=form_dropdown('kelas', array('' => 'Semua Kelas'), '', 'class="form-control"')?>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <?=form_dropdown('mata_pelajaran', $opt_mata_pelajaran, $mata_pelajaran, 'class="form-control"')?>
                    </div>                    
                </div>
        		<div class="col-md-3">
					<div class="form-group" style="margin-bottom: 0px;">
                        <label>&nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-control">
	                            <input type="text" class="form-control input" placeholder="Pencarian.." name="q" value="<?=$keyword?>">
                            </div>
                            <span class="input-group-btn btn-right">
                                <button class="btn btn-default" type="submit">Cari !</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr/>
        <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="col-md-1"></th>
                        <th class="col-md-2">Sekolah</th>
						<th class="col-md-2">Mata Pelajaran</th>
                        <th>Keterangan</th>
                        <th class="col-md-2">Uploader</th>
                        <th class="col-md-2">Kelas</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($data)){ ?>
						<?php foreach($data as $key => $c): ?>
							<tr>
								<td class="text-center">
                                    <?php if($c->user_id == $this->login_uid){ ?>
                                        <a href="<?=site_url('mata_pelajaran_materi/form/' . $c->mata_pelajaran_id)?>" class="btn btn-default btn-xs" title="Perbaharui / Update">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php } ?>
                                    <a onclick="confirm_hapus('<?=$c->mata_pelajaran_id?>')" class="btn btn-default btn-xs" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
								</td>
                                <td><?=$c->nama_sekolah?></td>
								<td><?=$c->nama_mata_pelajaran?></td>
                                <td>
                                    Judul : <?=$c->judul?><br/>
                                    Jenis : <?=format_ucwords($c->jenis)?>
                                    <?php if(!empty($c->keterangan)){ ?>                                       
                                        <br/>Keterangan : <?=$c->keterangan?>
                                    <?php } ?>
                                    <?php if(!empty($c->lokasi_file)){ ?>                                       
                                        <br/>File : <a href="<?=base_url($c->lokasi_file)?>" target="_blank">Download File</a>
                                    <?php } ?>
                                </td>
                                <td><?=$c->nama_uploader?><br/>@<?=format_tanggal_indonesia($c->waktu_upload, true)?></td>
                                <td>
                                    <?php foreach ($c->kelas as $key => $c) : ?>
                                        <?=$c->nama?> <i class="fa fa-check"></i><br/>
                                    <?php endforeach; ?>
                                </td>
							</tr>
						<?php endforeach; ?>
					<?php } else { ?>
						<tr>
							<td colspan="2">Tidak ada data.</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<?=$pagination?>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                	<i class="fa fa-info-circle"></i>&nbsp;&nbsp;Hapus Data
                </h4>
            </div>
            <div class="modal-body">
            	<h4>Apakah Anda yakin ? </h4>
            </div>
            <div class="modal-footer">
            	<a href="<?=site_url('mata_pelajaran_materi')?>" id="btn-yes" class="btn btn-default">
            		<i class="fa fa-check"></i> Ya, Saya Yakin
            	</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                	<i class="fa fa-times"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function confirm_hapus(id)
	{
		$('#modal-hapus #btn-yes').attr({'href' : '<?=site_url('mata_pelajaran_materi/hapus')?>/' + id});
		$('#modal-hapus').modal();
	}

    function get_kelas()
    {
        $.ajax({
            url     : "<?=site_url('mata_pelajaran_materi/ajax_kelas?selected=' . @$kelas . '&sekolah_id=')?>" + $('select[name="sekolah"]').val(),
            method  : 'GET',
            success : function(result){
                $('#area_kelas').html(result);
            }

        });
    }    

    $(document).ready(function(){
        get_kelas();
    });    
</script>