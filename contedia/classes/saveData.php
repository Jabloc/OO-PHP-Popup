<?php
  class SaveData {
    
      function __construct() {
        $username = "root";
        $password = "";
        $server = "localhost";
        $this->conn = new mysqli($server, $username, $password, "forms");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
      }
  
      public function saveFormData($formData, $formFile) {
        if(array_key_exists('dropdown',$formData)){$dropdown = $formData['dropdown'];}else{$dropdown = "";}
        if(array_key_exists('checkbox',$formData)){$checkbox = $formData['checkbox'];}else{$checkbox = "";}
        if(array_key_exists('email',$formData)){$email = $formData['email'];}else{$email = "";}
        if(array_key_exists('file',$formFile)){
          $fileUpload = $this->uploadFile($formFile);
        }else{
          $fileUpload = "";
        }
        
        if(array_key_exists('radio_option',$formData)){$radioOption = $formData['radio_option'];}else{$radioOption = "";}
        
        $query = "INSERT INTO forms.form_data (dropdown, checkbox, email, file_upload, radio_option) 
            VALUES ('$dropdown', '$checkbox', '$email', '$fileUpload', '$radioOption')";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
              
        return "OK";
      }
  
      private function uploadFile($file) {
          $targetDirectory = 'C:/xampp/htdocs/contedia/uploads/';
          $targetFilename = $targetDirectory . basename($file['file']['name']);
          move_uploaded_file($file['file']['tmp_name'], $targetFilename);
          return $targetFilename;
      }
  }

?>
