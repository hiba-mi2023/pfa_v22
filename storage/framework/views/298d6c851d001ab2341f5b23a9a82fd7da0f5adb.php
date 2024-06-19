<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display Notes</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/app3.css')); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <form method="POST" action="<?php echo e(route('notes.login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-container">
                <h2>Login</h2>
                <div>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" required>
                </div>
            
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                
                <div class="remember-forgot-container">
                    <div class="remember-container">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    
                    <a href="">Forgot Your Password?</a>
                </div>

                <div>
                    <button type="submit">Sign In</button>
                </div>
            </div>
    </form>
        <?php if($errors->any()): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </body>
</html><?php /**PATH C:\Users\Lenovo\OneDrive\Bureau\pfa_v2-pfav2\resources\views/notes/login.blade.php ENDPATH**/ ?>