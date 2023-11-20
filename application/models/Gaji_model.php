<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model {

    public function tambahGaji($data)
    {
        // Insert data ke dalam tabel 'tbl_gaji'
        $this->db->insert('tbl_gaji', $data);
    }
    public function calculateTotalGaji($gaji_pokok, $biaya_makan, $biaya_transport) {
        // Hitung total gaji = Gaji Pokok + Biaya Makan + Biaya Transport
        $total_gaji = $gaji_pokok + $biaya_makan + $biaya_transport;
        return $total_gaji;
    }
    
}
