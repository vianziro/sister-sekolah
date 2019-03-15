<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_kelas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->login_status 	= $this->session->userdata('login_status');
		$this->login_uid 		= $this->session->userdata('login_uid');
		if($this->login_status != 'ok')
		{
			$this->session->set_flashdata('msg', err_msg('Silahkan login untuk melanjutkan.'));
			redirect(site_url('login'));
		}

		$this->load->model('pengaturan_kelas_model');
		$this->load->model('profil_sekolah/profil_sekolah_model');
		$this->load->model('pengaturan_jurusan/pengaturan_jurusan_model');
		$this->page_active 		= 'pengaturan';
		$this->sub_page_active 	= 'pengaturan_kelas';
	}


	public function index()
	{
		$param['sekolah']	= $this->input->get('sekolah');
		$param['keyword']	= $this->input->get('q');
		$limit 				= 10;
		$uri_segment		= 3;
		$filter = array(
			'limit'			=> $limit,
			'offset'		=> $this->uri->segment($uri_segment),
			'keyword'		=> $param['keyword'],
			'sekolah_id'	=> $param['sekolah']
		);

		$param['data']			= $this->pengaturan_kelas_model->get_data($filter)->result();

		unset($filter['limit']);
		unset($filter['offset']);
		$total_rows 			= $this->pengaturan_kelas_model->get_data($filter)->num_rows();
		$param['pagination']	= paging('pengaturan_kelas/index', $total_rows, $limit, $uri_segment);

		$param['opt_sekolah']		= $this->profil_sekolah_model->get_opt('Semua Sekolah');

		$param['main_content']	= 'pengaturan_kelas/table';
		$param['page_active'] 	= $this->page_active;
		$param['sub_page_active'] 	= $this->sub_page_active;
		$this->templates->load('main_templates', $param);
	}

	public function form($id = '')
	{
		$param['msg']			= $this->session->flashdata('msg');
		$param['id']			= $id;

		$last_data 	= $this->session->flashdata('last_data');
		if(!empty($last_data))
		{
			$param['data'] = (object) $last_data;
		}
		else
		{
			if(!empty($id))
			{
				$param['data'] = $this->pengaturan_kelas_model->get_data_row($id);
			}
		}

		$param['opt_sekolah']	= $this->profil_sekolah_model->get_opt();
		$param['opt_jurusan']	= $this->pengaturan_jurusan_model->get_opt();

		$param['main_content']		= 'pengaturan_kelas/form';
		$param['page_active'] 		= $this->page_active;
		$param['sub_page_active'] 	= $this->sub_page_active;
		$this->templates->load('main_templates', $param);
	}

	public function submit($id = '')
	{
		$data_post = $this->input->post();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('msg', err_msg(validation_errors()));
			$this->session->set_flashdata('last_data', $data_post);
			redirect('pengaturan_kelas/form/' . $id);
		}
		else
		{
			if(empty($id))
			{
				$proses = $this->pengaturan_kelas_model->insert($data_post);
				if($proses)
				{
					$this->session->set_flashdata('msg', suc_msg('Data berhasil disimpan.'));
				}
				else
				{
					$this->session->set_flashdata('msg', err_msg('Data gagal disimpan, silahkan ulangi lagi.'));
					redirect('pengaturan_kelas/form/' . $id);
				}
			}
			else
			{
				$proses = $this->pengaturan_kelas_model->update($data_post, $id);
				if($proses)
				{
					$this->session->set_flashdata('msg', suc_msg('Data berhasil diperbaharui.'));
				}
				else
				{
					$this->session->set_flashdata('msg', err_msg('Data gagal diperbaharui, tidak ada yang berubah.'));
				}
			}
		}
		redirect('pengaturan_kelas');
	}

	public function hapus($id)
	{
		$proses = $this->pengaturan_kelas_model->delete($id);
		$this->session->set_flashdata('msg', suc_msg('Data berhasil dihapus.'));
		redirect('pengaturan_kelas');
	}
}