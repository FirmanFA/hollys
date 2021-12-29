<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Menu');
	}

	public function index()
	{
		// get foods data
		$foods = $this->M_Menu->getFoods();

		// get drinks data
		$drinks = $this->M_Menu->getDrinks();

		// get snacks data
		$snacks = $this->M_Menu->getSnacks();
		$arrayMenus = array(
			'foods' => $foods,
			'drinks' => $drinks,
			'snacks' => $snacks
		);

		$data['title'] = 'Menus';
		$this->load->view('templates/header_user', $data);
		$this->load->view('menu/index', $arrayMenus);
		// $this->load->view('templates/footer');
	}

	public function search()
	{
		$search = $this->input->post('search');

		$menus = $this->M_Menu->getAllMenu($search);

		$arrayMenus = array(
			'menus' => $menus,
			'search' => $search
		);

		$data['title'] = 'Menus | Search';
		$this->load->view('templates/header_user', $data);
		$this->load->view('menu/search', $arrayMenus);
	}
}
