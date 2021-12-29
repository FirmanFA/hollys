<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order_Detail extends CI_Model
{
	function getOrderDetail($orderId, $menuId)
	{
		$where = array('order_id' => $orderId, 'menu_id' => $menuId);
		
		$query = $this->db->select('*')->from('order_details')->where($where)->get();

		return $query->result();
	}

	function getOrderDetailByOrderId($orderId)
	{
		$where = array('order_id' => $orderId);
		$query = $this->db->select('*')->from('order_details')->where($where)->get();

		return $query->result();
	}

	// Fungsi admin
	public function getAllOrderDetail()
	{
		$query = $this->db->get('order_details');
		return $query->result();
	}
}
