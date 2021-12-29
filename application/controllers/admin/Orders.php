<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Order');
        $this->load->model('M_Order_Detail');
        $this->load->model('M_Superadmin');

	}

    public function index()
    {

		
        $queryAllOrders = $this->M_Order->getAllOrder();
        $queryOrderDetail = $this->M_Order_Detail->getAllOrderDetail();


        $DATA = array(
			'queryAllOrders' => $queryAllOrders,
			'queryOrderDetail' => $queryOrderDetail
		);

		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/orders.php', $DATA);
		$this->load->view('admin/templates/footer');

        
        
    }

	public function detailOrder($orderId){
		$queryOrderDetail = $this->M_Order->getOrderDetails($orderId);
        
        $DATA = array(
			'queryOrderDetail' => $queryOrderDetail
		);

		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/orderDetail', $DATA);
		$this->load->view('admin/templates/footer');
        
	}

	public function updateOrderStatus($id)
	{
		$queryDetailOrders = $this->M_Order->getOrderWhereId($id);

		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		$DATA = array('queryDetailOrders' => $queryDetailOrders);
		

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/updateOrderStatus', $DATA);
		$this->load->view('admin/templates/footer');

		
	}

	

	public function updateOrdersFunc()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$arrUpdate = array(
			'status' => $status
		);

		$this->M_Order->updateDataOrders($id, $arrUpdate);
		redirect(base_url('admin/Orders'));
	}

	public function deleteAdminFunc($id)
	{
		$this->M_Order->deleteDataAdmin($id);
		redirect(base_url('admin/Superadmin'));
	}
}

?>