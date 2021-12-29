<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model
{
	function getOrder($id, $status)
	{
		$where = array('user_id' => $id, 'status' => $status);
		$query = $this->db->select('*')->from('orders')->where($where)->get();

		return $query->result();
	}

	function getOrderDetails($id)
	{
		$where = array('order_id' => $id);
		$query = $this->db->select('*')->from('order_details')->where($where)->get();

		return $query->result();
	}

	function getOrderDetail($id)
	{
		$sql = 'SELECT order_details.*, menus.name, menus.image FROM order_details INNER JOIN menus ON order_details.menu_id = menus.id WHERE order_details.id = ?';
		$query = $this->db->query($sql, array($id));

		return $query->result();
	}

	function getOrderWhereId($id)
	{
		$where = array('id' => $id);
		$query = $this->db->select('*')->from('orders')->where($where)->get();

		return $query->result();
	}

	// Di bawah ini fungsi admin
	function getAllOrder()
	{
		$query = $this->db->query("SELECT orders.id, users.namadepan, users.namabelakang,orders.sub_total, orders.created_at, orders.status
		FROM orders
		INNER JOIN users ON orders.user_id=users.id;");
		return $query->result();
	}
	
    function updateDataorders($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('orders', $data);
    }
}
