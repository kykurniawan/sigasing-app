<?php

if (!function_exists('view')) {
    /**
     * Load poge file
     * 
     * @param string $path
     * 
     * @return void
     */
    function view(string $path)
    {
        $filePath = $path . '.php';
        if (file_exists($filePath)) {
            include $filePath;
            return;
        }
        include 'pages/404.php';
        return;
    }
}
