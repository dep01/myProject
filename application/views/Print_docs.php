
<table width="100%" border=1 cellspacing="0">
                  <thead>
                    <tr>
                    <?php foreach($header as $head): ?>
                        <th><?php echo $head?></th>
                    <?php endforeach;?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($print_data as $data): ?>
                    <tr>
                    <?php foreach($data as $fill): ?>
                      <td><?php echo $fill?></td>
                      <?php endforeach;?>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>