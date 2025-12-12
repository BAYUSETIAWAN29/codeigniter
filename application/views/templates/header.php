<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan – GroceryCRUD</title>
    <?php 
        foreach($css_files as $file): 
            echo "<link rel='stylesheet' type='text/css' href='{$file}' />";
        endforeach;
    ?>

    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<style>
    body {
        background: #f5f5f5;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .auth-container {
        width: 340px;
        margin: 50px auto;
        padding: 20px 25px;
        background: #ffffff;
        border: 1px solid #cccccc;
        border-radius: 4px;
        box-shadow: 0 0 4px rgba(0,0,0,0.1);
    }

    .auth-title {
        margin-bottom: 15px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    .auth-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        border: 1px solid #bfbfbf;
        border-radius: 3px;
        box-sizing: border-box;
        background: #f9f9f9;
    }

    .auth-button {
        width: 100%;
        padding: 8px;
        background: #e6e6e6;
        border: 1px solid #bfbfbf;
        border-radius: 3px;
        font-size: 14px;
        cursor: pointer;
    }

    .auth-button:hover {
        background: #d9d9d9;
    }

    .auth-footer {
        margin-top: 10px;
        text-align: center;
    }

    .auth-footer a {
        color: #333;
        text-decoration: none;
        font-size: 13px;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <!-- Top Bar -->
    <div style="width:100%; padding:8px 12px; background:#f0f0f0; border-bottom:1px solid #ccc; display:flex; justify-content:space-between; align-items:center;">
        <div style="font-size:22px; font-weight:bold;">
            📚 Sistem Perpustakaan Sederhana – GroceryCRUD
        </div>

        <div>
            <a href="<?php echo site_url('auth/logout'); ?>" 
               style="
                    padding:5px 10px; 
                    background:#e6e6e6;
                    border:1px solid #bfbfbf; 
                    border-radius:3px;
                    text-decoration:none; 
                    color:#333;
                    font-size:13px;
                "
               onmouseover="this.style.background='#d9d9d9';"
               onmouseout="this.style.background='#e6e6e6';">
                Logout
            </a>
        </div>
    </div>


