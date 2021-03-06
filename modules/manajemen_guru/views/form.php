<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-12">
		<a href="<?=site_url('manajemen_guru')?>" class="btn btn-default">
			<i class="fa fa-history"></i> Kembali
		</a>
	</div>
</div>

<form class="form-horizontal" method="POST" action="<?=site_url('manajemen_guru/submit/' . $id)?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	                    <i class="fa fa-image"></i>&nbsp;&nbsp;&nbsp;Foto
	                </h3>
	            </div>
	            <div class="box-body">
	                <center>
	                    <img src="<?=default_foto_user(@$data->foto)?>" class="img-circle" width="50%">
	                </center>
	                <hr/>
                    <div class="form-group">
                    	<div class="col-md-12">
	                        <label>Upload Foto</label>
                            <input type="file" class="form-control" name="userfiles" style="margin-bottom: 5px;">
                            <span>File harus berjenis JPG / PNG, Maks : 2 MB</span>
	                    </div>
                    </div>
	            </div>
	        </div>
		</div>
		<div class="col-md-8">
			<div class="box box-primary">
			    <div class="box-header with-border">
			        <h3 class="box-title">
			            <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;Biodata Guru
			        </h3>
			    </div>
			    <div class="box-body">
					<div class="form-group">
				        <label class="col-md-3 control-label">NIP *</label>
				        <div class="col-md-5">
				            <input type="text" class="form-control" name="nip" value="<?=@$data->nip?>" <?=!empty($data->nip) ? 'readonly' : '' ?>>
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">Nama *</label>
				        <div class="col-md-8">
				            <input type="text" class="form-control" name="nama" value="<?=@$data->nama?>">
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">No. Handphone *</label>
				        <div class="col-md-6">
				            <input type="text" class="form-control" name="no_hp" value="<?=@$data->no_hp?>">
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">Email *</label>
				        <div class="col-md-6">
				            <input type="email" class="form-control" name="email" value="<?=@$data->email?>">
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">Password *</label>
				        <div class="col-md-6">
				            <input type="password" class="form-control" name="password">
							<?php if(!empty($id)): ?>
								<span class="help-block">Kosongkan jika password tidak ingin diganti.</span>
							<?php endif; ?>
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">Jabatan</label>
				        <div class="col-md-8">
				            <input type="text" class="form-control" name="jabatan" value="<?=@$data->jabatan?>">
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">Sekolah *</label>
				        <div class="col-md-8">
				        	<?=form_dropdown('sekolah_id', $opt_sekolah, @$data->sekolah_id, 'class="form-control" onchange="get_kelas(this.value)"')?>
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-md-3 control-label">Wali Kelas</label>
				        <div class="col-md-8">
				        	<div id="area_kelas">
					        	<?=form_dropdown('wali_kelas', array(), '', 'class="form-control"')?>
							</div>
							<span class="help-block">Pilih kelas jika guru ini ditetapkan sebagai wali kelas.</span>
				        </div>
				    </div>
				    <hr/>
				    <div class="form-group">
				        <div class="col-md-12 text-right">
				            <button type="submit" class="btn btn-default">
				            	<i class="fa fa-check"></i>&nbsp;&nbsp;Simpan
				            </button>
				            <a href="<?=site_url('manajemen_guru')?>" class="btn btn-default">
				            	<i class="fa fa-times"></i>&nbsp;&nbsp;Batal
				            </a>
				        </div>
				    </div>
			    </div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	function get_kelas(id)
	{
		$.ajax({
			url 	: "<?=site_url('manajemen_guru/get_kelas?selected=' . @$data->kelas_id . '&sekolah_id=')?>" + id,
			method	: 'GET',
			success	: function(result){
				$('#area_kelas').html(result);
			}

		});
	}

	get_kelas($('select[name="sekolah_id"]').val());
</script>