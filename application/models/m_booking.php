<?php

class m_booking extends CI_model {
    public function getAllBooking()
    {
       return $this->db->get('booking')->result_array();
    }

    public function tambahDataBooking()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ]; 
    
    $this->db->insert('booking', $data);
    }

    public function hapusDataBooking($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('booking', ['id' => $id]);
    }

    public function getBookingById($id)
    {
        return $this->db->get_where('booking', ['id' => $id])->row_array();
    }

    public function ubahDataBooking()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('booking', $data);
    }
}