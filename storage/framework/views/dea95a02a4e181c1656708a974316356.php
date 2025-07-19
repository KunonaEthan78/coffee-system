<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2 class="text-center text-primary mb-4">🛒 Your Cart</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(empty($cart)): ?>
        <div class="alert alert-info text-center">Your cart is currently empty.</div>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Price (UGX)</th>
                    <th>Quantity</th>
                    <th>Subtotal (UGX)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                    <tr>
                        <td><?php echo e($item['name']); ?></td>
                        <td><?php echo e(number_format($item['price'])); ?></td>
                        <td><?php echo e($item['quantity']); ?></td>
                        <td><?php echo e(number_format($subtotal)); ?></td>
                        <td>
                            <form action="<?php echo e(route('customer.cart.remove', $id)); ?>" method="POST" onsubmit="return confirm('Remove this item?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="table-info">
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td colspan="2" class="fw-bold text-success">UGX <?php echo e(number_format($total)); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <form action="<?php echo e(route('customer.cart.clear')); ?>" method="POST" onsubmit="return confirm('Clear entire cart?')">
                <?php echo csrf_field(); ?>
                <button class="btn btn-warning">Clear Cart</button>
            </form>

            <a href="<?php echo e(route('customer.checkout')); ?>" class="btn btn-success">🧾 Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\git\coffee-system\resources\views/customer/cart/index.blade.php ENDPATH**/ ?>