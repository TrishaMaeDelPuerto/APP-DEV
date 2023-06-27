<?php
$page_title = 'All sale';
require_once('includes/load.php');
// Checking the user's permission level to view this page
page_require_level(3);

$sales = find_all_sale();

// Calculate total quantity and total
$totalQuantity = 0;
$total = 0;
foreach ($sales as $sale) {
  $totalQuantity += (int)$sale['qty'];
  $total += (float)$sale['price'];
}

include_once('layouts/header.php');
?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>All Sales</span>
        </strong>
        <div class="pull-right">
          <a href="add_sale.php" class="btn btn-primary">Add sale</a>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Product name</th>
              <th class="text-center" style="width: 15%;">Quantity</th>
              <th class="text-center" style="width: 15%;">Total</th>
              <th class="text-center" style="width: 15%;">Date</th>
              <th class="text-center" style="width: 100px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sales as $index => $sale): ?>
            <tr>
              <td class="text-center"><?php echo $index + 1; ?></td>
              <td><?php echo remove_junk($sale['name']); ?></td>
              <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
              <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
              <td class="text-center"><?php echo $sale['date']; ?></td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="edit_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  <a href="delete_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td></td>
              <td><strong>Total</strong></td>
              <td class="text-center"><strong><?php echo $totalQuantity; ?></strong></td>
              <td class="text-center"><strong><?php echo $total; ?></strong></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
