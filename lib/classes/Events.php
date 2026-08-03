<?php

namespace Sl3w\CustomScroll;

class Events
{
    private static function checkWidth($checkValue, $defaultValue = '0')
    {
        return preg_match('/^\d+(px|em|rem|%)$/', $checkValue) ? $checkValue : $defaultValue;
    }

    private static function checkHexColor($checkValue, $defaultValue = '#000000')
    {
        return preg_match('/^#[0-9a-fA-F]{3}$/', $checkValue) || preg_match('/^#[0-9a-fA-F]{6}$/', $checkValue) ? $checkValue : $defaultValue;
    }

    private static function checkBackgroundImage($checkValue, $defaultValue = '')
    {
        return preg_match('/^(-webkit-gradient|linear-gradient|radial-gradient|repeating-linear-gradient|repeating-radial-gradient|rgb|rgba|hsl|hsla|#|transparent|none|url\(data:)/i', $checkValue) ? $checkValue : $defaultValue;
    }

    public static function AppendScriptsToPageWebkit()
    {
        $webkitWidth = self::checkWidth(Settings::get('webkit_width'), '15px');
        $webkitBgColorTrack = self::checkHexColor(Settings::get('webkit_background_color_track'));
        $webkitShowShadowTrack = Settings::yes('webkit_show_shadow_track');
        $webkitBgColorThumb = self::checkHexColor(Settings::get('webkit_background_color_thumb'));
        $webkitBgImageThumb = self::checkBackgroundImage(Settings::get('webkit_background_image_thumb'));

        $webkitBorderRadThumb = self::checkWidth(Settings::get('webkit_border_radius_thumb'));
        $webkitBorderThick = self::checkWidth(Settings::get('webkit_border_thick'));
        $webkitBorderColor = self::checkHexColor(Settings::get('webkit_border_color'));

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
            // Проверяем цвета на корректный HEX-формат
            $firefoxColorThumb = self::checkHexColor(Settings::get('firefox_color_thumb'));
            $firefoxColorTrack = self::checkHexColor(Settings::get('firefox_color_track'));

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