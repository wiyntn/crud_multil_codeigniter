<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
{


    public $product;


    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();


        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Product_model');


        $this->product = new Product_model;
    }


    /**
     * Display Data this method.
     *
     * @return Response
     */
    public function index()
    {
        $data['data'] = $this->product->get_product();


        // $this->load->view('theme/header');
        $this->load->view('list', $data);
        // $this->load->view('theme/footer');
    }


    /**
     * Show Details this method.
     *
     * @return Response
     */
    public function show($product_id)
    {
        $product = $this->product->find_product($product_id);


        // $this->load->view('theme/header');
        $this->load->view('show', array('product' => $product));
        // $this->load->view('theme/footer');
    }


    /**
     * Create from display on this method.
     *
     * @return Response
     */
    public function create()
    {
        // $this->load->view('theme/header');
        $this->load->view('create');
        // $this->load->view('theme/footer');
    }


    /**
     * Store Data from this method.
     *
     * @return Response
     */
    public function store()
    {
        $this->form_validation->set_rules('product_name', 'Product_name', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('product/create'));
        } else {
            $this->product->insert_product();
            redirect(base_url('product'));
        }
    }


    /**
     * Edit Data from this method.
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->product->find_product($id);


        // $this->load->view('theme/header');
        $this->load->view('edit', array('product' => $product));
        // $this->load->view('theme/footer');
    }


    /**
     * Update Data from this method.
     *
     * @return Response
     */
    public function update($product_id)
    {
        $this->form_validation->set_rules('product_name', 'Product_name', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('product/edit/' . $product_id));
        } else {
            $this->product->update_product($product_id);
            redirect(base_url('product'));
        }
    }


    /**
     * Delete Data from this method.
     *
     * @return Response
     */
    public function delete($product_id)
    {
        $product = $this->product->delete_product($product_id);
        redirect(base_url('product'));
    }
}
