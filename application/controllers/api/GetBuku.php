<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class GetBuku extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBuku');
    }

    public function index_get()
    {
        $bk = new ModelBuku;
        $resultbk = $bk->get_buku();
        $this->response($resultbk, 200);
    }

    public function BukuById_get($isbn)
    {
        $bk = new ModelBuku;
        $resultbk = $bk->get_buku_Byid($isbn);
        $this->response($resultbk, 200);
    }

    public function AddBuku_post()
    {
        $bk = new ModelBuku;
        $data = [
            'isbn' => $this->input->post('isbn'),
            'judul_buku' => $this->input->post('judul_buku'),
            'pengarang' => $this->input->post('pengarang'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
        ];
        $addbk = $bk->post_buku($data);
        if ($addbk > 0) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Insert Berhasil'
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Insert Gagal'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function UpdateBuku_put($isbn)
    {
        $bk = new ModelBuku;
        $data = [
            'judul_buku' => $this->put('judul_buku'),
            'pengarang' => $this->put('pengarang'),
            'tahun_terbit' => $this->put('tahun_terbit'),
        ];
        $putbk = $bk->put_buku($isbn, $data);
        if ($putbk > 0) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Update Berhasil'
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Update Gagal'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function DeleteBuku_delete($isbn)
    {
        $bk = new ModelBuku;
        $delbk = $bk->del_buku($isbn);
        if ($delbk > 0) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Delete Berhasil'
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Delete Gagal'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
