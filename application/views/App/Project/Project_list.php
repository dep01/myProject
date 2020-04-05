<?php 
    $data['list']=array(
        ['title'=>'Your Project',
        'count'=>30],
        ['title'=>'Finished',
        'count'=>10],
        ['title'=>'On Progress',
        'count'=>20],
    );
 ?>
<div class="row">
  <?php foreach($data['list'] as $list): ?>
    <?php include('inc/Project_detail.php'); ?>
  <?php endforeach;?>
</div>
