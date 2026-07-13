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
            Upravljanje proizvodima
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

                <form action="<?php echo e(route('products.search')); ?>" method="GET" class="mb-5">
                    <div class="flex-1">
                        <label for="serach" class="block font-semibold mb-1">
                            Pretraga po naziv proizvoda ili kategoriji
                        </label>
                        <input id="search" type="text" name="search" value="<?php echo e($search); ?>"
                        placeholder="npr. laptop, mobiteli.." class="w-full rounded-md border-gray-300 shadow-sm"
                        >
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 buttonodmak">
                            Pretraži
                        </button>
                        <a href="<?php echo e(route('products.search')); ?>" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-blue-700">Reset</a>
                    </div>
                </form>

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold mb-4">Popis proizvoda i kategorija</h3>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-access')): ?>
                    <a href="<?php echo e(route('products.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                   <i class="bi bi-plus-circle"></i>    
                    Novi proizvod
                    </a>

                    <?php endif; ?>
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
                                    <th>Detalji</th>
                                    <th>Kreirana</th>
                                    <th>Ažurirana</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-access')): ?>
                                    <th>Akcije</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>
                                    <td><?php echo e($product->naziv); ?></td>
                                    <td><?php echo e($product->category->naziv); ?></td>
                                    <td><?php echo e($product->kolicina); ?></td>
                                    <td><?php echo e($product->cijena); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('products.show',$product)); ?>"
                                        class="icon-button icon-edit" title="Detalji"
                                        >
                                         <i class="bi bi-eye"></i>
                                    </a>
                                    </td>
                                    <td><?php echo e($product->created_at?->format('d.m.Y H:i:s')); ?></td>
                                    <td><?php echo e($product->updated_at?->format('d.m.Y H:i:s')); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-access')): ?>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?php echo e(route('products.edit',$product)); ?>" class="icon-button icon-edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="<?php echo e(route('products.destroy',$product)); ?>"
                                            method="POST" onsubmit="return confirm('Obrisati proizvod?')"
                                            >
                                             <?php echo csrf_field(); ?>
                                             <?php echo method_field('DELETE'); ?>
                                             <button type="submit" class="icon-button icon-delete" title="Obriši">
                                                <i class="bi bi-trash"></i>
                                             </button>  
                                            </form>
                                        </div>
                                    </td>
                                    <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\www\algebra\LARAVEL\9_laravel_webshop\resources\views/products/search.blade.php ENDPATH**/ ?>