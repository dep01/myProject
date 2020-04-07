
<form action="<?php echo base_url();?>index.php/saveJob" method="POST" class="user">
<h1 class="h3 mb-2 text-gray-800">New Job Settings</h1>
<div class="flex-column align-content-center">

    <div class="">
        <table>
        <tr>
            <td><input type="input" class="form-control" id="job" name="job" placeholder="New Job Base" required></td>
        </tr>
        <tr>
           <td><input type="input" class="form-control" id="fee" name="fee" placeholder="Percentage Fee" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></td>
        </tr>  
        <tr>
           <td>
             <input class="btn btn-primary btn-sm" type="submit" name="simpan" value="Add">
             <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/Job" style="text-decoration: none;">Cancel</a>
            </td>
        </tr>     

        </table>
    </div>
</div>
</form>
