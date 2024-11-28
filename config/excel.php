<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Default Excel Export/Import Settings
     |--------------------------------------------------------------------------
     |
     | These options allow you to configure the default settings for exporting and importing Excel files.
     |
     */

    'imports' => [
        'heading' => 'slugged', // Menyesuaikan bagaimana header ditangani
        'csv' => [
            'delimiter' => ',', // Pemisah untuk file CSV
        ],
    ],

    'exports' => [
        'heading' => 'slugged', // Menyesuaikan bagaimana heading diekspor
    ],

    /*
     |--------------------------------------------------------------------------
     | Temporary Path
     |--------------------------------------------------------------------------
     |
     | Define the path where temporary files for import/export will be stored.
     |
     */

    'temporary_files' => [
        'local_path' => storage_path('app/laravel-excel-temp'), // Path untuk file sementara
        'disk' => null, // Gunakan disk default untuk penyimpanan file sementara
    ],

];
