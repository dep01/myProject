  <!-- Delete Modal-->
  <div class="modal fade" id="UpdateModal<?php echo $list['id_jobbase']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Setting</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
        <form action="<?php echo base_url();?>index.php/saveJobUpdate" method="POST" class="user">
<div class="flex-column align-content-center">


            <input type="input" class="form-control" id="job" name="job" placeholder="<?php echo $list['jobbase']; ?>" value="<?php echo $list['jobbase']; ?>" required>

           <input type="input" class="form-control" id="fee" name="fee" placeholder="<?php echo $list['percentageFee']; ?>" value="<?php echo $list['percentageFee']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
           <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $list['id_jobbase']; ?>">

</div>


        
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-dark" type="submit" name="simpan" value="Update">
        </div>
        </form>
      </div>
    </div>
  </div>