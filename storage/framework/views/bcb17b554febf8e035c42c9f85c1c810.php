<?php $__env->startSection('content'); ?>
<div class="text-center">
    <h2 class="text-success mb-4">👋 Welcome to the Golden Bean Customer Portal</h2>
    <p class="lead">Browse coffee products, manage your cart, and track your orders seamlessly.</p>

    <div class="mt-4 d-flex justify-content-center gap-4 flex-wrap">
        <a href="<?php echo e(route('customer.products')); ?>" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-mug-hot"></i> Browse Products
        </a>
        <a href="<?php echo e(route('customer.cart')); ?>" class="btn btn-outline-success btn-lg">
            <i class="fas fa-shopping-cart"></i> View Cart
        </a>
        <a href="<?php echo e(route('customer.orders.index')); ?>" class="btn btn-outline-dark btn-lg">
            <i class="fas fa-box"></i> Order History
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\git\coffee-system\resources\views/customer/customer.blade.php ENDPATH**/ ?>