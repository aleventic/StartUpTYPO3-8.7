mod{
    // ================================================================================
    // BackendLayout Definitions
    web_layout{
        BackendLayouts{
            // One Column Layout
            Startpage {
                title = LLL:EXT:main_base/Resources/Private/Language/locallang.xlf:one_column_title
                config{
                    backend_layout{
                        colCount = 1
                        rowCount = 1
                        rows{
                            1{
                                columns{
                                    1{
                                        name = LLL:EXT:main_base/Resources/Private/Language/locallang.xlf:one_column
                                        colPos = 0
                                        allowed = *
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    // Default Language set
    SHARED {
        defaultLanguageFlag = de
        defaultLanguageLabel = Deutsch
    }
}


