<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\HttpApplication;
use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

$request = HttpApplication::getInstance()->getContext()->getRequest();

$module_id = htmlspecialcharsbx($request['mid'] != '' ? $request['mid'] : $request['id']);

Loader::includeModule($module_id);

$aTabs = [
    [
        'DIV' => 'edit',
        'TAB' => Loc::getMessage('SL3W_CUSTOMSCROLL_OPTIONS_TAB_NAME'),
        'TITLE' => Loc::getMessage('SL3W_CUSTOMSCROLL_OPTIONS_TAB_NAME'),
        'OPTIONS' => [
            Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_COMMON'),
            [
                'switch_on',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_SWITCH_ON'),
                'N',
                ['checkbox']
            ],

            Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_WEBKIT'),
            ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_WEBKIT_NOTE')],
            [
                'switch_on_webkit',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_SWITCH_ON_WEBKIT'),
                'N',
                ['checkbox']
            ],
            [
                'webkit_width',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_WIDTH'),
                '15px',
                ['text', 10]
            ],
            [
                'webkit_background_color_track',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BACKGROUND_COLOR_TRACK'),
                '#F5F5F5',
                ['text', 10]
            ],
            [
                'webkit_show_shadow_track',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_SHOW_SHADOW_TRACK'),
                'N',
                ['checkbox']
            ],
            [
                'webkit_background_color_thumb',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BACKGROUND_COLOR_THUMB'),
                '#00AAEE',
                ['text', 10]
            ],
            [
                'webkit_background_image_thumb',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BACKGROUND_IMAGE_THUMB'),
                '-webkit-gradient(linear, 0 0, 0 100%, color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.5, transparent), to(transparent))',
                ['text', 70]
            ],
            ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_BG_COLOR_IMAGE_NOTE')],
            [
                'webkit_border_radius_thumb',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BORDER_RADIUS_THUMB'),
                '2px',
                ['text', 10]
            ],
            [
                'webkit_border_thick',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BORDER_THICK'),
                '1px',
                ['text', 10]
            ],
            [
                'webkit_border_color',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BORDER_COLOR'),
                '#0000FF',
                ['text', 10]
            ],

            Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_FIREFOX'),
            ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_FIREFOX_NOTE')],
            [
                'switch_on_firefox',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_SWITCH_ON_FIREFOX'),
                'N',
                ['checkbox']
            ],
            [
                'firefox_color_track',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_FIREFOX_COLOR_TRACK'),
                '#F5F5F5',
                ['text', 10]
            ],
            [
                'firefox_color_thumb',
                Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_FIREFOX_COLOR_THUMB'),
                '#00AAEE',
                ['text', 10]
            ],

            ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_CACHE_NOTE')],
        ]
    ],
    [
        'DIV' => 'support',
        'TAB' => Loc::getMessage('SL3W_CUSTOMSCROLL_SUPPORT_TAB_NAME'),
        'TITLE' => Loc::getMessage('SL3W_CUSTOMSCROLL_SUPPORT_TAB_TITLE'),
    ]
];

$tabControl = new CAdminTabControl(
    'tabControl',
    $aTabs
);

