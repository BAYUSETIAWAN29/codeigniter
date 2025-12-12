<?php include 'auth_style.php'; ?>

<div class="auth-container">
    <div class="auth-header">
        Login Sistem Perpustakaan
    </div>

    <div class="auth-body">
        <?php if(isset($error)) echo "<p style='color:red;font-size:12px;'>$error</p>"; ?>

        <form method="post" action="<?php echo site_url('auth/login'); ?>">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button class="auth-button" type="submit">Login</button>
        </form>

        <div class="auth-links" style="margin-top:10px;">
            <a href="<?php echo site_url('auth/register'); ?>">Register</a> | 
            <a href="<?php echo site_url('auth/forgot_password'); ?>">Lupa Password?</a>
        </div>
    </div>

    <div class="auth-footer">
        © 2025 Sistem Perpustakaan – GroceryCRUD
    </div>
</div>
