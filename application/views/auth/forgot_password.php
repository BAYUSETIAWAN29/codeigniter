<?php include 'auth_style.php'; ?>

<div class="auth-container">
    <div class="auth-header">
        Lupa Password
    </div>

    <div class="auth-body">
        <?php if(isset($msg)) echo "<p style='color:green;font-size:12px;'>$msg</p>"; ?>
        <?php if(isset($error)) echo "<p style='color:red;font-size:12px;'>$error</p>"; ?>

        <form method="post" action="<?php echo site_url('auth/forgot_password'); ?>">
            <input type="email" name="email" placeholder="Masukkan email Anda" required>

            <button class="auth-button" type="submit">Kirim Reset Password</button>
        </form>

        <div class="auth-links" style="margin-top:10px;">
            <a href="<?php echo site_url('auth/login'); ?>">Kembali ke Login</a>
        </div>
    </div>

    <div class="auth-footer">
        © 2025 Sistem Perpustakaan – GroceryCRUD
    </div>
</div>
