<?php
  require_once("C:/xampp/htdocs/contedia/classes/saveData.php");
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST;
    $file = $_FILES;
    //var_dump($file);

    $saveData = new SaveData();
    $return = $saveData->saveFormData($data, $file);
    
    return $return;
  }else{
    return "Invalid request method";
  }
  
?>
