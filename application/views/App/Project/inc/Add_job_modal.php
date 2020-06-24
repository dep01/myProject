  <!-- Delete Modal-->
  <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add job detail</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
        <form action="<?php echo base_url('index.php/SaveAddJobProject') ?>" method="POST" class="user">
<div class="flex-column align-content-center">


           <input type="input" class="form-control" id="job" name="job" placeholder="Job detail" required>
           <input type="date" name="job_start" class="form-control" placeholder="" min="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>" required>
           <input type="input" class="form-control" id="deadline" name="deadline" placeholder="Deadline" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
           <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $teams['id_user']?>" >
           <input type="hidden" class="form-control" id="id_project" name="id_project" value="<?php echo $projectlist['id_project']?>" >


</div>


        
        
        </div>
        <div class="modal-footer">
        <input class="btn btn-dark" type="submit" name="simpan" value="Add">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        </div>
        </form>
      </div>
    </div>
  </div>