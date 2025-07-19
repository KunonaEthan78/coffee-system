<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary">📦 Your Orders</h2>

    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-info text-center">You haven’t placed any orders yet.</div>
    <?php else: ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Order #<?php echo e($order->id); ?></strong> —
                        <span class="badge bg-secondary"><?php echo e(ucfirst($order->status)); ?></span><br>
                        <small class="text-muted">Placed: <?php echo e($order->created_at->format('d M Y H:i')); ?></small>
                    </div>
                    <a href="<?php echo e(route('customer.orders.invoice', $order->id)); ?>" class="btn btn-sm btn-outline-primary">
                        🧾 Invoice
                    </a>
                </div>
                <div class="card-body">
                    <p><strong>Address:</strong> <?php echo e($order->delivery_address); ?></p>
                    <p><strong>Total:</strong> UGX <?php echo e(number_format($order->total)); ?></p>

                    <ul class="list-group mt-3">
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e($item->product->name); ?>

                                <span>Qty: <?php echo e($item->quantity); ?> × UGX <?php echo e(number_format($item->price)); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\git\coffee-system\resources\views/customer/orders/index.blade.php ENDPATH**/ ?>