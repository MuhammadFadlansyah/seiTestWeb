<?php
class ItemsController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index() {
        // Data dummy sementara, nanti akan diambil dari API
        $data['items'] = [
            ['id' => 1, 'name' => 'Item 1', 'description' => 'Description 1'],
            ['id' => 2, 'name' => 'Item 2', 'description' => 'Description 2'],
        ];

        $this->load->view('items/index', $data);
    }

    public function create() {
        $this->load->view('items/create');
    }

    public function edit($id) {
        // Data dummy, nanti akan diambil dari API
        $data['item'] = ['id' => $id, 'name' => 'Item ' . $id, 'description' => 'Description ' . $id];
        $this->load->view('items/edit', $data);
    }
}
