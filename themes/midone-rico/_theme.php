<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?= theme("/assets/images/logo.svg") ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $head; ?>
    <link rel="stylesheet" href="<?= theme("/assets/css/app.css") ?>" />
    <link rel="stylesheet" href="<?= theme("/assets/css/custom.css") ?>" />
</head>

<body class="app">
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="<?= theme("/assets/images/logo.svg") ?>">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="index.html" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Produtos </div>
                </a>
            </li>
            <li>
                <a href="index.html" class="menu">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Cadastros </div>
                </a>
            </li>
            <li>
                <a href="index.html" class="menu">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Planos </div>
                </a>
            </li>
            <li>
                <a href="index.html" class="menu">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Assinaturas </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
        <div class="top-bar-boxed flex items-center">
            <a href="" class="-intro-x hidden md:flex mr-auto">
                <img alt="Portal Ricopeças" class="w-6" src="<?= theme("/assets/images/logo.svg") ?>">
                <span class="text-white text-lg ml-3"><span class="font-medium">Rico</span>peças</span>
            </a>
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110">
                    <img alt="" src="<?= theme("/assets/images/profile-13.jpg") ?>">
                </div>
                <div class="dropdown-box w-56">
                    <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                        <div class="p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </div>
                        <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="top-nav">
        <ul>
            <li>
                <a href="" class="top-menu top-menu--active">
                    <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="top-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="<?= url("/produtos") ?>" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="top-menu__title"> Produtos </div>
                </a>
            </li>
            <li>
                <a href="<?= url("/ricoshops") ?>" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="pen-tool"></i> </div>
                    <div class="top-menu__title"> Cadastros </div>
                </a>
            </li>
            <li>
                <a href="<?= url("/ricoshops/planos") ?>" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="top-menu__title"> Planos </div>
                </a>
            </li>
            <li>
                <a href="<?= url("/ricoshops/assinaturas") ?>" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="top-menu__title"> Assinaturas </div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                <?= $title ?>
            </h2>
        </div>
        <?php if ($message) : ?>
            <?= $message; ?>
        <?php else: ?>
            <?= flash(); ?>
        <?php endif; ?>
        <?= $v->section("content"); ?>
    </div>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> -->
    <script src="<?= theme("/assets/js/app.js"); ?>"></script>
    <script src="<?= theme("/assets/js/jquery.min.js"); ?>"></script>
    <script src="<?= theme("/assets/js/mask.js"); ?>"></script>
    <script src="<?= theme("/assets/js/custom.js"); ?>"></script>
</body>

</html>