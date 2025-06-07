<?php 
class reports extends Controller{
 public function construct(){
    $this->reportModel=$this->model('report');
    
 }
 public function index(){

  $this->view('reportsView');
 }

 public function barChart(){
   $dates_count= $this->reportModel->barChart();
    


   $data = [
    'date'=>$date,
    'count'=>$count
    
   ];
   header('Content-Type: application/json');
   echo json_encode($data);

 }
}