<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	class Export extends CI_controller
	{
		public function creatXLS()
		{
			$this->load->model('cimodel');
			$this->load->library('Excel');
			$object = new PHPExcel();
			$object->setActiveSheetIndex(0);
			
			$table_columns = array("Article Date", "Article Title", "Article Body");
			$columns = 0;
			
			foreach($table_columns as $field)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow($columns, 1, $field);
				$columns++;
			}
			
			$record = $this->cimodel->excelData();
			$excel_row = 2;
			foreach($record as $row)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->tdate);
				$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->articletitle);
				$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->articlebody);
				$excel_row++;
			}
			
			$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename = "articledata.xls"');
			$object_writer->save('php://output');
		}
	}
?>