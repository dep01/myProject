<style>
.padding-list {
  padding: 10px;
}
</style>


<div class="modal fade" id="Addteam<?php echo $list['id_project']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request team</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        


<?php foreach($teamlist as $listt): ?>
    <div class="m-2 flex-row d-flex justify-content-between card bg-white">

    <div class="mt-2 ">
            <h5 class="font-weight-bold text-dark"><?php echo $listt['fullname']; ?>( <?php echo $listt['username']; ?> )</h5>
           
        </div>
        <a href="<?php echo base_url('index.php/AddTeamProject/'.$listt['id_user_friend'].'/'.$list['id_project']);?>" class="btn btn-secondary ">
        Request
            <!-- <p class="mb-5 mt-5">View Profile</p> -->
        </a>

    </div>

<?php endforeach;?>


        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>