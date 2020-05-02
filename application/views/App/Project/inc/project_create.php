
<form action="<?php echo base_url('index.php/NewProject')?>" method="POST" class="user">
    <h1 class="h3 mb-3 d-flex text-gray-800">Create New Project</h1>
    <div class="m-3 flex-column w-25 align-content-center ">
    Project Name
        <input type="input" name="projectname" class="m-2 form-control" placeholder="Project Name" value="" required>
    Project Fee
        <input type="input" name="projectfee" class="m-2 form-control" placeholder="Project Fee" value="" required>
    Start Date
        <input type="date" name="projectstart" class="m-2 form-control" placeholder="" min="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>" required>
    Deadline(DAY)
        <input type="input" name="projectdeadline" class="m-2 form-control" placeholder="DAY" value="" required>
        <input class="m-2 btn btn-dark btn-sm text-white" type="submit" name="simpan" value="Create">
        <a class="m-2 btn btn-secondary btn-sm text-white" href="<?php echo base_url();?>index.php/Home" style="text-decoration: none;">Cancel</a>
    </div>
</form>