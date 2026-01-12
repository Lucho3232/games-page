<?php if (!empty($updatedDateISO)): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?= htmlspecialchars($pageTitle, ENT_QUOTES) ?>",
  "description": "<?= htmlspecialchars($pageDescription, ENT_QUOTES) ?>",
  "dateModified": "<?= $updatedDateISO ?>",
  "author": {
    "@type": "Organization",
    "name": "LoveGamingHub"
  },
  "publisher": {
    "@type": "Organization",
    "name": "LoveGamingHub"
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?= $canonical ?? '' ?>"
  }
}
</script>
<?php endif; ?>
