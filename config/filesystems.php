<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],
        'admin' => [
            'driver' => 'local',
            'root' => public_path('upload'),
            'visibility' => 'public',
        ],
        'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default'   => 'http://p22vshs5l.bkt.clouddn.com', //你的七牛域名
                'https'     => 'dn-yourdomain.qbox.me',         //你的HTTPS域名
                'custom'    => 'www.bearDoctor.com',                //你的自定义域名
            ],
            'access_key'=> 'GMhTX0OI4Jg8p-i-16PkJBMfSLTIeuDbPkbJ4Z8l',  //AccessKey
            'secret_key'=> 'rEd0uphLR7Lmi8gNtXpdVSTjdPGhDSbDhKnyYxfB',  //SecretKey
            'bucket'    => 'beardoctor',  //Bucket名字
            'notify_url'=> '',  //持久化处理回调地址
        ],
        'uploads' => [

            'driver' => 'local',

            // 文件将上传到storage/app/uploads目录
            'root' => public_path('upload'),

            // 文件将上传到public/uploads目录 如果需要浏览器直接访问 请设置成这个
            //'root' => public_path('uploads'),
        ],

    ],

];
