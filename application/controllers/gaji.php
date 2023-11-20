<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat pustaka database CodeIgniter
        $this->load->model('Gaji_model');
        $this->load->library("session");
        $this->load->library('form_validation'); // Load the form_validation library
        $this->load->helper('url');
        error_reporting(0);
    }

    public function index()
    {
        $data['title'] = 'List Gaji';
        $data['gajiPetugas'] = $this->db->get('tbl_gaji')->result_array();
        $this->load->view('gaji', $data);
    }

    public function tambahGajiView()
    {
        $this->load->view('tambahGaji');
    }


    public function tambahGaji()
    {
        // Ambil data dari form (misalnya menggunakan POST method)
        $kd_petugas = $this->input->post('kd_petugas');
        $nama_petugas = $this->input->post('nama_petugas');
        $gaji_pokok = $this->input->post('gaji_pokok');
        $biaya_makan = 25000;
        $biaya_transport = 15000;

        // Hitung total gaji menggunakan method dari model
        $this->load->model('Gaji_model');
        $total_gaji = $this->Gaji_model->calculateTotalGaji($gaji_pokok, $biaya_makan, $biaya_transport);

        // Simpan data gaji petugas ke dalam database
        $data_gaji = array(
            'kd_petugas' => $kd_petugas,
            'nama_petugas' => $nama_petugas,
            'gaji_pokok' => $gaji_pokok,
            'biaya_makan' => $biaya_makan,
            'biaya_transport' => $biaya_transport,
            'total_gaji' => $total_gaji
        );

        $this->db->insert('tbl_gaji', $data_gaji);

        // Setelah data disimpan, kembalikan ke halaman utama
        redirect(base_url('gaji'));
    }


    public function delete($id = '')
    {
        $sqlcek = $this->db->query("SELECT * FROM tbl_gaji WHERE kd_petugas = '" . $id . "'")->row_array();
        if ($sqlcek) {
            $this->db->where('kd_petugas', $id);
            $this->db->delete('tbl_gaji');
            $this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Data Gaji Berhasil Dihapus",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
            redirect('gaji');
        } else {
            $this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Data Gaji Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
            redirect('gaji');
        }
    }
    public function view($id = NULL)
    {
        $sqlcek = $this->db->query("SELECT * FROM tbl_gaji WHERE kd_petugas = $id")->row_array();
        if ($sqlcek) {
            $data['title'] = 'View Gaji';
            $data['gaji'] = $sqlcek;
            // die(print_r($data));
            $this->load->view('viewgaji', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'swal("Gagal", "Data Gaji Tidak Ada", "error");');
            redirect('gaji');
        }
    }
}
