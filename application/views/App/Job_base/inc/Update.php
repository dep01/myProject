
<form action="<?php echo base_url();?>index.php/saveJobUpdate" method="POST" class="user">
<h1 class="h3 mb-2 text-gray-800">Update Settings</h1>
<div class="flex-column align-content-center">

    <div class="">
        <table>
        <tr>
            <td><input type="input" class="form-control" id="job" name="job" placeholder="<?php echo $joblist['jobbase']; ?>" value="<?php echo $joblist['jobbase']; ?>" required></td>
        </tr>
        <tr>
           <td><input type="input" class="form-control" id="fee" name="fee" placeholder="<?php echo $joblist['percentageFee']; ?>" value="<?php echo $joblist['percentageFee']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></td>
           <td><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $joblist['id_jobbase']; ?>"></td>
        </tr>  
        <tr>
           <td>
             <input class="btn btn-dark btn-sm" type="submit" name="simpan" value="Update">
             <a class="btn btn-secondary btn-sm" href="<?php echo base_url();?>index.php/Job" style="text-decoration: none;">Cancel</a>
            </td>
        </tr>     

        </table>
    </div>
</div>
</form>
