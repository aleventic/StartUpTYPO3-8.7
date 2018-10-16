// Javascript Footer include Configuration
page {
    // Numbers between 10 and 100 are for stylesheet reserved
    // The main_base.min.css is at last place its the override css for everything else
    footerData.90 = TEXT
    footerData.90.wrap (
        <link rel="stylesheet" type="text/css" href="/typo3conf/ext/main_base/Resources/Public/css/main_base.min.css" media="all">
    )

    // Numbers 100+ are for javascript reserved
    // The main_base.min.js needs to be the last one for overrides
    footerData.100 = TEXT
    footerData.100.wrap (
        <script type="text/javascript" src="/typo3conf/ext/main_base/Resources/Public/js/main_base.min.js" defer></script>
    )
}