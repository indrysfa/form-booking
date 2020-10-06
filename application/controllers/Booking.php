<?php
class Booking extends CI_Controller {
    // public function __construct()
    // {
    //     // digunakan jika semua method ingin menggunakan database, karna semua sistem menggunakan database jadi database sudah ter autoload.php
    //     parent::__construct();
    //     $this->load->database();
    // }

    public function __construct()
    {
        // digunakan jika semua method ingin menggunakan model
        parent::__construct();
        $this->load->model('m_booking');
        $this->load->library('form_validation');
    }
    public function index()
    {
        // koneksi database
        // $this->load->database();
        
        $data['judul'] = 'Booking Order';
        $data['booking'] = $this->m_booking->getAllBooking();
        $this->load->view('templates/header', $data);
        $this->load->view('booking/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Add Booking Order';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if( $this->form_validation->run() == FALSE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('booking/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_booking->tambahDatabooking();
            $this->session->set_flashdata('flash', 'Added');
            redirect('booking');
        }
    }

    public function hapus($id)
    {
        $this->m_booking->hapusDatabooking($id);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('booking');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Booking Order';
        $data['booking'] = $this->m_booking->getBookingById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('booking/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Edit Booking Order';
        $data['booking'] = $this->m_booking->getBookingById($id);
        $data['jurusan'] = ['Teknik Informatika', 'Sistem Informasi', 'Manajemen Akuntansi', 'Manajemen Pemasaran', 'Sastra Inggris', 'Sastra Korea'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if( $this->form_validation->run() == FALSE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('booking/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_booking->ubahDataBooking();
            $this->session->set_flashdata('flash', 'Changed');
            redirect('booking');
        }
    }
}