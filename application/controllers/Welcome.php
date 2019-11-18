<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
//		if (!$this->session->has_userdata('session_id')) {
//			redirect(base_url('login'));
//		}
		$this->load->model('KuesionerModel','kuesioner');
		$this->load->model('FaktorModel','faktor');
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function beranda(){
		$this->load->view('templates/header');
		$this->load->view('beranda');
		$this->load->view('templates/footer');
	}
	public function grafik($responden){
		$data = array(
			'grafik' => $this->kuesioner->lihat_detail_grafik($responden),
			'faktor' => $this->faktor->lihat_semua()
		);
		echo json_encode($data);
	}
	public function grafik_semua(){
		$data = array(
			'grafik' => $this->kuesioner->lihat_semua_detail(),
			'faktor' => $this->faktor->lihat_semua()
		);
		echo json_encode($data);
	}
}
