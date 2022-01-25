<?php

if (!function_exists('page')) {
    /**
     * Load poge file
     * 
     * @param string $path
     * 
     * @return void
     */
    function page(string $path)
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
