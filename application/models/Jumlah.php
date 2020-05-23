<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jumlah extends CI_Model
{
    function hitung_pengguna()
    {
        return $this->db->get('detail_pengguna')->num_rows();
    }

    function hitung_toko()
    {
        return $this->db->get('detail_toko')->num_rows();
    }

    function hitung_pengemudi()
    {
        return $this->db->get('detail_pengemudi')->num_rows();
    }

    function hitung_kbrg()
    {
        return $this->db->get('kategori_barang')->num_rows();
    }

    function hitung_nbrg()
    {
        return $this->db->get('detail_nama_barang')->num_rows();
    }

    function hitung_mbrg()
    {
        return $this->db->get('detail_merk_barang')->num_rows();
    }

    function hitung_mkendaraan()
    {
        return $this->db->get('merk_kendaraan')->num_rows();
    }

    function hitung_nkendaraan()
    {
        return $this->db->get('detail_nama_kendaraan')->num_rows();
    }

    function hitung_kendaraan()
    {
        return $this->db->get('detail_kendaraan')->num_rows();
    }

    function hitung_rak()
    {
        return $this->db->get('detail_rak')->num_rows();
    }

    function hitung_lorong()
    {
        return $this->db->get('lorong')->num_rows();
    }

    function hitung_asal()
    {
        return $this->db->get('asal_barang')->num_rows();
    }

    function hitung_tujuan()
    {
        return $this->db->get('tujuan')->num_rows();
    }

    function hitung_bkeluar()
    {
        return $this->db->get('barang_keluar')->num_rows();
    }

    function hitung_bmasuk()
    {
        return $this->db->get('detail_barang_masuk')->num_rows();
    }

    function hitung_barang()
    {
        return $this->db->get('stok_barang')->num_rows();
    }

    function hitung_pemesanan()
    {
        return $this->db->get_where('pemesanan', ['status_pemesanan' => 1])->num_rows();
    }
}
