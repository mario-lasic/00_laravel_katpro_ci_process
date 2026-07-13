<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upravljanje proizvodima sa dummy servisa
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <?php if(session('success')): ?>

            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                <?php echo e(session('success')); ?>

            </div>
            
            <?php endif; ?>
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold mb-4">Popis proizvoda i kategorija</h3>
                </div>
                    <div class="admin-table-wrapper">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naziv</th>
                                    <th>Kategorija</th>
                                    <th>Količina</th>
                                    <th>Cijena</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product['id']); ?></td>
                                    <td><?php echo e($product['title']); ?></td>
                                    <td><?php echo e($product['category']); ?></td>
                                    <td><?php echo e($product['stock']); ?></td> 
                                    <td><?php echo e($product['price']); ?></td>                                                                                        
                                    <td>
                                        <?php if($product['saved']): ?>
                                        <span class="badge-admin">
                                            Spremljeno
                                        </span>
                                        <?php else: ?>
                                            <form action="<?php echo e(route('dummy-products.store')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="title" value="<?php echo e($product['title']); ?>">
                                                <input type="hidden" name="description" value="<?php echo e($product['description']); ?>">
                                                <input type="hidden" name="price" value="<?php echo e($product['price']); ?>">
                                                <input type="hidden" name="stock" value="<?php echo e($product['stock']); ?>">
                                                <input type="hidden" name="category" value="<?php echo e($product['category']); ?>">
                                                <button type="submit" 
                                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                                Spremi
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>                                                                                        
                                </tr>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\www\algebra\LARAVEL\9_laravel_webshop\resources\views/dummy-products/index.blade.php ENDPATH**/ ?>