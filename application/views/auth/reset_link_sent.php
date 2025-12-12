<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Link Reset Password</h2>

<p>Silakan klik link berikut untuk melakukan reset password:</p>

<p>
    <a href="<?= $reset_link ?>" style="font-weight:bold;">
        <?= $reset_link ?>
    </a>
</p>

<br>

<a href="<?= site_url('auth/login'); ?>">Kembali ke Login</a>

</body>
</html>
