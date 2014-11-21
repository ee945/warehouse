<?php
include_once ('./resources/function.php');
include_once ('./resources/PHPExcel.php');

class Bak extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL & ~E_NOTICE);
        date_default_timezone_set ('Asia/Shanghai');
        if(!(ifpermit($this->session->userdata('grade'),7)))
        {
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('禁止访问！没有权限')</script></head>";
            echo "<script LANGUAGE='Javascript'>location.href='".base_url()."'</script>";
        }
    }

	public function daily()
	{
        if(ifpermit($this->session->userdata('grade'),7))
        {
        $sheet_title = "当天库存表";
        $todaynow=strval(date("Ymd-His",time()));
        $filename = "当天库存表-".$todaynow.".xls";
        $query = mysql_query("select * from `inf_v_size`");

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("ee945")
                             ->setLastModifiedBy("ee945")
                             ->setTitle("Office 2003 XLS Backup Document")
                             ->setSubject("Office 2003 XLS Backup Document")
                             ->setDescription("Record Database Backup, generated using PHP classes.")
                             ->setKeywords("office 2003 openxml php")
                             ->setCategory("backup hawb");

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '款式')
            ->setCellValue('B1', '颜色')
            ->setCellValue('C1', '尺码')
            ->setCellValue('D1', '库存数量');

        $i=2;
        while ($row=mysql_fetch_array($query)){
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValueExplicit('A'.$i, $row[0],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('B'.$i, $row[1],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('C'.$i, $row[2],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('D'.$i, $row[3]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle($sheet_title);
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
        
        ob_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
        }
	}
	public function record()
	{
        if(ifpermit($this->session->userdata('grade'),7))
        {
        $sheet_title = "进出记录表";
        $todaynow=strval(date("Ymd-His",time()));
        $filename = "进出记录表-".$todaynow.".xls";
        $query = mysql_query("select * from `inf_record`");

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("ee945")
                             ->setLastModifiedBy("ee945")
                             ->setTitle("Office 2003 XLS Backup Document")
                             ->setSubject("Office 2003 XLS Backup Document")
                             ->setDescription("Record Database Backup, generated using PHP classes.")
                             ->setKeywords("office 2003 openxml php")
                             ->setCategory("backup hawb");

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '日期')
            ->setCellValue('B1', '款式')
            ->setCellValue('C1', '颜色')
            ->setCellValue('D1', '尺码')
            ->setCellValue('E1', '数量')
            ->setCellValue('F1', '客户')
            ->setCellValue('G1', '库位')
            ->setCellValue('H1', '备注');

        $i=2;
        while ($row=mysql_fetch_array($query)){
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValueExplicit('A'.$i, $row[1],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('B'.$i, $row[2],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('C'.$i, $row[3],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('D'.$i, $row[4],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('E'.$i, $row[5])
                ->setCellValueExplicit('F'.$i, $row[6],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('G'.$i, $row[7],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValueExplicit('H'.$i, $row[8],PHPExcel_Cell_DataType::TYPE_STRING);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle($sheet_title);
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        
        ob_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
        }
	}

	public function style()
	{
        if(ifpermit($this->session->userdata('grade'),7))
        {
        $sheet_title = "款式统计表";
        $todaynow=strval(date("Ymd-His",time()));
        $filename = "款式统计表-".$todaynow.".xls";
        $query = mysql_query("select * from `inf_v_style`");

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("ee945")
                             ->setLastModifiedBy("ee945")
                             ->setTitle("Office 2003 XLS Backup Document")
                             ->setSubject("Office 2003 XLS Backup Document")
                             ->setDescription("Record Database Backup, generated using PHP classes.")
                             ->setKeywords("office 2003 openxml php")
                             ->setCategory("backup hawb");

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '款式')
            ->setCellValue('B1', '库存数量');

        $i=2;
        while ($row=mysql_fetch_array($query)){
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValueExplicit('A'.$i, $row[0],PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('B'.$i, $row[1]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle($sheet_title);
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        
        ob_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
        }
	}
}
