<?php
if(!empty($_GET['ti'])) $ti = abs($_GET['ti']);
else $ti = 25;
$manifest = [
  "dir" => "ltr",
  "lang" => "es-MX",
  "name" => "Metrónomo irregular polirrítmico circular",
  "short_name" => "Metrónomo",
  "display" => "fullscreen",
  "description" => "El metrónomo del futuro: Gratis y Libre",
  "background_color" => "#808080",
  "theme_color" => "#202020",
  "orientation" => "portrait",
  "categories" => ["music","education"],
  "icons" => [
    [
      "src" => "/mc/img/launcher-icon-1x.png",
      "type" => "image/png",
      "sizes" => "48x48"
    ],
    [
      "src" => "/mc/img/launcher-icon-2x.png",
      "type" => "image/png",
      "sizes" => "96x96"
    ],
    [
      "src" => "/mc/img/launcher-icon-4x.png",
      "type" => "image/png",
      "sizes" => "192x192"
    ],
    [
      "src" => "/mc/img/launcher-icon-512.png",
      "type" => "image/png",
      "sizes" => "512x512"
    ]
  ],
  "screenshots" => [
    [
      "src" => "/mc/img/screenshot1.webp",
      "sizes" => "1123x655",
      "type" => "image/webp"
    ],
    [
      "src" => "/mc/img/screenshot2.webp",
      "sizes" => "1080x2340",
      "type" => "image/webp"
    ]
  ],
  "scope" => "/mc/",
  "start_url" => "/mc/?launcher=true&ti=".$ti
];

header('Content-Type: application/manifest+json');
echo json_encode($manifest);
