<?php include 'auth_style.php'; ?>

<div class="auth-container">
    <div class="auth-header">
        Reset Password
    </div>

    <div class="auth-body">
        <?php if(isset($error)): ?>
            <p style="color:red;font-size:12px;"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if(isset($msg)): ?>
            <p style="color:green;font-size:12px;"><?php echo $msg; ?></p>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('auth/reset_password/' . $token); ?>">
            <input type="password" name="password" placeholder="Password Baru" required>
            <input type="password" name="confirm" placeholder="Konfirmasi Password Baru" required>

            <button type="submit" class="auth-button">Reset Password</button>
        </form>

        <div class="auth-links" style="margin-top:10px;">
            <a href="<?php echo site_url('auth/login'); ?>">Kembali ke Login</a>
        </div>
    </div>

    <div class="auth-footer">
        © 2025 Sistem Perpustakaan – GroceryCRUD
    </div>
</div>
