<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin'   => \App\Filters\FilterAdmin::class,
        'filteranggota'   => \App\Filters\FilterAnggota::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'filteradmin' => [
                'except' => [
                    'Auth', 'Auth/*',
                    'Home', 'Home/*',
                    '/'
                ]
            ],
            'filteranggota' => [
                'except' => [
                    'Auth', 'Auth/*',
                    'Home', 'Home/*',
                    '/'
                ]
            ]
        ],
        'after' => [
            'filteradmin' => [
                'except' => [
                    'Auth', 'Auth/*',
                    'Home', 'Home/*',
                    '/',
                    'Admin', 'Admin/*',
                    'Kategori', 'Kategori/*',
                    'Rak', 'Rak/*',
                    'User', 'User/*',
                    'Penerbit', 'Penerbit/*',
                    'Penulis', 'Penulis/*',
                    'Kelas', 'Kelas/*',
                    'Web', 'Web/*',
                    'Anggota', 'Anggota/*',
                    'Buku', 'Buku/*',
                    'Peminjaman', 'Peminjaman/*',
                    'Peminjaman1', 'Peminjaman1/*',
                    'Laporan', 'Laporan/*',
                    'Hilang', 'Hilang/*',
                    'Denda', 'Denda/*',
                    'Pengembalian', 'Pengembalian/*',

                ]
            ],
            'filteranggota' => [
                'except' => [
                    'Auth', 'Auth/*',
                    'Home', 'Home/*',
                    '/',
                    'Anggota', 'Anggota/*',
                    'Peminjaman1', 'Peminjaman1/*',
                ]
            ],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
