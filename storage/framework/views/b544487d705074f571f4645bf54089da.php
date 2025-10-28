

<?php $__env->startSection('content'); ?>
<section class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-4xl font-bold text-red-800 mb-10 text-center" data-aos="fade-up">
      🩸 Check Blood Availability
    </h2>

    <!-- Filter Form -->
    <form action="<?php echo e(route('blood.search.results')); ?>" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-10" data-aos="fade-up">
      <?php echo csrf_field(); ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
          <label class="block mb-1 font-medium text-gray-700">State</label>
          <input type="text" name="state" value="<?php echo e(old('state', $filters['state'] ?? '')); ?>"
                 class="w-full p-2 border rounded-md" placeholder="Enter state">
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">City</label>
          <input type="text" name="city" value="<?php echo e(old('city', $filters['city'] ?? '')); ?>"
                 class="w-full p-2 border rounded-md" placeholder="Enter city">
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">Blood Group</label>
          <select name="blood_group" class="w-full p-2 border rounded-md">
            <option value="">Select Blood Group</option>
            <?php $__currentLoopData = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($group); ?>" <?php echo e((old('blood_group', $filters['blood_group'] ?? '') == $group) ? 'selected' : ''); ?>>
                    <?php echo e($group); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">Component</label>
          <select name="component" class="w-full p-2 border rounded-md">
            <option value="">Select Component</option>
            <?php $__currentLoopData = ['whole', 'plasma', 'platelets', 'red_cells']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($component); ?>" <?php echo e((old('component', $filters['component'] ?? '') == $component) ? 'selected' : ''); ?>>
                    <?php echo e(ucfirst(str_replace('_',' ',$component))); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>

      <div class="mt-6 text-center">
        <button type="submit" class="px-6 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 transition">
          Search
        </button>
      </div>
    </form>

    <!-- Blood Availability Table -->
    <div class="overflow-x-auto" data-aos="fade-up">
        <?php if(isset($results)): ?>
            <?php if($results->isEmpty()): ?>
                <p class="text-gray-700">No blood stock found for the selected criteria.</p>
            <?php else: ?>
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                      <tr class="bg-red-700 text-white">
                        <th class="py-2 px-4">Hospital / Blood Bank</th>
                        <th class="py-2 px-4">State</th>
                        <th class="py-2 px-4">City</th>
                        <th class="py-2 px-4">Category</th>
                        <th class="py-2 px-4">Blood Group</th>
                        <th class="py-2 px-4">Component</th>
                        <th class="py-2 px-4">Available Units</th>
                        <th class="py-2 px-4">Contact</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b hover:bg-red-50 transition">
                          <td class="py-2 px-4">
                        <span class="font-semibold"><?php echo e($stock->hospital->name); ?></span><br>
                        <span class="text-sm text-gray-600"><?php echo e($stock->hospital->address); ?></span>
                      </td>
                          <td class="py-2 px-4"><?php echo e($stock->hospital->state); ?></td>
                          <td class="py-2 px-4"><?php echo e($stock->hospital->city); ?></td>
                          <td class="py-2 px-4"><?php echo e($stock->hospital->category); ?></td>
                          <td class="py-2 px-4"><?php echo e($stock->blood_group); ?></td>
                          <td class="py-2 px-4"><?php echo e(ucfirst(str_replace('_',' ',$stock->component))); ?></td>
                          <td class="py-2 px-4"><?php echo e($stock->units_available); ?></td>
                          <td class="py-2 px-4"><?php echo e($stock->hospital->contact); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bloodbank\resources\views/bloodavailability.blade.php ENDPATH**/ ?>