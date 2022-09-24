<?php

CModule::AddAutoloadClasses(
    'sl3w.customscroll',
    [
        'Sl3w\CustomScroll\Settings' => 'lib/classes/Settings.php',
        'Sl3w\CustomScroll\Events' => 'lib/classes/Events.php',
    ]
);