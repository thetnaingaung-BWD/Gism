<?php

use App\Models\Content;


if (!function_exists('translate')) {
    function translate($key , $locale = null)
    {
        // dd($key);
        $locale == null ? $locale = app()->getLocale() : $locale;
        $translation = Content::where('key', $key)->first();

        if ($translation) {
            $translations = json_decode($translation->body, true);

            return $translations[$locale] ?? $translations['en'] ?? $key;
        }

        return $key; // Return key if translation is missing
    }
}
