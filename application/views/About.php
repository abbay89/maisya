<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * CLASS NAME : Home
 * ------------------------------------------------------------------------
 *
 * @author     Ihsan shalihin
 */

class About extends MY_Controller 
{

	public function __construct() 
    {
      parent::__construct();
     
        // load form and url helpers
        $this->load->helper(array('form', 'url'));
         
        // load form_validation library
        $this->load->library('form_validation');

    }

	public function index()
	{
		$this->load->model('m_bod');
		$dt['bod'] = $this->m_bod->get_all();

		$this->load->view('home/about_us', $dt);
	}

	public function reminder_store_json()
	{
		$load_model = $this->load->model('m_dashboard');
		
		$level 			= $this->session->userdata('ap_level');
		//echo $level;exit;

		$requestData	= $_REQUEST;

		$fetch			= $this->m_dashboard->fetch_estimasi_store($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();


		foreach($query->result_array() as $row)
		{ 
			$nestedData = array(); 

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['doc_name'];
			$nestedData[] 	= $row['store_name'];
			$nestedData[] 	= $row['category_name'];
			if ($row['diff_date'] <= -1) {
				$badge = 'danger';
			} else if ($row['diff_date'] >=0 || $row['diff_date'] <= 7 ) {
				$badge = 'warning';
			} else {
				$badge = 'success';
			}
			$nestedData[]	= '<span class="label label-'.$badge.'">'.date_indo($row['date_end']).'</span>';
			$nestedData[] 	= "<a class='btn btn-success' href='".site_url('dashboard/input_berkas/'.$row[docStore_id])."' id='inputBerkas'> Pemberkasan</a>";
			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);
		//print_r($json_data); exit;
		echo json_encode($json_data);
	}
	public function reminder_pusat_json()
	{
		$load_model = $this->load->model('m_dashboard');
		
		$level 			= $this->session->userdata('ap_level');
		//echo $level;exit;

		$requestData	= $_REQUEST;

		$fetch			= $this->m_dashboard->fetch_estimasi_pusat($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();


		foreach($query->result_array() as $row)
		{ 
			$nestedData = array(); 

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['doc_name'];
			$nestedData[] 	= $row['category_name'];
			if ($row['diff_date'] <= -1) {
				$badge = 'danger';
			} else if ($row['diff_date'] >=0 || $row['diff_date'] <= 7 ) {
				$badge = 'warning';
			} else {
				$badge = 'success';
			}
			$nestedData[]	= '<span class="label label-'.$badge.'">'.date_indo($row['date_end']).'</span>';
			$nestedData[] 	= "<a class='btn btn-success' href='".site_url('dashboard/input_berkas_pusat/'.$row[docpusat_id])."' id='inputBerkasPusat'> Pemberkasan</a>";
			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);
		//print_r($json_data); exit;
		echo json_encode($json_data);
	}

	public function estimasi_add($docStore_id = NULL)
	{
		
        $username = $this->session->userdata('ap_id_user');
        $date_now = date('Y-m-d H:i:s');

		$this->load->model('m_dashboard');
		$level = $this->session->userdata('ap_level');
		if($level == 'admin' OR $level == 'inventory')
		{
			if($_POST)
			{

				$docstore_id = $this->input->post('docstore_id');
				$biaya 		 = $this->input->post('biaya');
				$tanggal 	 = date('Y-m-d',strtotime($this->input->post('tanggal')));;
				$comment 	 = $this->input->post('keterangan');
				$pr_no 		 = $this->input->post('pr_no');
				$denda 		 = $this->input->post('denda');

				$insert 	= $this->m_dashboard->add_estimasi($docstore_id, $biaya, $denda, $tanggal, $comment, $pr_no, $username, $date_now);
				
				//echo $docstore_id." - ".$biaya.' - '.$tanggal.' - '.$comment; exit;
				if($insert)
				{
					echo json_encode(array(
						'status' => 1,
						'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> <b>estimasi </b> berhasil ditambahkan.</div>"
					));
				}
				else
				{
					$this->query_error();
				}
			}
			else
			{
				$this->load->model('m_docstore');
				$dt['docstore'] 	= $this->m_docstore->get_baris($docStore_id)->row();
				$dt['last'] 	= $this->m_docstore->get_last($docStore_id)->row();
				$this->load->view('dashboard/estimasi_add', $dt);
			}
		}
		else
		{
			exit();
		}
	}

	public function input_berkas($docStore_id = NULL)
	{
		
        $username = $this->session->userdata('ap_id_user');
        $date_now = date('Y-m-d H:i:s');

		$this->load->model('m_dashboard');
		$level = $this->session->userdata('ap_level');
		if($level == 'admin' OR $level == 'developer' OR $level == 'manajer')
		{
			if($_POST)
			{
				$docstore_id = $this->input->post('docstore_id');
				$comment 	 = $this->input->post('keterangan');
				$kelengkapan = $this->input->post('kelengkapan');
				$unchecked   = $this->input->post('unchecked');

				$insert 	= $this->m_dashboard->input_berkas($docstore_id, $comment, $kelengkapan, $unchecked, $username, $date_now);
				
				if($insert)
				{
					echo json_encode(array(
						'status' => 1,
						'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> <b>estimasi </b> berhasil ditambahkan.</div>"
					));
				}
				else
				{
					$this->query_error();
				}
			}
			else
			{
				$this->load->model('m_docstore');
				$dt['docstore'] 	= $this->m_docstore->get_baris($docStore_id)->row();
				$dt['last'] 	= $this->m_docstore->get_last($docStore_id)->row();
				$dt['kelengkapan'] = $this->m_docstore->get_kelengkapan($docStore_id);
				$dt['additional_data'] = $this->m_docstore->get_additional($docStore_id);
				$this->load->view('dashboard/input_berkas', $dt);
			}
		}
		else
		{
			exit();
		}
	}

	public function input_berkas_pusat($docpusat_id = NULL)
	{
		
        $username = $this->session->userdata('ap_id_user');
        $date_now = date('Y-m-d H:i:s');

		$this->load->model('m_dashboard');
		$level = $this->session->userdata('ap_level');
		if($level == 'admin' OR $level == 'developer')
		{
			if($_POST)
			{
				$docpusat_id = $this->input->post('docpusat_id');
				$comment 	 = $this->input->post('keterangan');
				$kelengkapan = $this->input->post('kelengkapan');
				$unchecked   = $this->input->post('unchecked');

				$insert 	= $this->m_dashboard->input_berkas_pusat($docpusat_id, $comment, $kelengkapan, $unchecked, $username, $date_now);
				
				if($insert)
				{
					echo json_encode(array(
						'status' => 1,
						'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> <b>estimasi </b> berhasil ditambahkan.</div>"
					));
				}
				else
				{
					$this->query_error();
				}
			}
			else
			{
				$this->load->model('m_docpusat');
				$dt['docpusat'] 	= $this->m_docpusat->get_baris($docpusat_id)->row();
				$dt['last'] 	= $this->m_docpusat->get_last($docpusat_id)->row();
				$dt['kelengkapan'] = $this->m_docpusat->get_kelengkapan($docpusat_id);
				$this->load->view('dashboard/input_berkas_pusat', $dt);
			}
		}
		else
		{
			exit();
		}
	}

	public function ajax_cek_kode()
	{
		if($this->input->is_ajax_request())
		{
			$kode = $this->input->post('kodenya');
			$this->load->model('m_barang');

			$cek_kode = $this->m_barang->cek_kode($kode);
			if($cek_kode->num_rows() > 0)
			{
				echo json_encode(array(
					'status' => 0,
					'pesan' => "<font color='red'>Kode sudah ada</font>"
				));
			}
			else
			{
				echo json_encode(array(
					'status' => 1,
					'pesan' => ''
				));
			}
		}
	}

	public function exist_kode($kode)
	{
		$this->load->model('m_barang');
		$cek_kode = $this->m_barang->cek_kode($kode);

		if($cek_kode->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function cek_titik($angka)
	{
		$pecah = explode('.', $angka);
		if(count($pecah) > 1){
			return FALSE;
		}
		return TRUE;
	}

	public function edit($category_id = NULL)
	{
		if( ! empty($category_id))
		{
			$level = $this->session->userdata('ap_level');
			$username = $this->session->userdata('ap_id_user');
        	$date_now = date('Y-m-d H:i:s');

			if($level == 'admin' OR $level == 'inventory')
			{
				if($this->input->is_ajax_request())
				{
					$this->load->model('m_category');
					
					if($_POST)
					{

							$category_name 		= $this->input->post('category_name');
							$category_id		= $this->input->post('category_id');

							$update = $this->m_category->update_category($category_id, $category_name,$date_now, $username);
							if($update)
							{
								echo json_encode(array(
									'status' => 1,
									'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Data berhasil diupdate.</div>"
								));
							}
							else
							{
								echo json_encode(array(
									'status' => 2,
									'pesan' => "<div class='alert alert-danger'><i class='fa fa-cancel'></i> Data gagal diupdate.</div>"
								));
								//$this->query_error();
							}
					}
					else
					{
						$this->load->model('m_category');

						$dt['category'] 	= $this->m_category->get_baris($category_id)->row();
						$this->load->view('category/category_edit', $dt);
					}
				}
			}
		}
	}

	public function hapus($category_id)
	{
		//echo 'aasdfasdf'; exit;
		$level = $this->session->userdata('ap_level');
		if($level == 'admin' OR $level == 'inventory')
		{
			if($this->input->is_ajax_request())
			{
				$this->load->model('m_category');
				$hapus = $this->m_category->delete_category($category_id);
				//echo $hapus; exit;
				if($hapus)
				{
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Data berhasil dihapus !</font>
					"));
				}
				else
				{
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
					"));
				}
			}
		}
	}

}