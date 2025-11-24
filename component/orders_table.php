<div class="table-responsive">
  <table class="table table-bordered table-hover" id="ordersTable">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Subtotal</th>
        <th>Tax</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($orders)): ?>
        <tr><td colspan="6" class="text-center">No orders found.</td></tr>
      <?php else: ?>
        <?php foreach ($orders as $index => $o): ?>
          <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($o['customer']) ?></td>
            <td><?= date('d F Y', strtotime($o['date'])) ?></td>
            <td>$<?= number_format((float)$o['subtotal'], 2) ?></td>
            <td>$<?= number_format((float)$o['tax'], 2) ?></td>
            <td>$<?= number_format((float)$o['total'], 2) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
