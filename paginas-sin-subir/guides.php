<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/config.php'; 
    $monthYear = $siteDateText;
    ?>


    <?php
$sliders = [
    "fisch" => [
        "category_name" => "Fisch Guides",
        "autoplay" => 5000,
        "articles" => [
            ["title" => "Best rods in fisch 2026 based on my experience", "date" => "2026-01-08", "description" => "Discover the best rods in Fisch for $siteYear. Updated rankings, stats, and tips.", "image" => "https://static.wikitide.net/fischwiki/thumb/a/ae/Astraeus_Serenade.png/234px-Astraeus_Serenade.png", "url" => "https://lovegaminghub.com/best-rods-in-fisch"],
            ["title" => "Cryoskin in Fisch: tips on how to catch it", "date" => "2026-01-08", "description" => "Struggling to catch Cryoskin in Fisch? Discover the best tips and locations.", "image" => "https://lovegaminghub.com/images/fisch/cryoskin.jpg", "url" => "https://lovegaminghub.com/cryoskin-fisch-roblox"],
            ["title" => "Enchanting in Fisch: Best Enchantments & How to Get Them", "date" => "2026-01-08", "description" => "Complete guide to enchanting in Fisch. Learn the best enchantments.", "image" => "https://static.wikitide.net/fischwiki/thumb/d/d3/Enchanting.png/271px-Enchanting.png", "url" => "https://lovegaminghub.com/enchanting-fisch-roblox"],
            ["title" => "Inferno Hide in Fisch: tips on how to catch it", "date" => "2026-01-08", "description" => "Learn how to catch Inferno Hide in Fisch with the best tips.", "image" => "https://lovegaminghub.com/images/fisch/inferno-hide.jpg", "url" => "https://lovegaminghub.com/inferno-hide-fisch-roblox"],
            ["title" => "Megalodon in Fisch: tips and secrets on how to catch it", "date" => "2026-01-08", "description" => "Learn how to catch Megalodon in Fisch with expert tips.", "image" => "https://lovegaminghub.com/images/fisch/ancient-megalodon.jpg", "url" => "https://lovegaminghub.com/megalodon-fisch-roblox"],
            ["title" => "Scylla in Fisch: tips and secrets on how to catch it", "date" => "2026-01-08", "description" => "Trying to catch Scylla in Fisch? Discover secret tips and best locations.", "image" => "https://lovegaminghub.com/images/fisch/scylla.jpg", "url" => "https://lovegaminghub.com/scylla-fisch-roblox"],
            ["title" => "All active Fisch Roblox codes in $monthYear (Updated)", "date" => "2026-01-08", "description" => "Looking for Fisch Roblox codes? Get all active codes here.", "image" => "https://lovegaminghub.com/images/fisch/redeem-codes.jpg", "url" => "https://lovegaminghub.com/roblox-fisch-codes"]
        ]
    ],
    "bee_swarm" => [
        "category_name" => "Bee Swarm Simulator Guides",
        "autoplay" => 5000,
        "articles" => [
            ["title" => "Roblox Bee Swarm Simulator Wiki: A Complete Progression Guide", "date" => "2026-01-08", "description" => "Complete Bee Swarm Simulator progression guide.", "image" => "/images/bee-swarm-simulator/bee-swarm-simulator-wiki-guide.jpg", "url" => "https://lovegaminghub.com/bee-swarm-simulator-roblox-wiki-guide"],
            ["title" => "All active Bee Swarm Simulator Roblox codes in $monthYear (Updated)", "date" => "2026-01-08", "description" => "Find all active Bee Swarm Simulator codes.", "image" => "https://lovegaminghub.com/images/bee-swarm-simulator/how-to-redeem-code.jpg", "url" => "https://lovegaminghub.com/roblox-bee-swarm-simulator-codes"]
        ]
    ],
    "the_forge" => [
        "category_name" => "The Forge Guides",
        "autoplay" => 5000,
        "articles" => [
            ["title" => "All active The Forge Roblox codes in $monthYear (Updated)", "date" => "2026-01-08", "description" => "Looking for The Forge Roblox codes? Get them here.", "image" => "https://lovegaminghub.com/images/the-forge/how-to-redeem-code-the-forge.jpg", "url" => "https://lovegaminghub.com/the-forge-roblox-codes"],
            ["title" => "Roblox The Forge ores | Traits tier list", "date" => "2026-01-08", "description" => "Roblox The Forge ores traits tier list.", "image" => "https://lovegaminghub.com/images/the-forge/stone.webp", "url" => "https://lovegaminghub.com/the-forge-roblox-ores"]
        ]
    ],
    "web_dev" => [
        "category_name" => "Archero 2 Guides",
        "autoplay" => 5000,
        "articles" => [
            ["title" => "All active Archero 2 codes in $monthYear (Updated)", "date" => "2026-01-08", "description" => "Updated list of working Archero 2 codes in $monthYear. Claim free rewards, boosts, and items before they expire.", "image" => "https://lovegaminghub.com/images/archero-2/how-to-redeem-code.jpg", "url" => "https://lovegaminghub.com/archero-2-codes"],
        ]
    ]
];
?>
    <?php include 'includes/head.php'; ?>
    <link rel="stylesheet" href="https://lovegaminghub.com/css/header.css">
    <link rel="stylesheet" href="https://lovegaminghub.com/css/general.css">
    <link rel="stylesheet" href="https://lovegaminghub.com/css/static.css">
    <link rel="stylesheet" href="https://lovegaminghub.com/css/footer.css">
    <link rel="stylesheet" href="https://lovegaminghub.com/css/back-to-top.css">
    <link rel="stylesheet" href="css/slider.css">
</head>
<body style="background-color: #f4f5f9;">
    <?php include 'includes/header.php'; ?>
    <main>
    <div class="container">
        <div class="container-principal" style="width: 100%; max-width:100%">
            <h1>Guides</h1>
            <p>The best guides on LoveGamingHub to improve your gaming experience.</p>

            <?php foreach ($sliders as $key => $config): ?>
                <?php 
                    $total_articulos = count($config['articles']); 
                    $clase_cantidad = "has-" . $total_articulos . "-items";
                ?>

                <h2 style="margin-top: 40px;"><?php echo $config['category_name']; ?></h2>
                
                <section class="slider <?php echo $clase_cantidad; ?>" data-autoplay="<?php echo $config['autoplay']; ?>">
                    <div class="slider__viewport">
                        <div class="slider__track">
                            <?php foreach ($config['articles'] as $article): ?>
                                <article class="slide">
                                    <a href="<?php echo $article['url']; ?>">
                                        <img src="<?php echo $article['image']; ?>" 
                                             alt="<?php echo $article['title']; ?>" 
                                             width="400" height="250" loading="lazy">
                                        <div class="slide-content">
                                            <time datetime="<?php echo $article['date']; ?>"><?php echo date("d M Y", strtotime($article['date'])); ?></time>
                                            <h3><?php echo $article['title']; ?></h3>
                                            <p><?php echo $article['description']; ?></p>
                                        </div>
                                    </a>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button class="nav-slider prev" aria-label="Previous">‹</button>
                    <button class="nav-slider next" aria-label="Next">›</button>
                    <div class="dots"></div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</main>

    <?php include 'includes/footer.php'; ?>
    
    <button id="backToTop" aria-label="Back to top">↑</button>


    <script src="js/header.js"></script>
    <script src="https://lovegaminghub.com/js/slider.js"></script>

    

</body>
</html>