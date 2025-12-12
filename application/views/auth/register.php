<?php include 'auth_style.php'; ?>

<div class="auth-container">
    <div class="auth-header">
        Register Akun Baru
    </div>

    <div class="auth-body">
        <?php if(isset($error)) echo "<p style='color:red;font-size:12px;'>$error</p>"; ?>

        <form method="post" action="<?php echo site_url('auth/register'); ?>">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm" placeholder="Konfirmasi Password" required>

            <button class="auth-button" type="submit">Register</button>
        </form>

        <div class="auth-links" style="margin-top:10px;">
            <a href="<?php echo site_url('auth/login'); ?>">Sudah punya akun? Login</a>
        </div>
    </div>

    <div class="auth-footer">
        © 2025 Sistem Perpustakaan – GroceryCRUD
    </div>
</div>
