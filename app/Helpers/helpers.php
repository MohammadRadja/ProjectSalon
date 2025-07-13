<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka, $decimal = 0)
    {
        return 'IDR ' . number_format($angka, $decimal, ',', '.');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return date('d F Y', strtotime($date));
    }
}