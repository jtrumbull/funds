<?php
/*
 |------------------------------------------------------------------------------
 | Controller: App controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Text;

use mikehaertl\wkhtmlto\Pdf;

class TestController extends AppController {
  
  public function index () {
    $pdf = new Pdf('http://app/funds/investments/statement/1');
    if (!$pdf->saveAs(TMP . 'temp.pdf')) {
      echo $pdf->getError();
      die();
    }
    $pdf->send();
  }
  
  public function index2 () {
    
    $uuid = Text::uuid();
    
    $cmd = 'C:\wkhtmltopdf\bin\wkhtmltopdf';
    $url = 'http://app/funds/investments/statement/1';
    $out = 'C:\app\funds\webroot\files\statements\\' . $uuid . '.pdf';
    
    $args = '--margin-top 30mm';
    
    //. " 2>&1"
    $response = exec(implode(' ', [$cmd, $args, $url, $out]), $output, $status);
    
    die(json_encode([
      'response' => $response,
      'output' => $output,
      'status' => $status
    ]));
    
  }
  
}
