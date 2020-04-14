<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head> 
    

    <!-- Dropzone CDN -->
    
    <link href='<?php echo base_url();?>assets/css/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='<?php echo base_url();?>assets/js/dropzone.js' type='text/javascript'></script>
   
    <style>
    .content{
      width: 100%;
      height:200px;
      padding: 5px;
      margin: 0 auto;
    }
    .content span{
      width: 100px;
    }
    .dz-message{
      text-align: center;
      font-size: 28px;
    }
    </style>
    <script>
    // Add restrictions
    Dropzone.options.fileupload = {
      acceptedFiles: 'image/*',
      maxFilesize: 3 // MB
    };
    </script>
  </head>
  <body>

    <div class='content'>
      <!-- Dropzone -->
      <form action="<?php echo base_url();?>index.php/Auth/Regist/fileupload/<?php echo $id_user; ?>" class="dropzone" id="fileupload">
      </form> 
    </div> 

  </body>
</html>