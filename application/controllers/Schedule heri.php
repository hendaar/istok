<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Model_schedule');

        if ($this->session->userdata('login') == TRUE) {
			if ($this->session->userdata('login_app') <> 'istok') {
				$this->session->sess_destroy();
				redirect('login');
			}
		} else {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	
	public function index()	{
		$datasesion = array(
			'user_id' => $this->session->userdata('user_id'),
			'user_level' => $this->session->userdata('user_level'),
			'user_name' => $this->session->userdata('user_name'),
			'user_name_full' => $this->session->userdata('user_name_full')
		);
		
		$data = array(
			'user_id' => $this->session->userdata('user_id'),
			'user_level' => $this->session->userdata('user_level'),
			'user_name' => $this->session->userdata('user_name'),
			'user_name_full' => $this->session->userdata('user_name_full')
		);
		
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$data['tanggal'] = $tanggal;
		$data['bulan'] = substr($tanggal,-2);
		$data['tahun'] = date('Y');
		
		// storage 1
		$data_mst_storage = $this->Model_schedule->get_mst_storage('1');
		$storage_name=''; $storage_height=0;
		foreach ($data_mst_storage as $row) {
			$storage_name = $row->storage_name;
			$storage_height = $row->storage_height;
		}
		$data['s1_storage_name'] = $storage_name;
		$data['s1_storage_height'] = $storage_height;
		
		// storage 2
		$data_mst_storage = $this->Model_schedule->get_mst_storage('2');
		$storage_name=''; $storage_height=0;
		foreach ($data_mst_storage as $row) {
			$storage_name = $row->storage_name;
			$storage_height = $row->storage_height;
		}
		$data['s2_storage_name'] = $storage_name;
		$data['s2_storage_height'] = $storage_height;
		
		// storage 3
		$data_mst_storage = $this->Model_schedule->get_mst_storage('3');
		$storage_name=''; $storage_height=0;
		foreach ($data_mst_storage as $row) {
			$storage_name = $row->storage_name;
			$storage_height = $row->storage_height;
		}
		$data['s3_storage_name'] = $storage_name;
		$data['s3_storage_height'] = $storage_height;
		
		// parameter 1
		$data_mst_parameter = $this->Model_schedule->get_mst_parameter('1');
		$parameter_name=''; $lead_time=0; $dead_stock=0; $average_distribution=0; $average_distribution_max=0;
		$safety_stock=0; $reorder_point=0; $stock_max=0; $stock_min=0;
		foreach ($data_mst_parameter as $row) {
			$parameter_name = $row->parameter_name;
			$lead_time = $row->lead_time;
			$dead_stock = $row->dead_stock;
			$average_distribution = $row->average_distribution;
			$average_distribution_max = $row->average_distribution_max;
			$safety_stock = $row->safety_stock;
			$reorder_point = $row->reorder_point;
			$stock_max = $row->stock_max;
			$stock_min = $row->stock_min;
		}
		$data['s1_parameter_name'] = $parameter_name;
		$data['s1_lead_time'] = $lead_time;
		$data['s1_dead_stock'] = $dead_stock;
		$data['s1_average_distribution'] = $average_distribution;
		$data['s1_average_distribution_max'] = $average_distribution_max;
		$data['s1_safety_stock'] = $safety_stock;
		$data['s1_reorder_point'] = $reorder_point;
		$data['s1_stock_max'] = $stock_max;
		$data['s1_stock_min'] = $stock_min;
		
		// parameter 2
		$data_mst_parameter = $this->Model_schedule->get_mst_parameter('2');
		$parameter_name=''; $lead_time=0; $dead_stock=0; $average_distribution=0; $average_distribution_max=0;
		$safety_stock=0; $reorder_point=0; $stock_max=0; $stock_min=0;
		foreach ($data_mst_parameter as $row) {
			$parameter_name = $row->parameter_name;
			$lead_time = $row->lead_time;
			$dead_stock = $row->dead_stock;
			$average_distribution = $row->average_distribution;
			$average_distribution_max = $row->average_distribution_max;
			$safety_stock = $row->safety_stock;
			$reorder_point = $row->reorder_point;
			$stock_max = $row->stock_max;
			$stock_min = $row->stock_min;
		}
		$data['s2_parameter_name'] = $parameter_name;
		$data['s2_lead_time'] = $lead_time;
		$data['s2_dead_stock'] = $dead_stock;
		$data['s2_average_distribution'] = $average_distribution;
		$data['s2_average_distribution_max'] = $average_distribution_max;
		$data['s2_safety_stock'] = $safety_stock;
		$data['s2_reorder_point'] = $reorder_point;
		$data['s2_stock_max'] = $stock_max;
		$data['s2_stock_min'] = $stock_min;
		
		// parameter 3
		$data_mst_parameter = $this->Model_schedule->get_mst_parameter('3');
		$parameter_name=''; $lead_time=0; $dead_stock=0; $average_distribution=0; $average_distribution_max=0;
		$safety_stock=0; $reorder_point=0; $stock_max=0; $stock_min=0;
		foreach ($data_mst_parameter as $row) {
			$parameter_name = $row->parameter_name;
			$lead_time = $row->lead_time;
			$dead_stock = $row->dead_stock;
			$average_distribution = $row->average_distribution;
			$average_distribution_max = $row->average_distribution_max;
			$safety_stock = $row->safety_stock;
			$reorder_point = $row->reorder_point;
			$stock_max = $row->stock_max;
			$stock_min = $row->stock_min;
		}
		$data['s3_parameter_name'] = $parameter_name;
		$data['s3_lead_time'] = $lead_time;
		$data['s3_dead_stock'] = $dead_stock;
		$data['s3_average_distribution'] = $average_distribution;
		$data['s3_average_distribution_max'] = $average_distribution_max;
		$data['s3_safety_stock'] = $safety_stock;
		$data['s3_reorder_point'] = $reorder_point;
		$data['s3_stock_max'] = $stock_max;
		$data['s3_stock_min'] = $stock_min;
		
		$this->Model_schedule->delete_trans_forecast();

		// proses forecast 1
		$max_id = $this->Model_schedule->max_trans_forecast();
		$this->forecast_recalculate('1', $max_id);
		
		// proses forecast 2
		$max_id = $this->Model_schedule->max_trans_forecast();
		$this->forecast_recalculate('2', $max_id);

		// proses forecast 3
		$max_id = $this->Model_schedule->max_trans_forecast();
		$this->forecast_recalculate('3', $max_id);
		
		// forecast 1
		$data_forecast = $this->Model_schedule->get_trans_forecast('1');
		$data['s1_forecast'] = $data_forecast;
		
		// forecast 2
		$data_forecast = $this->Model_schedule->get_trans_forecast('2');
		$data['s2_forecast'] = $data_forecast;
		
		// forecast 3
		$data_forecast = $this->Model_schedule->get_trans_forecast('3');
		$data['s3_forecast'] = $data_forecast;
		
		$this->load->view('header', $datasesion);
		$this->load->view('schedule',$data);
		$this->load->view('footer');
	}
	
	function forecast_recalculate($id, $max_id) {
		// cek volume atg terkini
		$data_trans_atg = $this->Model_schedule->get_trans_atg($id);
		$atg_volume=0;
		foreach ($data_trans_atg as $row) {
			$atg_volume = $atg_volume + $row->volume;
		}
		
		// update parameter
		$data = array(
			'stock_realtime' => $atg_volume
		);		
		$this->Model_schedule->update_mst_parameter($data, $id);
		
		// cek parameter
		$data_mst_parameter = $this->Model_schedule->get_mst_parameter($id);
		$stock_realtime=0; $stock_min=0; $stock_distribution_parameter=0; $stock_distribution_max_parameter=0;
		foreach ($data_mst_parameter as $row) {
			$stock_realtime = $row->stock_realtime;
			$stock_min = $row->stock_min;
			$stock_distribution_parameter = $row->average_distribution;
			$stock_distribution_max_parameter = $row->average_distribution_max;
		}
		
		if ($max_id != null) {
			$trans_id = $max_id;			
		} else {
			$trans_id = 0;
		}
		
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$tanggal_sekarang = date('Y-m-d');
		
		// create forecast
		for ($i=1; $i<=30; $i++) {
			// cek stok bulan sebelumnya di tanggal yg sama
			$time = strtotime($tanggal);
			$tanggal_bef = date("Y-m-d", strtotime("-1 month", $time));
			
			if ($tanggal==$tanggal_sekarang) {
				$stock_distribution = rand($stock_distribution_parameter,$stock_distribution_max_parameter);
				
				$data_po = $this->Model_schedule->get_trans_po($id,$tanggal);
				$eta_schedule = 0; $po_res_number=''; $barge_id=0;
				foreach ($data_po as $row) {
					$eta_schedule = $row->quantity;
					$po_res_number = $row->po_res_number;
					$barge_id = $row->barge_id;
				}
			} else {
				$stock_distribution = rand($stock_distribution_parameter,$stock_distribution_max_parameter);
				
				$data_po = $this->Model_schedule->get_trans_po($id,$tanggal);
				$eta_schedule = 0; $po_res_number=''; $barge_id=0;
				foreach ($data_po as $row) {
					$eta_schedule = $row->quantity;
					$po_res_number = $row->po_res_number;
					$barge_id = $row->barge_id;
				}
				
				$stock_realtime=$stock_realtime+$eta_schedule-$stock_distribution;
				
				// jika inv. kurang dari min. stok cek kapal
				if ($stock_realtime < $stock_min) {
					
					$data_last = $this->Model_schedule->get_trans_forecast_last($id);
					$prioritas = 0;
					foreach ($data_last as $row) {
						$prioritas = $row->prioritas;
					}
					
					$prioritas_max = $this->Model_schedule->max_mst_barge_prioritas($id);
					if ($prioritas==$prioritas_max) {
						$prioritas = 0;
					}

					$data_barge = $this->Model_schedule->get_mst_barge($id, $prioritas);
					foreach ($data_barge as $row) {
						$barge_id = $row->barge_id;
						$eta_schedule = $row->volume;
					}
					
					$stock_realtime=$stock_realtime+$eta_schedule-$stock_distribution;

					// tampilkan query
					// $this->output->enable_profiler(TRUE);
				}
			}			

			$data = array(
				'trans_id' => ($trans_id + $i),
				'trans_date' => $tanggal,
				'inventory' => $stock_realtime,
				'distribution' => $stock_distribution,
				'eta_schedule' => $eta_schedule,
				'po_res_number' => $po_res_number,
				'barge_id' => $barge_id,
				'storage_id' => $id
			);
			$this->Model_schedule->insert_trans_forecast($data);
			
			// $stock_realtime=$stock_realtime-$stock_distribution;
			
			$date=date_create($tanggal);
			date_add($date,date_interval_create_from_date_string("1 days"));
			$tanggal = date_format($date,"Y-m-d");
        }		
	}
	
	function logout(){
			$this->session->sess_destroy();
			redirect(base_url('login'));
	}
}
