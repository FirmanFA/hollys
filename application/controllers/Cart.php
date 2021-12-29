<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Cart');
		$this->load->model('M_Menu');
		$this->load->model('M_Order');
		$this->load->model('M_Order_Detail');
	}

	public function index()
	{
		$user_id = $this->input->cookie('user_id', true);

		$orders = $this->M_Order->getOrder($user_id, 'unpaid');
		
		if ($orders) {
			$order_details = $this->M_Order->getOrderDetails($orders[0]->id);
	
			$dataOrders = array();
			for ($i=0; $i < count($order_details); $i++) {
				$dataMenuOrder = $this->M_Order->getOrderDetail($order_details[$i]->id);
				
				$dataOrders[] = $dataMenuOrder[0];
			}
			
			$arrayMenu = array(
				'order' => $orders,
				'dataOrders' => $dataOrders
			);

			$data['title'] = 'Cart';
			$this->load->view('templates/header_user', $data);
			$this->load->view('cart/index', $arrayMenu);
		} else {
			$orders = [];
			$dataOrders = [];
			
			$arrayMenu = array(
				'order' => $orders,
				'dataOrders' => $dataOrders
			);

			$data['title'] = 'Cart';
			$this->load->view('templates/header_user', $data);
			$this->load->view('cart/index', $arrayMenu);
		}

	}

	public function add($id)
	{
		$menu = $this->M_Menu->getMenu($id);

		$arrayMenu = array(
			'menu' => $menu
		);

		$data['title'] = 'Create Order';
		$this->load->view('templates/header_user', $data);
		$this->load->view('cart/add', $arrayMenu);
	}

	public function create($id)
	{
		$user_id = $this->input->cookie('user_id', true);

		// ambil menu berdasarkan id
		$menu = $this->M_Menu->getMenu($id);

		// ambil data form input
		$qty = $this->input->post('qty');
		$price = $menu[0]->price;

		// ini ambil order berdasar user id dan status order unpaid
		$order = $this->M_Order->getOrder($user_id, 'unpaid');

		// check order where user id and status unpaid
		if (count($order) == 0) {
			// bikin data order
			$arrInsertOrder = array(
				'user_id' => $user_id,
				'status' => 'unpaid',
				'sub_total' => $qty * $price,
				'created_at' => date("Y/m/d"),
				'updated_at' => date("Y/m/d"),
			);

			$this->db->insert('orders', $arrInsertOrder);
			
			// get order id
			$newOrder = $this->M_Order->getOrder($user_id, 'unpaid');

			// bikin data order detail
			$arrInsertOrderDetails = array(
				'order_id' => $newOrder[0]->id,
				'menu_id' => $id,
				'qty' => $qty,
				'price' => $qty * $price,
				'created_at' => date("Y/m/d"),
				'updated_at' => date("Y/m/d"),
			);

			$this->db->insert('order_details', $arrInsertOrderDetails);
		} else {
			// get order detail where order id and menu id
			$orderDetail = $this->M_Order_Detail->getOrderDetail($order[0]->id, $id);

			// cek apakah ada data order detail dengan order id dan menu id
			if (count($orderDetail) == 0) {
				// bikin data order detail
				$arrInsertOrderDetails = array(
					'order_id' => $order[0]->id,
					'menu_id' => $id,
					'qty' => $qty,
					'price' => $qty * $price,
					'created_at' => date("Y/m/d"),
					'updated_at' => date("Y/m/d"),
				);

				$this->db->insert('order_details', $arrInsertOrderDetails);

				// update data order ( sub total sama updated at )
				$arrUpdateOrder = array(
					'sub_total' => $order[0]->sub_total + ($qty * $price),
					'updated_at' => date("Y/m/d")
				);

				$this->db->update('orders', $arrUpdateOrder, array('id' => $order[0]->id));
			} else {
				// update exists menu order detail
				$arrUpdateOrderDetails = array(
					'qty' => $orderDetail[0]->qty + $qty,
					'price' => $orderDetail[0]->price + ($qty * $price),
					'updated_at' => date("Y/m/d"),
				);

				$this->db->update('order_details', $arrUpdateOrderDetails, array('menu_id' => $orderDetail[0]->menu_id));

				// update data order ( sub total sama updated at )
				$arrUpdateOrder = array(
					'sub_total' => $order[0]->sub_total + ($qty * $price),
					'updated_at' => date("Y/m/d")
				);

				$this->db->update('orders', $arrUpdateOrder, array('id' => $order[0]->id));
			}
		}

		redirect(base_url().'cart');
	}

	public function delete($id)
	{
		$order_details = $this->M_Order->getOrderDetail($id);
		$orders = $this->M_Order->getOrderWhereId($order_details[0]->order_id);

		$arrUpdateOrder = array(
			'sub_total' => $orders[0]->sub_total - $order_details[0]->price,
			'updated_at' => date("Y/m/d")
		);

		$this->db->update('orders', $arrUpdateOrder, array('id' => $order_details[0]->order_id));
		$this->db->delete('order_details', array('id' => $id));

		redirect(base_url().'cart');
	}

	public function checkout($id)
	{
		$arrUpdateOrder = array(
			'status' => 'paid',
			'updated_at' => date("Y/m/d")
		);

		$this->db->update('orders', $arrUpdateOrder, array('id' => $id));

		$this->session->set_flashdata('success', 'Pesanan anda diproses!');

		redirect(base_url().'users');
	}
}
