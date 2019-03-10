<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-primary">
		    <div class="box-header with-border">
		        <h3 class="box-title">
		            <i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp;Input Nilai Mata Pelajaran
		        </h3>
		    </div>
		    <div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?=site_url('mata_pelajaran_nilai/index?' . $url_param)?>" class="btn btn-default">
							<i class="fa fa-history"></i> Kembali
						</a>
					</div>
				</div>
				<hr/>
				<form class="form-horizontal" method="POST" action="<?=site_url('mata_pelajaran_nilai/submit/' . $id . '?' . $url_param)?>" enctype="multipart/form-data" autocomplete="off">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Sekolah</th>
								<th> : <?=$data_sekolah->nama?></th>
								<th>Semester</th>
								<th> : <?=$data_semester->tahun_mulai . ' / ' . $data_semester->tahun_akhir . ' ' . $data_semester->nama?></th>
								<th>Mata Pelajaran</th>
								<th> : <?=$data_mata_pelajaran->nama?></th>
							</tr>
							<tr>
								<th>Kelas</th>
								<th> : <?=$data_kelas->jenjang . ' ' . $data_kelas->nama_jurusan . ' ' . $data_kelas->nama?></th>
								<th>Jenis Nilai</th>
								<th> : <?=$data_jenis?></th>
								<th colspan="2"></th>
							</tr>
						</thead>
					</table>

					<!--
					<?php if($jenis == 'tugas' || $jenis == 'ulangan'){ ?>
						<div class="form-group">
					        <label class="col-md-2 control-label">Keterangan</label>
					        <div class="col-md-10">
					            <input type="text" class="form-control" name="keterangan" value="<?=@$data->keterangan?>" maxlength="50">
					        </div>
					    </div>
					<?php } ?>
					-->

					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th class="col-md-3">NIS</th>
								<th>Nama</th>
								<th class="col-md-2 text-center">Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($data)){ ?>
								<?php foreach($data as $key => $c): ?>
									<tr>
										<td style="vertical-align: middle;"><?=$c->nis?></td>
										<td style="vertical-align: middle;"><?=$c->nama?></td>
										<td><input type="number" name="nilai[<?=$c->user_id?>]" class="form-control text-center" value="<?=@$c->nilai?>"></td>
									</tr>
								<?php endforeach; ?>
							<?php } else { ?>
								<tr>
									<td colspan="3"><?=info_msg('Tidak ada data siswa.')?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
		            <hr/>
				    <div class="form-group">
				        <div class="col-md-12 text-right">
				            <button type="submit" class="btn btn-default">
				            	<i class="fa fa-check"></i>&nbsp;&nbsp;Simpan
				            </button>
				            <a href="<?=site_url('mata_pelajaran_nilai/index?' . $url_param)?>" class="btn btn-default">
				            	<i class="fa fa-times"></i>&nbsp;&nbsp;Batal
				            </a>
				        </div>
				    </div>
				</form>
		    </div>
		</div>
	</div>
</div>