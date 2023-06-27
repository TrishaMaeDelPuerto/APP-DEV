<?php
$page_title = 'Monthly Sales';
require_once('includes/load.php');
// Checking the user's permission level to view this page
page_require_level(3);

$year = date('Y');
$sales = monthlySales($year);

// Calculate total quantity sold and total
$totalQuantitySold = 0;
$total = 0;
foreach ($sales as $sale) {
  $totalQuantitySold += (int)$sale['qty'];
  $total += (float)$sale['total_saleing_price'];
}

include_once('layouts/header.php');
?>



<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Stock card</span>
        </strong>
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
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sales as $index => $sale): ?>
            <tr>
              <td class="text-center"><?php echo $index + 1; ?></td>
              <td><?php echo remove_junk($sale['name']); ?></td>
              <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
              <td class="text-center"><?php echo remove_junk($sale['total_saleing_price']); ?></td>
              <td class="text-center"><?php echo $sale['date']; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td></td>
              <td><strong>Total</strong></td>
              <td class="text-center"><strong><?php echo $totalQuantitySold; ?></strong></td>
              <td class="text-center"><strong><?php echo $total; ?></strong></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
