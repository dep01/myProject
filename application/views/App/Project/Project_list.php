<?php 
    $data['list']=array(
        ['title'=>'Your Project',
        'count'=>0],
        ['title'=>'Finished',
        'count'=>0],
        ['title'=>'On Progress',
        'count'=>0],
    );
    
 ?>
<div class="row">

  <?php foreach($data['list'] as $list): ?>
    <?php include('inc/Project_detail.php'); ?>
  <?php endforeach;?>
</div>
<?php 
    $data['list']=array(
        ['title'=>'Perpustakaan',
        'author'=>'Dani andri',
        'start'=>'28,December 2019',
        'end'=>'28,February 2020'],
        ['title'=>'Project Management',
        'author'=>'Diaz erlangga',
        'start'=>'28,February 2020',
        'end'=>'28,Mei 2020'],
        ['title'=>'Cloud Management',
        'author'=>'Rio baskara',
        'start'=>'28,March 2020',
        'end'=>'28,Mei 2020']
    );
    
 ?>
<div class="column">
<a href="#" class="btn btn-primary">Create new project</a>
    <?php foreach($data['list'] as $list): ?>
      <?php include('inc/Project_card.php'); ?>
    <?php endforeach;?>
</div>
