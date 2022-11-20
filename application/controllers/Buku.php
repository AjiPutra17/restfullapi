<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api = "http://localhost/restfullapi/api/buku/";
        $this->load->library('Curl.php');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index()
    {
        $data['buku'] = json_decode($this->curl->simple_get($this->api), true);
        $this->load->view('main', $data);
    }

    function create()
    {
        $data = array(
            'isbn' => $this->input->post('isbn'),
            'judul_buku' => $this->input->post('judul_buku'),
            'pengarang' => $this->input->post('pengarang'),
            'tahun_terbit' => $this->input->post('tahun_terbit')
        );
        if ($data['isbn'] != '') {
            $insert = $this->curl->simple_post($this->api . '/add', $data, array(CURLOPT_BUFFERSIZE => 10));
            redirect('buku');
        } else {
            redirect('buku');
        }
    }

    function edit()
    {
        $isbn = $this->input->post('isbn');
        $data = array(
            'judul_buku' => $this->input->post('judul_buku'),
            'pengarang' => $this->input->post('pengarang'),
            'tahun_terbit' => $this->input->post('tahun_terbit')
        );
        $update = $this->curl->simple_put($this->api . '/update/' . $isbn, $data, array(CURLOPT_BUFFERSIZE => 10));
        redirect('buku');
    }

    function delete($isbn)
    {
        if (empty($isbn)) {
            redirect('buku');
        } else {
            $isbn = $this->uri->segment(3);
            $data['buku'] = json_decode($this->curl->simple_delete($this->api . '/delete/' . $isbn), true);
            redirect('buku');
        }
    }
}
