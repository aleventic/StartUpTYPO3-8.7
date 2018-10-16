page = PAGE
page {
    typeNum = 0
    config.contentObjectExceptionHandler = 0
    config.metaCharset = UTF-8
    config.baseURL = {$config.baseURL}
    config.linkVars = L
    config.sys_language_uid = 0
    config.sys_language_overlay = 0
    config.sys_language_mode = ignore
    config.language = de
    config.locale_all = de_DE.UTF-8
    config.htmlTag_setParams = lang="de" dir="ltr" class="no-js"

    // Declaring of FlUIDTEMPLATE PAGE
    10 = FLUIDTEMPLATE
    10 {
        extbase.controllerExtensionName = Smedia
        // Template search
        templateName = TEXT
        templateName {
            data = levelfield:-1, backend_layout_next_level, slide
            override.field = backend_layout
            split {
                token = pagets__
                1.current = 1
                1.wrap = |
            }
        }

        // Declaring of Root Paths
        layoutRootPaths.10 = EXT:main_base/Resources/Private/Page/SiteLayouts/Layouts/
        partialRootPaths.10 = EXT:main_base/Resources/Private/Page/SiteLayouts/Partials/
        templateRootPaths.10 = EXT:main_base/Resources/Private/Page/SiteLayouts/Templates/

        variables {
            // Declaring of Content Render Types for Backend Layouts
            content = CONTENT
            content {
                table = tt_content
                select {
                    orderBy = sorting
                    where = colPos = 0
                    languageField = sys_language_uid
                }
            }
        }
    }
}

// Removing Default Style
plugin.tx_frontend._CSS_DEFAULT_STYLE >

// Shifting all Javascipts to Footer
config.moveJsFromHeaderToFooter = 1

// Includes Meta Configuration, Header and Footer
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:main_base/Configuration/TypoScript/Page/pageMeta.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:main_base/Configuration/TypoScript/Page/pageHeader.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:main_base/Configuration/TypoScript/Page/pageFooter.ts">