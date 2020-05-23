<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminG_barang_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_stok');
        $this->load->model('barang_keluar');
        $this->load->model('pengemudi');
        $this->load->model('lorong');
        $this->load->model('kendaraan');
        $this->load->model('tujuan');
        $this->load->model('token');
        $this->load->model('m_pemesanan');
        $this->load->model('toko');
    }

    function form_kategori($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['nama_ktgr_brg'];
            }
        }
    }

    function form_nama($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['nama_barang'];
            }
        }
    }

    function form_merk($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['nama_merk_barang'];
            }
        }
    }

    function form_stok($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['stok_barang'];
            }
        }
    }

    function form_panjang($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['panjang_barang'];
            }
        }
    }

    function form_lebar($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['lebar_barang'];
            }
        }
    }

    function form_tinggi($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['tinggi_barang'];
            }
        }
    }

    function form_idktgr($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['id_ktgr_brg'];
            }
        }
    }

    function form_idnb($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['id_nama_barang'];
            }
        }
    }

    function form_idmb($id = "")
    {
        $cid    = ['id_barang' => $id];
        $data   = $this->barang_stok->get1barangkhusus($cid);

        if ($id == "") {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            foreach ($data as $b) {
                echo $b['id_merk_barang'];
            }
        }
    }

    function insert_data_keluar()
    {
        $this->form_validation->set_rules('jbrgkel', 'Jumlah Barang Keluar', 'trim|required|greater_than[0]|numeric|integer');

        if ($this->form_validation->run() ==  FALSE) {
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        } else {
            $idbk       = $this->barang_keluar->maxbkid();
            $idb        = $this->input->post('barang');
            $kb         = $this->input->post('idkbrg');
            $nb         = $this->input->post('idnbrg');
            $mb         = $this->input->post('idmbrg');
            $stok       = $this->input->post('jbrg');
            $out        = $this->input->post('jbrgkel');
            $sisa       = $stok - $out;
            $panjang    = $this->input->post('pbrg');
            $lebar      = $this->input->post('lbrg');
            $tinggi     = $this->input->post('tbrg');
            $dimensi    = $panjang * $lebar * $tinggi;
            $total      = $out * $dimensi;
            date_default_timezone_set("Asia/Jakarta");
            $wklr       = date("Y-m-d H:i:s");

            $where      = ['status_barang' => 0];
            $bk         = $this->barang_keluar->get1bk($where);
            foreach ($bk as $b) {
                $hbks = $b['status_barang'];
                $hbkk = $b['id_pengemudi'];
                $hbki = $b['id_barang_keluar'];
            }

            if ($hbks == null && $hbkk == null) {
                $data   = [
                    'id_barang_keluar'  => $idbk,
                    'waktu_keluar'      => $wklr,
                    'status_barang'     => 0
                ];
                $this->barang_keluar->insertbk($data);
                $bk     = $this->barang_keluar->get1bk($where);
                foreach ($bk as $b) {
                    $hbki = $b['id_barang_keluar'];
                }
                $data2  = [
                    'id_barang_keluar'  => $hbki,
                    'id_barang'         => $idb,
                    'id_ktgr_brg'       => $kb,
                    'id_nama_barang'    => $nb,
                    'id_merk_barang'    => $mb,
                    'jmlh_brg_klr'      => $out,
                    'dimensi_barang'    => $dimensi,
                    'total_dimensi'     => $total
                ];
                $this->barang_keluar->insertpengeluaran($data2);
                $data3  = [
                    'stok_barang'       => $sisa
                ];
                $bid    = ['id_barang' => $idb];
                $this->barang_stok->update_bs($bid, $data3);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
                redirect('ag/adminG_barang_lorong/hal_kirim_barang');
            } else {
                $data2  = [
                    'id_barang_keluar'  => $hbki,
                    'id_barang'         => $idb,
                    'id_ktgr_brg'       => $kb,
                    'id_nama_barang'    => $nb,
                    'id_merk_barang'    => $mb,
                    'jmlh_brg_klr'      => $out,
                    'dimensi_barang'    => $dimensi,
                    'total_dimensi'     => $total
                ];
                $this->barang_keluar->insertpengeluaran($data2);
                $data3  = [
                    'stok_barang'       => $sisa
                ];
                $bid    = ['id_barang' => $idb];
                $this->barang_stok->update_bs($bid, $data3);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
                redirect('ag/adminG_barang_lorong/hal_kirim_barang');
            }
        }
    }

    function hal_pilih_supir($id)
    {
        $cid    = ['id_barang_keluar'   => $id];
        $cdp    = ['status_pengemudi'   => 0];
        $tid    = ['status_pemesanan'   => 1];
        $d      = [
            'name'          => $this->session->userdata('nama'),
            'bkeluar'       => $this->barang_keluar->get1dp($cid),
            'lorong'        => $this->lorong->data_lorong(),
            'pengemudi'     => $this->pengemudi->get1pengemudikosong($cdp),
            'toko'          => $this->m_pemesanan->getdetailpemesanan($tid)
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/barang_keluar/pemilihan_supir', $d);
        $this->load->view('layouts/ag/footer');
    }

    function progres_pengiriman($id)
    {
        $lorong     = $this->input->post('lorong');
        $pengemudi  = $this->input->post('pengemudi');
        $totdim     = $this->input->post('totdim');
        $toko       = $this->input->post('toko');
        $cid        = ['id_barang_keluar' => $id];

        $cl         = $this->lorong->data_lorong();
        foreach ($cl as $lor) {
            if ($lor['id_lorong'] == $lorong) {
                $tujuan = $lor['id_tujuan'];
            }
        }

        $kendaraan  = $this->kendaraan->data_kendaraan();
        $pertama = array_column($kendaraan, 'id_kendaraan');
        $truk = [];

        if ($totdim >= 1 && $totdim <= 2592000) {
            foreach ($kendaraan as $c) {
                if ($c['kapasitas'] >= 1 && $c['kapasitas'] <= 2592000) {
                    if ($c['status_kendaraan'] == 0) {
                        foreach ($pertama as $awal) {
                            if ($awal == $c['id_kendaraan']) {
                                $truk[] = $c['id_kendaraan'];
                                $hitung = count($truk);
                                if ($hitung >= 1) {
                                    $ken = $truk[0];
                                    $kapasitas = $c['kapasitas'];
                                } else {
                                    $ken = $c['id_kendaraan'];
                                    $kapasitas = $c['kapasitas'];
                                }
                            }
                            // else {
                            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan</div>');
                            //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                            // }
                        }
                    }
                    // else {
                    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Tersedia</div>');
                    //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                    // }
                }
                // else {
                //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1Tidak Ada Kendaraan Yang Mencukupi</div>');
                //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                // }
            }
        } elseif ($totdim >= 2592001 && $totdim <= 4738000) {
            foreach ($kendaraan as $c) {
                if ($c['kapasitas'] >= 2592001 && $c['kapasitas'] <= 4738000) {
                    if ($c['status_kendaraan'] == 0) {
                        foreach ($pertama as $awal) {
                            if ($awal == $c['id_kendaraan']) {
                                $truk[] = $c['id_kendaraan'];
                                $hitung = count($truk);
                                if ($hitung >= 1) {
                                    $ken = $truk[0];
                                    $kapasitas = $c['kapasitas'];
                                } else {
                                    $ken = $c['id_kendaraan'];
                                    $kapasitas = $c['kapasitas'];
                                }
                            }
                            // else {
                            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan</div>');
                            //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                            // }
                        }
                    }
                    // else {
                    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Tersedia</div>');
                    //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                    // }
                }
                // else {
                //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">2Tidak Ada Kendaraan Yang Mencukupi</div>');
                //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                // }
            }
        } elseif ($totdim >= 4738001 && $totdim <= 24640000) {
            foreach ($kendaraan as $c) {
                if ($c['kapasitas'] >= 4738001 && $c['kapasitas'] <= 24640000) {
                    if ($c['status_kendaraan'] == 0) {
                        foreach ($pertama as $awal) {
                            if ($awal == $c['id_kendaraan']) {
                                $truk[] = $c['id_kendaraan'];
                                $hitung = count($truk);
                                if ($hitung >= 1) {
                                    $ken = $truk[0];
                                    $kapasitas = $c['kapasitas'];
                                } else {
                                    $ken = $c['id_kendaraan'];
                                    $kapasitas = $c['kapasitas'];
                                }
                            }
                            //else {
                            //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan</div>');
                            //             redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                            //         }
                        }
                    }
                    // else {
                    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Tersedia</div>');
                    //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                }
            }
            //else {
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Yang Mencukupi</div>');
            //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
            //}
            //}
        } elseif ($totdim >= 24640002 && $totdim <= 31878000) {
            foreach ($kendaraan as $c) {
                if ($c['kapasitas'] >= 24640001 && $c['kapasitas'] <= 31878000) {
                    if ($c['status_kendaraan'] == 0) {
                        foreach ($pertama as $awal) {
                            if ($awal == $c['id_kendaraan']) {
                                $truk[] = $c['id_kendaraan'];
                                $hitung = count($truk);
                                if ($hitung >= 1) {
                                    $ken = $truk[0];
                                    $kapasitas = $c['kapasitas'];
                                } else {
                                    $ken = $c['id_kendaraan'];
                                    $kapasitas = $c['kapasitas'];
                                }
                            }
                            // else {
                            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan</div>');
                            //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                            // }
                        }
                    }
                    // else {
                    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Tersedia</div>');
                    //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                    // }
                }
                // else {
                //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Yang Mencukupi</div>');
                //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                // }
            }
        } elseif ($totdim >= 31878001 && $totdim <= 63480000) {
            foreach ($kendaraan as $c) {
                if ($c['kapasitas'] >= 31878001 && $c['kapasitas'] <= 63480000) {
                    if ($c['status_kendaraan'] == 0) {
                        foreach ($pertama as $awal) {
                            if ($awal == $c['id_kendaraan']) {
                                $truk[] = $c['id_kendaraan'];
                                $hitung = count($truk);
                                if ($hitung >= 1) {
                                    $ken = $truk[0];
                                    $kapasitas = $c['kapasitas'];
                                } else {
                                    $ken = $c['id_kendaraan'];
                                    $kapasitas = $c['kapasitas'];
                                }
                            }
                            // else {
                            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan</div>');
                            //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                            // }
                        }
                    }
                    // else {
                    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Tersedia</div>');
                    //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
                    //}
                }
                // else {
                //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Kendaraan Yang Mencukupi</div>');
                //     redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Volume Barang Sangat Besar</div>');
            redirect('ag/adminG_barang_keluar/hal_pilih_supir/' . $id);
        }

        $tokoid = ['id_toko' => $toko];
        $tk = $this->toko->get1toko($tokoid);
        foreach ($tk as $t) {
            if ($t['id_toko'] == $toko) {
                $notel_toko = $t['notel_toko'];
                $alamat_toko = $t['alamat_toko'];
            }
        }
        //toko

        $pe = $this->pengemudi->data_pengemudi();
        foreach ($pe as $p) {
            if ($p['id_pengemudi'] == $pengemudi) {
                $email  = $p['email_pengemudi'];
                $np     = $p['nama'];
                $nohp   = $p['no_hp_penggemudi'];
            }
        }
        //Pengemudi

        foreach ($kendaraan as $kn) {
            if ($kn['id_kendaraan'] == $ken) {
                $trns = $kn['no_kendaraan'];
            }
        }
        //noKendaraan

        $tjn = $this->tujuan->data_tujuan();
        foreach ($tjn as $tj) {
            if ($tj['id_tujuan'] == $tujuan) {
                $tuj = $tj['nama_lokasi_tujuan'];
            }
        }
        //getTujuanID

        if ($totdim == $kapasitas) {
            $token = base64_encode(random_bytes(6));
            $data_token = [
                'id_pengemudi' => $pengemudi,
                'token' => $token
            ];
            $this->token->insert_token($data_token);
            //token

            $databk = [
                'id_lorong'     => $lorong,
                'id_pengemudi'  => $pengemudi,
                'id_kendaraan'  => $ken,
                'id_tujuan'     => $tujuan,
                'status_barang' => 1
            ];
            $this->barang_keluar->updatebk($cid, $databk);
            //Barang Keluar

            $datap  = [
                'status_pengemudi'  => 1
            ];
            $this->pengemudi->ubahpengemudi($pengemudi, $datap);
            //Pengemudi

            $datak  = [
                'status_kendaraan'  => 1
            ];
            $kid    = ['id_kendaraan' => $ken];
            $this->kendaraan->ubahkendaraan($kid, $datak);
            //kendaraan

            $datapesan = [
                'status_pemesanan'  => 2
            ];
            $this->m_pemesanan->updatepemesanan($tokoid, $datapesan);
            //Pemesan

            $this->kirimtoken($notel_toko, $token);
            $this->kirim_mail($email, $np, $alamat_toko, $trns);
            $this->kirimwa($nohp, $np, $alamat_toko, $trns);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Siap Dikirim</div>');
            redirect('ag/adminG_halaman/barangkeluar');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Truck Masih Ada Tempat Kosong</div>');
            redirect('ag/adminG_barang_lorong/hal_kirim_barang');
        }
    }

    private function kirim_mail($mail, $np, $tjn, $kndr)
    {
        $config = [
            'mail_type' => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'proyek3nicoharun@gmail.com',
            'smtp_pass' => 'proyek3sem5',
            'smtp_crypto' => 'ssl',
            'smtp_port' => 465,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('proyek3nicoharun@gmail.com', 'Sumber Alfaria Trijaya');
        $this->email->to($mail);
        $this->email->subject('Pengiriman Barang');
        $this->email->message('
    Kepada Yang Terhormat
    Mr. ' . $np . '

    Anda Mendapat Tugas Untuk Mengantar Barang Dengan Keterangan Sebagai Berikut :
    Tujuan : ' . $tjn . '
    No Kendaraan : ' . $kndr . '
    Segera Menuju Kendaraan Anda Untuk Mengantar Tugas
                        Bandung, ' . date('d M Y') . '
                                Mengetahui


                               Manajer Gudang');
        $this->email->send();
    }

    private function kirimtoken($notel_toko, $token)
    {
        $my_apikey = "1O2P3DX53N4JN48FWNNX";
        //$destination = "+6281361327635";
        $message = "Berikut adalah kode token yang diberikan kepada supir, jika barang anda telah sampai. " . $token;
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($notel_toko);
        $api_url .= "&text=" . urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
    }

    private function kirimwa($nohp, $np, $tjn, $kndr)
    {
        $my_apikey = "1O2P3DX53N4JN48FWNNX";
        //$destination = "+6281361327635";
        $message = 'Kepada Yang Terhormat
        Mr. ' . $np . '
    
        Anda Mendapat Tugas Untuk Mengantar Barang Dengan Keterangan Sebagai Berikut :
        Tujuan : ' . $tjn . '
        No Kendaraan : ' . $kndr . '
        Segera Menuju Kendaraan Anda Untuk Mengantar Tugas
                            Bandung, ' . date('d M Y') . '
                                    Mengetahui
    
    
                                   Manajer Gudang';
        $api_url = "https://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($nohp);
        $api_url .= "&text=" . urlencode($message);
        $options = stream_context_create(
            array(
                'http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                )
            )
        );
        $response = file_get_contents($api_url, false, $options);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang Siap Dikirim</div>');
        redirect('ag/adminG_halaman/barangkeluar');
    }
}
