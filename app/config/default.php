<?php

    /**
     * Default configuration file for project.  This is the base config file, which all other config files must override.
     *
     * For example, you can override values in this config file by creating your own `development.php` config file in this same directory.
     */
     
    return [      
        // Filesystem paths
        'path'    => [
            'document_root'     => str_replace(DIRECTORY_SEPARATOR, \UserFrosting\DS, $_SERVER['DOCUMENT_ROOT']),
            'public_relative'   => dirname($_SERVER['SCRIPT_NAME'])      // The location of `index.php` relative to the document root.  Use for sites installed in subdirectories.
        ],
        'session' => [
            'name' => 'userfrosting',
            'cache_limiter' => false
        ],            
        'db'      =>  [
            'db_host'  => 'localhost',
            'db_name'  => 'database',
            'db_user'  => 'username',
            'db_pass'  => 'password',
            'db_prefix'=> ''
        ],
        'mail'    => 'smtp',
        'smtp'    => [
            'host' => 'mail.example.com',
            'port' => 465,
            'auth' => true,
            'secure' => 'ssl',
            'user' => 'relay@example.com',
            'pass' => 'password'
        ],
        'site' => [
            'title'     =>      "UserFrosting",
            'author'    =>      "Alex Weissman",
            // URLs
            'uri' => [
                'base' => [
                    'host'              => $_SERVER['SERVER_NAME'],
                    'scheme'            => empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off' ? 'http' : 'https',
                    'port'              => null,
                    'path'              => dirname($_SERVER['SCRIPT_NAME'])
                ],
                'assets-raw'        => "assets-raw",
                'assets'            => "assets"
            ]          
        ],   
        'timezone' => 'America/New_York',
        'error_reporting' => E_ALL,  // Development - report all errors and suggestions
        'display_errors'  => "off",
        'use_raw_assets'  => true
    ];
    