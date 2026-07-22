<?php

declare(strict_types=1);

if (!function_exists('e')) {
    /**
     * XSS elleni védelem: HTML karakterek eszkápolása
     */
    function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}