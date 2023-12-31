<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value = '')
	{
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	function get_kod()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kd_keluar,3)) AS kd_max FROM tbl_keluar");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->kd_max) + 1;
				$kd = sprintf("%08s", $tmp);
			}
		} else {
			$kd = "001";
		}
		return "K" . $kd;
	}
	public function index()
	{
		$data['title'] = 'Parkir Keluar';
		$data['keluar'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk JOIN tbl_kendaraan ON tbl_masuk.kd_kendaraan = tbl_kendaraan.kd_kendaraan WHERE tgl_jam_keluar LIKE '" . date('Y-m-d') . "%' AND status_keluar LIKE '1'")->result_array();
		// die(print_r($data));
		$this->load->view('parkirkeluar', $data, FALSE);
	}
	public function kendaraankeluar($value = '')
	{
		$kode = str_replace("'", "", $this->input->post('karcis'));
		$member = str_replace("'", "", $this->input->post('member'));
		$sqlcek_member = $this->db->query("SELECT * FROM tbl_masuk RIGHT JOIN tbl_kendaraan ON tbl_masuk.kd_kendaraan = tbl_kendaraan.kd_kendaraan WHERE kd_member = '" . $member . "'")->row_array();
		$sqlcek = $this->db->query("SELECT * FROM tbl_masuk RIGHT JOIN tbl_kendaraan ON tbl_masuk.kd_kendaraan = tbl_kendaraan.kd_kendaraan WHERE kd_masuk = '" . $kode . "' AND status_masuk = '1' ")->row_array();
		if ($sqlcek['kd_masuk']) {
			// echo "ss";
			// die();
			if ($sqlcek['status_masuk'] == '1') {
				$awal  = strtotime($sqlcek['tgl_masuk']); //waktu awal
				$akhir = strtotime(date('Y-m-d H:i:s')); //waktu akhir
				$diff  = $akhir - $awal;
				$jam   = floor($diff / (60 * 60));
				$menit = $diff - $jam * (60 * 60);
				if ($jam <= 2) {
					$total = 1 * $sqlcek['harga_kendaraan'];
				} else {
					if ($sqlcek['nama_kendaraan'] == 'mobil') {
						$tambah = 1000;
						$nilai_max = 10000;
					} else if ($sqlcek['nama_kendaraan'] == 'motor') {
						$tambah = 500;
						$nilai_max = 5000;
					}
					$jam_tambah = $jam - 2;
					$total = ($jam_tambah * $tambah) + $sqlcek['harga_kendaraan'];
					if ($total > $nilai_max) {
						$total = $nilai_max;
					}
				}
				$where = array('kd_masuk' => $kode);
				$update = array('status_masuk' => 2);
				$this->db->update('tbl_masuk', $update, $where);
				$data = array(
					'kd_keluar' => $this->get_kod(),
					'kd_masuk'	=> $kode,
					'kd_member' => 'NULL',
					'tgl_jam_masuk' => $sqlcek['tgl_masuk'],
					'tgl_jam_keluar' => date("Y-m-d H:i:s", $akhir),
					'lama_parkir_keluar' =>  $jam .  ' Jam,' . floor($menit / 60) . ' Menit',
					'tarif_keluar' => $sqlcek['harga_kendaraan'],
					'total_keluar' => $total,
					'status_keluar' => 1,
					'create_keluar' => $this->session->userdata('nama_admin')
				);
				// die(print_r($data));
				$this->db->insert('tbl_keluar', $data);
				$data['cetak'] = $data;
				$data['tipe'] = $this->db->query("SELECT * FROM tbl_kendaraan WHERE kd_kendaraan = '" . $sqlcek['kd_kendaraan'] . "'")->row_array();
				// die(print_r($data));
				$this->load->view('strukparkir', $data);
				$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Karcis Keluar Selesai",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('keluar');
			} else {
				$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Sudah Keluar parkir",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('keluar');
			}
		} elseif ($sqlcek_member) {
			// echo "string";
			// die();
			if ($sqlcek_member['status_masuk'] == '1') {
				$awal  = strtotime($sqlcek_member['tgl_masuk']); //waktu awal
				$akhir = strtotime(date('Y-m-d H:i:s')); //waktu akhir
				$diff  = $akhir - $awal;
				$jam   = floor($diff / (60 * 60));
				$menit = $diff - $jam * (60 * 60);
				$where = array('kd_masuk' => $sqlcek_member['kd_masuk']);
				$update = array('status_masuk' => '2');
				$this->db->update('tbl_masuk', $update, $where);
				$data = array(
					'kd_keluar' => $this->get_kod(),
					'kd_member' => $sqlcek_member['kd_member'],
					'kd_masuk'	=> $sqlcek_member['kd_masuk'],
					'tgl_jam_masuk' => $sqlcek_member['tgl_masuk'],
					'tgl_jam_keluar' => date("Y-m-d H:i:s", $akhir),
					'lama_parkir_keluar' =>  $jam .  ' Jam,' . floor($menit / 60) . ' Menit',
					'tarif_keluar' => $sqlcek_member['harga_kendaraan'],
					'total_keluar' => 0,
					'status_keluar' => 1,
					'create_keluar' => $this->session->userdata('nama_admin')
				);
				// die(print_r($data));
				$this->db->insert('tbl_keluar', $data);
				// $data['cetak'] = $data;
				// $data['tipe'] = $this->db->query("SELECT * FROM tbl_kendaraan WHERE kd_kendaraan = '".$sqlcek_member['kd_kendaraan']."'")->row_array();
				// // die(print_r($data));
				// $this->load->view('strukparkir', $data);
				$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Member Keluar Selesai",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('keluar');
			} else {
				$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Member Sudah Ada Keluar",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('keluar');
			}
		} else {
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis/member Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
		}
	}
	public function historyplat()
	{
		$id = strtoupper($this->input->post('kode'));
		$sqlcek = $this->db->query("SELECT * FROM tbl_masuk WHERE plat_masuk = '" . $id . "'")->result_array();
		// die(print_r($sqlcek));
		if ($sqlcek) {
			print_r($sqlcek);
		} else {
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("No Plat Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
		}
	}
	public function cetakstruk($id = '')
	{
		$sqlcek = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_masuk.kd_masuk = tbl_masuk.kd_masuk WHERE kd_keluar = '" . $id . "'")->row_array();
		// die(print_r($sqlcek));
		if ($sqlcek) {
			$data['cetak'] = $sqlcek;
			$data['tipe'] = $this->db->query("SELECT * FROM tbl_kendaraan WHERE kd_kendaraan = '" . $sqlcek['kd_kendaraan'] . "'")->row_array();
			// die(print_r($data));
			$this->load->view('strukparkir', $data);
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Cetak Struk Selesai",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
		} else {
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
		}
	}
}

/* End of file Keluar.php */
/* Location: ./application/controllers/Keluar.php */