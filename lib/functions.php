<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\Page\Asset;
use Sl3w\CustomScroll\Settings as Settings;

if (!function_exists('sl3w_asset')) {
    function sl3w_asset()
    {
        return Asset::getInstance();
    }
}

if (!function_exists('sl3w_event_manager')) {
    function sl3w_event_manager()
    {
        return EventManager::getInstance();
    }
}

if (!function_exists('register_add_css_events_webkit')) {
    function register_add_css_events_webkit($reg = true)
    {
        if ($reg) {
            sl3w_event_manager()->registerEventHandler(
                'main',
                'OnBeforeEndBufferContent',
                Settings::getModuleId(),
                'Sl3w\CustomScroll\Events',
                'AppendScriptsToPageWebkit'
            );
        } else {
            sl3w_event_manager()->unRegisterEventHandler(
                'main',
                'OnBeforeEndBufferContent',
                Settings::getModuleId(),
                'Sl3w\CustomScroll\Events',
                'AppendScriptsToPageWebkit'
            );
        }
    }
}

if (!function_exists('register_add_css_events_firefox')) {
    function register_add_css_events_firefox($reg = true)
    {
        if ($reg) {
            sl3w_event_manager()->registerEventHandler(
                'main',
                'OnBeforeEndBufferContent',
                Settings::getModuleId(),
                'Sl3w\CustomScroll\Events',
                'AppendScriptsToPageFirefox'
            );
        } else {
            sl3w_event_manager()->unRegisterEventHandler(
                'main',
                'OnBeforeEndBufferContent',
                Settings::getModuleId(),
                'Sl3w\CustomScroll\Events',
                'AppendScriptsToPageFirefox'
            );
        }
    }
}