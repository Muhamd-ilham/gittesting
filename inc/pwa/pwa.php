<?php 
/**
 * ======================================
 * PWA (Progressive Web App) by Oketheme
 * ======================================
 */

// Head Manigest
add_action('wp_head', function () {
    echo '<link rel="manifest" href="' . esc_url(home_url('/wp-json/pwa/manifest')) . '">';
});

// Json Manifest
add_action('rest_api_init', function () {
    register_rest_route('pwa', '/manifest', [
        'methods'  => 'GET',
        'callback' => function () {
            global $oketheme;
            $icons = [];

            if ($oketheme['fav_web']) {
                // Icon From Theme Options
                $icons[] = [
                    "src" => $oketheme['fav_web'],
                    "sizes" => "192x192",
                    "type" => "image/png"
                ];
                $icons[] = [
                    "src" => $oketheme['fav_web'],
                    "sizes" => "512x512",
                    "type" => "image/png"
                ];
            } 
            else {
                // Icon From Site Icon
                if ($icon192 = get_site_icon_url(192)) {
                    $icons[] = [
                        "src" => $icon192,
                        "sizes" => "192x192",
                        "type" => "image/png"
                    ];
                }
                
                if ($icon512 = get_site_icon_url(512)) {
                    $icons[] = [
                        "src" => $icon512,
                        "sizes" => "512x512",
                        "type" => "image/png"
                    ];
                }
            }

            // Fallback kalau belum ada icon
            if (empty($icons)) {
                $theme_url = get_stylesheet_directory_uri();
                $icons = [
                    [
                        "src" => $theme_url . "/inc/pwa/img/icon-192.png",
                        "sizes" => "192x192",
                        "type" => "image/png"
                    ],
                    [
                        "src" => $theme_url . "/inc/pwa/img/icon-512.png",
                        "sizes" => "512x512",
                        "type" => "image/png"
                    ]
                ];
            }

            $title = $oketheme['nama_web']?: get_bloginfo('name');

            $manifest = [
                "name" => $title,
                "short_name" => $title,
                "start_url" => "/",
                "display" => "standalone",
                "background_color" => "#ffffff",
                "theme_color" => "#000000",
                "icons" => $icons
            ];
            return $manifest;
        }
    ]);
});


// Enqueue service worker
add_action('wp_footer', function () {
    ?>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('<?php echo get_stylesheet_directory_uri(); ?>/inc/pwa/service-worker.js')
            .then(function(reg) {
                console.log('Service worker registered ✅', reg);
            })
            .catch(function(err) {
                console.warn('Service worker failed ❌', err);
            });
        }
    </script>
    <?php
});

add_action('wp_footer', function () { ?>
    <script>
        let deferredPrompt;
        const installBtn = document.getElementById('installAppBtn');

        // Tangkap event sebelum install prompt
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault(); // cegah auto popup
            deferredPrompt = e; // simpan event
            installBtn.style.display = 'flex'; // tampilkan tombol
        });

        // Event klik tombol
        installBtn.addEventListener('click', async () => {
            installBtn.style.display = 'none'; // sembunyikan tombol
            if (deferredPrompt) {
                deferredPrompt.prompt(); // munculkan prompt install
                const { outcome } = await deferredPrompt.userChoice;
                console.log('User choice:', outcome);
                deferredPrompt = null; // reset event
            }
        });

        // Event setelah app terinstall
        window.addEventListener('appinstalled', () => {
            // console.log('Aplikasi sudah terpasang ✅');
            installBtn.style.display = 'none'; // sembunyikan tombol
        });
    </script>
    <?php
});