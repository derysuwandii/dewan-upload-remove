<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link rel="icon" href="dk.png">
  <title>Dewan Upload And Remove</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style type="text/css">
    #remove_button {
      border-radius: 50%;
      border: 3px solid #fff;
      display: block;
      text-align: center;
      position: absolute;
      top: -10px;
      right: 0px;
    }
  </style>
</head>
<body>
	<nav class="navbar navbar-dark bg-info">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    Dewan Komputer
	  </a>
	</nav>

	<div class="container mb-5">
    <h3 align="center" class="mb-3 mt-3">Dewan Upload And Remove</h3><hr>
		<div class="row">
      <div class="col-sm-6 offset-sm-3">
        <form id="submit_form" method="POST"> 
          <label>Pilih Gambar</label>  
          <div class="form-group">  
            <input type="file" name="file" id="image_file"/>  
          </div>
          <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />  
        </form><hr>

        <h3 align="center">Image Preview</h3> 
        <div id="image_preview"></div>  
	     </div>
     </div>
   </div>

	<div class="navbar bg-dark fixed-bottom">
		<div class="text-white">© <?php echo date('Y'); ?> Copyright:
		    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
		</div>
	</div>

  <script src="js/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#submit_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
          url:"upload.php",
          method:"POST",
          data: new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#image_preview').html(data);
            $('#image_file').val('');
          }
        })
      });
      $(document).on('click', '#remove_button', function(){
         if(confirm("Apakah Anda yakin akan menghapus gambar ini?")){
            var path = $('#remove_button').data("path");
            $.ajax({
               url:"delete.php",
               type:"POST",
               data:{path:path},
               success:function(data){
                  if(data != ''){
                    $('#image_preview').html('');
                  }
               }
            });
         } else {  
            return false;
         }
      });
     });
   </script>
</body>
</html>