<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	include('PHPExcel.php');
	
	class Excel extends PHPExcel
	{
		public function __construct()
		{
			parent::__construct();
		}
	}
?>