$optionsByBlock = [
    'common_block' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_COMMON'),
    'common_list' => [
        [
            'switch_on',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_SWITCH_ON'),
            'N',
            ['checkbox']
        ]
    ],
    'webkit_block' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_WEBKIT'),
    'webkit_note' => ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_WEBKIT_NOTE')],
    'webkit_list1' => [
        [
            'switch_on_webkit',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_SWITCH_ON_WEBKIT'),
            'N',
            ['checkbox']
        ],
        [
            'webkit_width',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_WIDTH'),
            '15px',
            ['text', 10]
        ],
    ],
    'webkit_colors_1' => [
        [
            'webkit_background_color_track',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BACKGROUND_COLOR_TRACK'),
            '#F5F5F5',
            ['text', 10]
        ],
    ],
    'webkit_list2' => [
        [
            'webkit_show_shadow_track',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_SHOW_SHADOW_TRACK'),
            'N',
            ['checkbox']
        ],
    ],
    'webkit_colors_2' => [
        [
            'webkit_background_color_thumb',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BACKGROUND_COLOR_THUMB'),
            '#00AAEE',
            ['text', 10]
        ],
        [
            'webkit_background_image_thumb',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BACKGROUND_IMAGE_THUMB'),
            '-webkit-gradient(linear, 0 0, 0 100%, color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.5, transparent), to(transparent))',
            ['text', 70]
        ],
    ],
    'webkit_bg_note' => ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_BG_COLOR_IMAGE_NOTE')],
    'webkit_list3' => [
        [
            'webkit_border_radius_thumb',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BORDER_RADIUS_THUMB'),
            '2px',
            ['text', 10]
        ],
        [
            'webkit_border_thick',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BORDER_THICK'),
            '1px',
            ['text', 10]
        ],
    ],
    'webkit_colors_3' => [
        [
            'webkit_border_color',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_WEBKIT_BORDER_COLOR'),
            '#0000FF',
            ['text', 10]
        ],
    ],

    'firefox_block' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_FIREFOX'),
    'firefox_note' => ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_BLOCK_FIREFOX_NOTE')],
    'firefox_list' => [
        [
            'switch_on_firefox',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_SWITCH_ON_FIREFOX'),
            'N',
            ['checkbox']
        ],
    ],
    'firefox_colors' => [
        [
            'firefox_color_track',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_FIREFOX_COLOR_TRACK'),
            '#F5F5F5',
            ['text', 10]
        ],
        [
            'firefox_color_thumb',
            Loc::getMessage('SL3W_CUSTOMSCROLL_OPTION_FIREFOX_COLOR_THUMB'),
            '#00AAEE',
            ['text', 10]
        ],
    ],

    'cache_note' => ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_CACHE_NOTE')],
];

$optionsByBlock2 = [
    'support_note' => ['note' => Loc::getMessage('SL3W_CUSTOMSCROLL_SUPPORT_NOTE')],
];

