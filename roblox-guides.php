<?php
if (isset($_GET['page']) && $_GET['page'] == 1) {
  header("Location: /roblox-guides", true, 301);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php
require __DIR__ . "/includes/roblox-articles.php";


function timeAgo($date) {
  $timestamp = strtotime($date);
  $diff = time() - $timestamp;

  if ($diff < 60) return "Just now";
  if ($diff < 3600) return floor($diff / 60) . " minutes ago";
  if ($diff < 86400) return floor($diff / 3600) . " hours ago";
  if ($diff < 604800) return floor($diff / 86400) . " days ago";

  return date("M j, Y", $timestamp);
}

function getBadge($date) {
  $days = (time() - strtotime($date)) / 86400;

  if ($days <= 3) return "NEW";
  if ($days <= 14) return "UPDATED";

  return null;
}

function getArticleImage($article) {
  if (!empty($article['image'])) {
    return $article['image'];
  }

  return match ($article['category']) {
    "fisch" => "/images/fallback/fisch.jpg",
    "codes" => "/images/fallback/codes.jpg",
    "bee"   => "/images/fallback/bee-swarm.jpg",
    default => "/images/fallback/default.jpg",
  };
}

/* CONFIG */
$perPage = 10;

/* PAGINA ACTUAL */
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

/* CALCULOS */
$totalArticles = count($robloxArticles);
$totalPages = ceil($totalArticles / $perPage);
$offset = ($page - 1) * $perPage;

/* ARTICULOS A MOSTRAR */
$articles = array_slice($robloxArticles, $offset, $perPage);

/* SEO */
$pageTitle = $page > 1 
  ? "Roblox Guides – Page $page | LoveGamingHub"
  : "Roblox Guides | LoveGamingHub";

$pageDescription = "Complete Roblox guides.";
if ($page > 1) {
  $pageDescription .= " Page $page.";
}
?>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$h1 = $page > 1
  ? "Roblox Guides – Page $page"
  : "Roblox Guides";
?>
    <?php include 'includes/config.php'; ?>

    <?php
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $canonical = "https://lovegaminghub.com/roblox-guides";

        if ($page > 1) {
        $canonical .= "?page=" . $page;
            }
    ?>

    <link rel="canonical" href="<?= $canonical ?>">
    
    <?php include 'includes/head.php'; ?>
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/static.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/back-to-top.css">
    <link rel="stylesheet" href="css/paginacion.css">
    <link rel="stylesheet" href="css/guias.css">
    
<style>


.pagination {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  margin: 60px 0;
}

.pagination a {
  padding: 8px 14px;
  border-radius: 10px;
  border: 1px solid #e5e7eb;
  text-decoration: none;
  color: #333;
  font-weight: 600;
}

.pagination a.active {
  background: linear-gradient(135deg, #6a11cb, #2575fc);
  color: #fff;
  border: none;
}

.pagination a:hover {
  background: #eef2ff;
}


</style>

</head>
<body style="background-color: #f4f5f9;">
    <?php include 'includes/header.php'; ?>
    <main>
        <div style="background-color: #edf2f7;border:1px solid #dcdcdc;">
            <div style="max-width:1000px;margin:auto;padding:0 5px">
                <a href="https://lovegaminghub.com" style="color: #4a5568;font-weight: 500;font-size:.75rem;text-decoration:none">Home</a>
                <span style="color: #4a5568;font-weight: 500;font-size:.75rem"> » </span>
                <a href="https://lovegaminghub.com/roblox-guides" style="color: #4a5568;font-weight: 500;font-size:.75rem;text-decoration:none">Roblox Guides</a>
            </div>
        </div>
        <div class="container">
            <div class="container-principal">
                <h1><?= $h1 ?></h1>

                <h2 style="margin-bottom:20px;font-size:19px" class="articles-count">
                     (<?= $totalArticles ?>) Stories
                </h2>
                <section class="grid">

                    <?php foreach ($articles as $article): 
                        $badge = getBadge($article['date']);
                        ?>
                        <article class="discover-card">
                        <a href="<?= $article['url'] ?>" class="discover-link">

                            <div class="discover-image">

                            <?php if ($badge): ?>
                                <span class="new-badge <?= strtolower($badge) ?>">
                                <?= $badge ?>
                                </span>
                            <?php endif; ?>

                            <img 
                                src="<?= getArticleImage($article) ?>"
                                alt="<?= htmlspecialchars($article['title']) ?>"
                                loading="lazy"
                            >
                            </div>

                            <div class="discover-content">
                            <h2 class="discover-title"><?= $article['title'] ?></h2>

                            <div class="discover-meta">
                                <span class="discover-author">
                                    <img 
                                        src="/images/favicon/apple-touch-icon.png" 
                                        alt="LoveGamingHub logo"
                                        class="author-logo"
                                        loading="lazy">
                                    LoveGamingHub
                                </span>
                                <span class="discover-time"><?= timeAgo($article['date']) ?></span>
                            </div>
                            </div>

                        </a>
                        </article>
                        <?php endforeach; ?>



                </section>

                <!-- PAGINACION -->
                <nav class="pagination" aria-label="Pagination">
                    <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">← Previous</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>">Next →</a>
                    <?php endif; ?>
                </nav>
           
            </div>

            <aside class="related-articles">
            <h2>Trending Stories in Roblox</h2>
            <ul>
                <li>
                    <a href="https://lovegaminghub.com/best-rods-for-fisch">
                    <span class="title"><span class="rel-number">1</span>Best rods in fisch <?php echo $siteYear; ?> based on my experience</span>
                </a>
                </li>
                <li>
                <a href="https://lovegaminghub.com/inferno-hide-fisch-roblox">
                    <span class="title"><span class="rel-number">2</span>Inferno Hide in Fisch: tips on how to catch it</span>
                </a>
                </li>
                <li>
                <a href="https://lovegaminghub.com/scylla-fisch-roblox">
                    <span class="title"><span class="rel-number">3</span>Scylla in Fisch: tips and secrets on how to catch it</span>
                </a>
                </li>
                <li>
                <a href="https://lovegaminghub.com/enchanting-fisch-roblox">
                    <span class="title"><span class="rel-number">4</span>Enchanting in Fisch: Best Enchantments & How to Get Them</span>
                </a>
                </li>
                <li>
                <a href="https://lovegaminghub.com/megalodon-fisch-roblox">
                    <span class="title"><span class="rel-number">5</span>Megalodon in Fisch: tips and secrets on how to catch it</span>
                </a>
                </li>
                <li>
                <a href="https://lovegaminghub.com/cryoskin-fisch-roblox">
                    <span class="title"><span class="rel-number">6</span>Cryoskin in Fisch: tips on how to catch it</span>
                </a>
                </li>
            </ul>
            </aside>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?> 
    <button id="backToTop" aria-label="Back to top">↑</button>

    <script src="js/header.js"></script>
    <script src="js/scroll-to-top.js"></script>
</body>
</html>