<?php 
    $data['list']=array(
        ['title'=>'Total',
        'count'=>30],
        ['title'=>'Selesai',
        'count'=>10],
        ['title'=>'Belum',
        'count'=>20],
    );
 ?>
<div class="row">
  <?php foreach($data['list'] as $list): ?>
    <?php include('inc/Project_detail.php'); ?>
  <?php endforeach;?>
</div>
