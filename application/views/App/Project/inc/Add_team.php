<!-- Delete Modal-->
<div class="modal fade" id="addteam<?php echo $list['id_project']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Request team</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
         <form action="<?php echo base_url();?>index.php/AddTeamProject" method="POST" class="user">
            <?php foreach($list['teamlist'] as $listt):?>
               <div class="form-check">
                 <input class="form-check-input" name="mycheck[]" type="checkbox" value="<?php echo $listt['id_user_friend']; ?>" id="defaultCheck1">
                 <label class="form-check-label" for="defaultCheck1">
                 <?php echo $listt['fullname']; ?> ( <?php echo $listt['username']; ?> )
                 </label>
               </div>
               <input class="form-check-input" name="idproject" type="hidden" value="<?php echo $list['id_project']; ?>">
            <?php endforeach;?>
         </div>
         <div class="modal-footer">
            <input class="btn btn-dark" type="submit" name="simpan" value="Request">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         </div>
         </form>
      </div>
   </div>
</div>