$tabControl->Begin();
?>

    <form action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= $module_id ?>&lang=<?= LANG ?>"
          method="post">

        <?php
        $tabControl->BeginNextTab();

        __AdmSettingsDrawRow($module_id, $optionsByBlock['common_block']);
        __AdmSettingsDrawList($module_id, $optionsByBlock['common_list']);
        __AdmSettingsDrawRow($module_id, $optionsByBlock['webkit_block']);
        __AdmSettingsDrawRow($module_id, $optionsByBlock['webkit_note']);
        __AdmSettingsDrawList($module_id, $optionsByBlock['webkit_list1']);

        foreach ($optionsByBlock['webkit_colors_1'] as $webkit_colors_1_option) {
            $value = Option::get($module_id, $webkit_colors_1_option[0], $webkit_colors_1_option[2]);
            ?>
            <tr>
                <td><?= $webkit_colors_1_option[1] ?></td>
                <td>
                    <input type="<?= $webkit_colors_1_option[3][0] ?: 'text' ?>"
                           name="<?= $webkit_colors_1_option[0] ?>"
                           size="<?= $webkit_colors_1_option[3][1] ?: 10 ?>"
                           value="<?= $value ?>"
                           style="background-color: <?= $value ?>"
                    />
                </td>
            </tr>
            <?php
        }

        __AdmSettingsDrawList($module_id, $optionsByBlock['webkit_list2']);

        foreach ($optionsByBlock['webkit_colors_2'] as $webkit_colors_2_option) {
            $value = Option::get($module_id, $webkit_colors_2_option[0], $webkit_colors_2_option[2]);
            ?>
            <tr>
                <td><?= $webkit_colors_2_option[1] ?></td>
                <td>
                    <input type="<?= $webkit_colors_2_option[3][0] ?: 'text' ?>"
                           name="<?= $webkit_colors_2_option[0] ?>"
                           size="<?= $webkit_colors_2_option[3][1] ?: 10 ?>"
                           value="<?= $value ?>"
                        <?php
                        if ($webkit_colors_2_option[0] == 'webkit_background_color_thumb') {
                            ?>
                            style="background-color: <?= $value ?>"
                        <?php } ?>

                        <?php
                        if ($webkit_colors_2_option[0] == 'webkit_background_image_thumb') {
                            ?>
                            style="background-image: <?= $value ?>"
                        <?php } ?>
                    />
                </td>
            </tr>
            <?php
        }

        __AdmSettingsDrawRow($module_id, $optionsByBlock['webkit_bg_note']);
        __AdmSettingsDrawList($module_id, $optionsByBlock['webkit_list3']);

        foreach ($optionsByBlock['webkit_colors_3'] as $webkit_colors_3_option) {
            $value = Option::get($module_id, $webkit_colors_3_option[0], $webkit_colors_3_option[2]);
            ?>
            <tr>
                <td><?= $webkit_colors_3_option[1] ?></td>
                <td>
                    <input type="<?= $webkit_colors_3_option[3][0] ?: 'text' ?>"
                           name="<?= $webkit_colors_3_option[0] ?>"
                           size="<?= $webkit_colors_3_option[3][1] ?: 10 ?>"
                           value="<?= $value ?>"
                           style="background-color: <?= $value ?>"
                    />
                </td>
            </tr>
            <?php
        }

        __AdmSettingsDrawRow($module_id, $optionsByBlock['firefox_block']);
        __AdmSettingsDrawRow($module_id, $optionsByBlock['firefox_note']);
        __AdmSettingsDrawList($module_id, $optionsByBlock['firefox_list']);

        foreach ($optionsByBlock['firefox_colors'] as $firefox_colors_option) {
            $value = Option::get($module_id, $firefox_colors_option[0], $firefox_colors_option[2]);
            ?>
            <tr>
                <td><?= $firefox_colors_option[1] ?></td>
                <td>
                    <input type="<?= $firefox_colors_option[3][0] ?: 'text' ?>"
                           name="<?= $firefox_colors_option[0] ?>"
                           size="<?= $firefox_colors_option[3][1] ?: 10 ?>"
                           value="<?= $value ?>"
                           style="background-color: <?= $value ?>"
                    />
                </td>
            </tr>
            <?php
        }

        __AdmSettingsDrawRow($module_id, $optionsByBlock['cache_note']);

        $tabControl->BeginNextTab();
        ?>
        <iframe src="https://yoomoney.ru/quickpay/shop-widget?writer=seller&default-sum=50&button-text=12&payment-type-choice=on&successURL=&quickpay=shop&account=410014134044507&targets=%D0%9F%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%20%D0%BF%D0%BE%20%D0%BA%D0%BD%D0%BE%D0%BF%D0%BA%D0%B5&"
                width="423" height="222" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
        <?
        __AdmSettingsDrawRow($module_id, $optionsByBlock2['support_note']);

        $tabControl->Buttons();
        ?>

        <input type="submit" name="apply" value="<?= Loc::GetMessage('SL3W_CUSTOMSCROLL_BUTTON_APPLY') ?>"
               class="adm-btn-save"/>
        <input type="submit" name="default" value="<?= Loc::GetMessage('SL3W_CUSTOMSCROLL_BUTTON_DEFAULT') ?>"/>

        <?= bitrix_sessid_post() ?>

    </form>

<?php
$tabControl->End();

if ($request->isPost() && check_bitrix_sessid()) {

    foreach ($aTabs as $aTab) {

        foreach ($aTab['OPTIONS'] as $arOption) {

            if (!is_array($arOption) || $arOption['note']) {
                continue;
            }

            $optionCode = $arOption[0];

            if ($request['apply']) {

                $optionValue = $request->getPost($optionCode);

                if ($arOption[3][0] == 'checkbox' && $optionValue == '') {
                    $optionValue = 'N';
                }

                Option::set($module_id, $optionCode, is_array($optionValue) ? implode(',', $optionValue) : $optionValue);

                if ($optionCode == 'switch_on_webkit') {
                    register_add_css_events_webkit($optionValue == 'Y' && $request->getPost('switch_on'));
                }

                if ($optionCode == 'switch_on_firefox') {
                    register_add_css_events_firefox($optionValue == 'Y' && $request->getPost('switch_on'));
                }

            } elseif ($request['default']) {
                Option::set($module_id, $optionCode, $arOption[2]);

                register_add_css_events_webkit(false);
                register_add_css_events_firefox(false);
            }
        }
    }

    LocalRedirect($APPLICATION->GetCurPage() . '?mid=' . $module_id . '&lang=' . LANG . '&mid_menu=1');
}