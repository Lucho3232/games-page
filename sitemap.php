<?php
header("Content-Type: application/xml; charset=utf-8");

$urls = [
    [
        "loc" => "https://lovegaminghub.com/",
        "lastmod" => date("Y-m-d"),
        "changefreq" => "daily",
        "priority" => "1.0"
    ],
    [
        "loc" => "https://lovegaminghub.com/bee-swarm-simulator-roblox-wiki-guide",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/best-rods-in-fisch",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/cryoskin-fisch-roblox",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/enchanting-fisch-roblox",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/inferno-hide-fisch-roblox",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/megalodon-fisch-roblox",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/roblox-fisch-codes",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/scylla-fisch-roblox",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/the-forge-roblox-codes",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/the-forge-roblox-ores",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/roblox-bee-swarm-simulator-codes",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/guide-roblox-escape-tsunami-for-brainrots",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/roblox-guides",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/roblox-codes",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/roblox-collect-all-pets-codes",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/archero-2-codes",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    [
        "loc" => "https://lovegaminghub.com/mobile-games",
        "lastmod" => "2026-01-10",
        "changefreq" => "weekly",
        "priority" => "0.9"
    ],
    // añade más URLs aquí
];

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url): ?>
  <url>
    <loc><?= htmlspecialchars($url["loc"]) ?></loc>
    <lastmod><?= $url["lastmod"] ?></lastmod>
    <changefreq><?= $url["changefreq"] ?></changefreq>
    <priority><?= $url["priority"] ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
