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
            Detalji proizvoda
        </h2>
     <?php $__env->endSlot(); ?>

     <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <table class="admin-table">
                        <tr>
                            <td>ID</td>
                            <td><?php echo e($product->id); ?></td>
                        </tr>
                        <tr>
                        <td>Naziv</td>
                            <td><?php echo e($product->naziv); ?></td>
                        </tr>
                        <td>Kategorija</td>
                            <td><?php echo e($product->category->naziv); ?></td>
                        </tr>
                        <td>Opis</td>
                            <td><?php echo e($product->opis); ?></td>
                        </tr>
                        <td>Cijena</td>
                            <td><?php echo e(number_format($product->cijena,2,',','.')); ?></td>
                        </tr>
                        <td>Količina</td>
                            <td><?php echo e($product->kolicina); ?></td>
                        </tr>                                                                            
                        <td>Kreiran</td>
                            <td><?php echo e($product->created_at?->format('d.m.Y H:i:s')); ?></td>
                        </tr>
                        <td>Ažuriran</td>
                            <td><?php echo e($product->updated_at?->format('d.m.Y H:i:s')); ?></td>
                        </tr>                                                                    
                    </table>
                    <div class="mt-6 flex gap-4">
                        <a href="<?php echo e(route('products.index')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded">
                            Povratak
                        </a>
                        </form>
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
<?php endif; ?><?php /**PATH C:\xampp\www\algebra\LARAVEL\9_laravel_webshop\resources\views/products/show.blade.php ENDPATH**/ ?>