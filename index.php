<?php
// الصفحة الرئيسية لموقع الحلويات.
// الصفحات المرتبطة أدناه يمكن إنشاؤها لاحقًا كملفات PHP مستقلة.

$siteName = 'الحلويات';

$categories = [
    [
        'icon' => '🍰',
        'title' => 'الكيك والطورطات',
        'description' => 'وصفات الكيك الهش والطورطات بمختلف النكهات.',
        'url' => 'recipes.php?category=cakes',
    ],
    [
        'icon' => '🧁',
        'title' => 'حلويات تقليدية',
        'description' => 'حلويات من مطبخنا بنكهات أصيلة.',
        'url' => 'recipes.php?category=traditional',
    ],
    [
        'icon' => '🍪',
        'title' => 'البسكويت والحلويات الصغيرة',
        'description' => 'أفكار لذيذة للتقديم مع القهوة والشاي.',
        'url' => 'recipes.php?category=biscuits',
    ],
    [
        'icon' => '🎉',
        'title' => 'حلويات المناسبات',
        'description' => 'وصفات جميلة للأعياد والزيارات والمناسبات.',
        'url' => 'recipes.php?category=occasions',
    ],
    [
        'icon' => '⏱️',
        'title' => 'وصفات سهلة وسريعة',
        'description' => 'حلويات بسيطة عندما يكون الوقت قصيرًا.',
        'url' => 'recipes.php?category=easy',
    ],
];

$featuredRecipes = [
    [
        'icon' => '🍮',
        'title' => 'قاطو الفاني',
        'description' => 'وصفة كيك بالفاني، يمكن إضافة المقادير وطريقة التحضير في صفحتها الخاصة.',
        'slug' => 'gateau-vanille',
        'tag' => 'كيك',
    ],
    [
        'icon' => '🍰',
        'title' => 'قاطو خفيف',
        'description' => 'فكرة حلوى خفيفة مناسبة للتقديم مع القهوة والشاي.',
        'slug' => 'gateau-leger',
        'tag' => 'سهل',
    ],
];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="موقع الحلويات: اكتشفوا وصفات الكيك والحلويات التقليدية وحلويات المناسبات، مع المقادير وخطوات التحضير.">
    <meta name="theme-color" content="#a94e20">
    <title>الحلويات | وصفات سهلة ولذيذة</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="index.php" aria-label="العودة إلى الصفحة الرئيسية">
                <span class="brand-icon" aria-hidden="true">🍰</span>
                <span><?= htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8') ?></span>
            </a>

            <nav class="main-nav" aria-label="القائمة الرئيسية">
                <a class="active" href="index.php">الرئيسية</a>
                <a href="recipes.php">كل الوصفات</a>
                <a href="#categories">الأقسام</a>
                <a href="about.php">من نحن</a>
                <a href="contact.php">اتصل بنا</a>
            </nav>

            <a class="header-link" href="recipes.php">تصفّح الوصفات</a>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-inner">
                <div class="hero-copy">
                    <span class="eyebrow">مرحبًا بكم في مطبخ الحلويات</span>
                    <h1>وصفات لذيذة تُحضَّر <span>بكل حب</span></h1>
                    <p>
                        هنا تلقاو وصفات سهلة ومتنوعة للحلويات والكيك.
                        اختاروا وصفتكم، وتعرّفوا على المقادير وخطوات التحضير خطوة بخطوة.
                    </p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="recipes.php">اكتشفوا الوصفات</a>
                        <a class="button button-light" href="#categories">اختاروا قسمًا</a>
                    </div>
                </div>

                <div class="hero-art" aria-label="رسم تعبيري لقطعة حلوى">
                    <span class="hero-sparkle sparkle-one">✦</span>
                    <span class="hero-cake" aria-hidden="true">🍰</span>
                    <span class="hero-sparkle sparkle-two">✧</span>
                    <span class="hero-note">مذاق البيت أحلى</span>
                </div>
            </div>
        </section>

        <section class="search-section" aria-label="البحث عن وصفة">
            <div class="container search-panel">
                <div>
                    <h2>ابحثوا عن وصفتكم المفضلة</h2>
                    <p>اكتبوا اسم الحلوى التي تبحثون عنها.</p>
                </div>
                <form class="search-form" action="search.php" method="get" role="search">
                    <label class="visually-hidden" for="recipe-search">اسم الوصفة</label>
                    <input id="recipe-search" type="search" name="q" placeholder="مثال: قاطو الفاني..." required>
                    <button type="submit">بحث</button>
                </form>
            </div>
        </section>

        <section class="section container" id="categories">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">اختاروا ما تحبون</span>
                    <h2>أقسام الوصفات</h2>
                </div>
                <a class="text-link" href="recipes.php">عرض كل الوصفات ←</a>
            </div>

            <div class="category-grid">
                <?php foreach ($categories as $category): ?>
                    <a class="category-card" href="<?= htmlspecialchars($category['url'], ENT_QUOTES, 'UTF-8') ?>">
                        <span class="category-icon" aria-hidden="true"><?= htmlspecialchars($category['icon'], ENT_QUOTES, 'UTF-8') ?></span>
                        <h3><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($category['description'], ENT_QUOTES, 'UTF-8') ?></p>
                        <span class="card-arrow" aria-hidden="true">←</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="section featured-section" id="featured">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <span class="eyebrow">أفكار لتبدأوا بها</span>
                        <h2>وصفات مقترحة</h2>
                    </div>
                    <a class="text-link" href="recipes.php">المزيد من الوصفات ←</a>
                </div>

                <div class="recipe-grid">
                    <?php foreach ($featuredRecipes as $recipe): ?>
                        <article class="recipe-card">
                            <div class="recipe-art" aria-hidden="true">
                                <span><?= htmlspecialchars($recipe['icon'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <div class="recipe-content">
                                <span class="recipe-tag"><?= htmlspecialchars($recipe['tag'], ENT_QUOTES, 'UTF-8') ?></span>
                                <h3><?= htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                                <p><?= htmlspecialchars($recipe['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                <a class="text-link" href="recipe.php?slug=<?= urlencode($recipe['slug']) ?>">شاهدوا الوصفة ←</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="welcome-section">
            <div class="container welcome-inner">
                <div class="welcome-icon" aria-hidden="true">👩‍🍳</div>
                <div>
                    <span class="eyebrow">خطوة بخطوة</span>
                    <h2>من المقادير إلى أحلى نتيجة</h2>
                    <p>هدفنا أن تجدوا الوصفة واضحة: المقادير، طريقة التحضير، ووقت الطهي، حتى يسهل عليكم تطبيقها في البيت.</p>
                </div>
                <a class="button button-primary" href="recipes.php">ابدؤوا التصفح</a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <a class="brand footer-brand" href="index.php">
                <span class="brand-icon" aria-hidden="true">🍰</span>
                <span><?= htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8') ?></span>
            </a>
            <p>وصفات سهلة، ومذاق يجمع العائلة.</p>
            <p class="copyright">© <?= date('Y') ?> موقع الحلويات. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>
</html>
