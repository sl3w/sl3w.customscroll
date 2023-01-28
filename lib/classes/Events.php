<?php

namespace Sl3w\CustomScroll;

use Sl3w\CustomScroll\Settings as Settings;

class Events
{
    public static function AppendScriptsToPageWebkit()
    {
        $webkitWidth = Settings::get('webkit_width');
        $webkitBgColorTrack = Settings::get('webkit_background_color_track');
        $webkitShowShadowTrack = Settings::yes('webkit_show_shadow_track');
        $webkitBgColorThumb = Settings::get('webkit_background_color_thumb');
        $webkitBgImageThumb = Settings::get('webkit_background_image_thumb');
        $webkitBorderRadThumb = Settings::get('webkit_border_radius_thumb');
        $webkitBorderThick = Settings::get('webkit_border_thick');
        $webkitBorderColor = Settings::get('webkit_border_color');

        if (!defined('ADMIN_SECTION')) {
            sl3w_asset()->addString(
                '<style>' .
                '::-webkit-scrollbar {' .
                ($webkitWidth ? 'width:' . $webkitWidth . ';' : '15px') .
                '}' .

                '::-webkit-scrollbar-track {' .
                ($webkitBgColorTrack ? 'background-color:' . $webkitBgColorTrack . ';' : '') .
                ($webkitShowShadowTrack ? '-webkit-box-shadow: inset 0 0 5px rgb(0 0 0 / 50%);' : '') .
                '}' .

                '::-webkit-scrollbar-thumb {' .
                ($webkitBgColorThumb ? 'background-color:' . $webkitBgColorThumb . ';' : '') .

                ($webkitBgImageThumb ? 'background-image:' . $webkitBgImageThumb . ';' : '') .

                ($webkitBorderRadThumb ? 'border-radius:' . $webkitBorderRadThumb . ';' : '') .

                ($webkitBorderThick && $webkitBorderColor ? 'border: ' . $webkitBorderThick . ' solid ' . $webkitBorderColor . ';' : '') .
                '}'
                . '</style>',
                true
            );
        }
    }

    public static function AppendScriptsToPageFirefox()
    {
        if (!defined('ADMIN_SECTION')) {
            $firefoxColorThumb = Settings::get('firefox_color_thumb');
            $firefoxColorTrack = Settings::get('firefox_color_track');

            sl3w_asset()->addString(
                '<style>' .
                'body, html {' .
                ($firefoxColorThumb && $firefoxColorTrack ? 'scrollbar-color: ' . $firefoxColorThumb . ' ' . $firefoxColorTrack . ';'
                    . 'scrollbar-width: thin;'
                    : '') .
                '}'
                . '</style>',
                true
            );
        }
    }
}