<?php
class ModelBuku extends CI_Model
{
    public function get_buku()
    {
        $query = $this->db->get('detail_buku');
        return $query->result();
    }

    public function get_buku_Byid($isbn)
    {
        $this->db->where('isbn', $isbn);
        $query = $this->db->get('detail_buku');
        return $query->row();
    }

    public function post_buku($data)
    {
        return $this->db->insert('detail_buku', $data);
    }

    public function put_buku($isbn, $data)
    {
        $this->db->where('isbn', $isbn);
        return $this->db->update('detail_buku', $data);
    }

    public function del_buku($isbn)
    {
        return $this->db->delete('detail_buku', ['isbn' => $isbn]);
    }
}
