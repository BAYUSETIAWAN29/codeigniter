<hr>
<p style="text-align:center; margin-top:40px;">
    &copy; <?php echo date('Y'); ?> Sistem Perpustakaan – GroceryCRUD + CodeIgniter 3
</p>

<?php 
    foreach($js_files as $file): 
        echo "<script src='{$file}'></script>";
    endforeach;
?>
</body>
</html>
