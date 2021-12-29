<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Cart extends CI_Model
{
	function addToCart()
	{
		$sql = 'SELECT * FROM menus WHERE type = "foods"';
		$query = $this->db->query($sql);

		return $query->result();
	}
}
