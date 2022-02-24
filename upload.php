<?php
 if($_FILES['file']['name'] != '')
 {
    $name = explode(".", $_FILES['file']['name']);
    $extension = $name[1];
    $allowed_type = array("jpg", "jpeg", "png", "gif");

    if(in_array($extension, $allowed_type))
    {
       $new_name = rand() . "." . $extension;
       $path = "upload/" . $new_name;
       if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
       {
          echo '
          <div class="row" align="center">
            <div class="col-md-12">
                <img src="'.$path.'" class="img-responsive" width="100%" />
                <button type="button" data-path="'.$path.'" id="remove_button" class="btn btn-danger"> X </button>
            </div>
          </div>
          ';
       }
    } else {
      echo '<script>alert("Invalid File Format")</script>';
    }
 } else {
      echo '<script>alert("File tidak boleh kosong")</script>';
 }
?>  