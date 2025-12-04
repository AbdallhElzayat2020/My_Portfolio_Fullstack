<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        // Custom public disks under public/uploads/{section}
        'tools' => [
            'driver' => 'local',
            'root' => public_path('uploads/tools'),
            'url' => env('APP_URL') . '/uploads/tools',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'projects_images' => [
            'driver' => 'local',
            'root' => public_path('uploads/projects'),
            'url' => env('APP_URL') . '/uploads/projects',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'brands_logos' => [
            'driver' => 'local',
            'root' => public_path('uploads/brands'),
            'url' => env('APP_URL') . '/uploads/brands',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'blogs_images' => [
            'driver' => 'local',
            'root' => public_path('uploads/blogs'),
            'url' => env('APP_URL') . '/uploads/blogs',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'services_images' => [
            'driver' => 'local',
            'root' => public_path('uploads/services'),
            'url' => env('APP_URL') . '/uploads/services',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'about' => [
            'driver' => 'local',
            'root' => public_path('uploads/about'),
            'url' => env('APP_URL') . '/uploads/about',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
