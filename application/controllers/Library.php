<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load Grocery CRUD library - nama class bisa beda tergantung versi
        $this->load->library('Grocery_CRUD'); // atau 'grocery_crud' sesuai versi
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        // redirect to books
        redirect('library/books');
    }

    public function books()
    {
        try {
            $crud = new Grocery_CRUD();
            $crud->set_table('books');
            $crud->set_subject('Buku');
            $crud->columns('title','author','publisher','year','quantity');
            $crud->display_as('title','Judul')
                 ->display_as('author','Penulis')
                 ->display_as('publisher','Penerbit')
                 ->display_as('year','Tahun')
                 ->display_as('quantity','Jumlah');
            $output = $crud->render();

            // GroceryCRUD v1/v2 biasanya mengembalikan object output->output, output->js_files, css_files
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    public function _example_output($output = null)
    {
        $this->load->view('templates/header', $output);
        $this->load->view('grocery_view', $output);
        $this->load->view('templates/footer', $output);
    }
}
