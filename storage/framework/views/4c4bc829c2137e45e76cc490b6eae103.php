<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Developer Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
                .floating-code {
            position: absolute;
            font-family: monospace;
            color: white;
            opacity: 0.8;
            animation: floatUpDown 6s ease-in-out infinite;
            }
            @keyframes floatUpDown {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            }

    </style>
</head>
<body>
    <section class="min-h-screen flex items-center justify-center bg-red-950/100 relative text-white px-6">
  <!-- Floating Code Elements -->
  <div class="floating-code top-10 left-10 text-xs" style="animation-delay: -1s;">// Sign in securely</div>
  <div class="floating-code bottom-10 right-20 text-xs" style="animation-delay: -2s;">console.log("Welcome back!")</div>

  <!-- Sign In Card -->
  <div class=" bg-gray-900/70 backdrop-blur-md shadow-2xl p-10 rounded-xl w-full max-w-md z-10 m-10">
    <div class="text-center mb-10">
      <div class="mb-4">
        
      </div>
      <h2 class="text-4xl font-bold neon-glow">Sign Up</h2>
      <img src="<?php echo e(asset('img/char3.png')); ?>" alt="Profile" class="w-[150px] h-[150px] mx-auto rounded-full  shadow-xl" />
      <p class="text-gray-400 mt-2 text-sm">Welcome back, learner 👨</p>
      <div class="mt-4">

      </div>
    </div>

    <form action="/signup" method="POST" class="space-y-6">
     <?php echo csrf_field(); ?>
      <div>
        <label class="block text-sm font-semibold text-red-400 mb-1 code-font">Name</label>
        <input type="Name" name="name" class="w-full px-4 py-3 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" placeholder="Astred jony" required />
      </div>
           <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <?php echo e($message); ?>

           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div>
        <label class="block text-sm font-semibold text-red-400 mb-1 code-font">Email</label>
        <input type="email" name="email" class="w-full px-4 py-3  bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" placeholder="you@example.com" required />
      </div>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div>
        <label class="block text-sm font-semibold text-red-400 mb-1 code-font">Password</label>
        <input type="password" name="password" class="w-full px-4 py-3  bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" placeholder="••••••••" required />
      </div>
          <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <?php echo e($message); ?>

           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      <div>
        <label class="block text-sm font-semibold text-red-400 mb-1 code-font">Confirm Your Password</label>
        <input type="password" name="password_confirmation" class="w-full px-4 py-3 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" placeholder="••••••••" required />
      </div>

      <div class="flex justify-between items-center text-sm text-gray-400">
        <label class="flex items-center space-x-2">
          <input type="checkbox" class="accent-red-500" name="remember" />
          <span class="code-font">Remember me</span>
        </label>
        
        
      </div>

      <button type="submit" class="w-full py-3 bg-gradient-to-r from-red-500 to-yellow-500 rounded-full font-semibold hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-red-500/25">
        Sign up
      </button>
    </form>

    <p class="text-sm text-center text-gray-400 mt-6">
      Already have an account?
      <a href="/Login" class="text-red-400 hover:underline">Log in</a>
    </p>
  </div>
</section>

</body>
</html><?php /**PATH C:\Users\User\Herd\game\resources\views/register/signup.blade.php ENDPATH**/ ?>