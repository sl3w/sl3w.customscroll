<?php

use Sl3w\CustomScroll\Settings;

use Bitrix\Main\EventManager;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class sl3w_customscroll extends CModule
{
    var $MODULE_ID = 'sl3w.customscroll';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;
    var $MODULE_DIR;

    public function __construct()
    {
        if (file_exists(__DIR__ . '/version.php')) {

            $arModuleVersion = [];

            include(__DIR__ . '/version.php');

            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

            $this->MODULE_NAME = Loc::getMessage('SL3W_CUSTOMSCROLL_MODULE_NAME');
            $this->MODULE_DESCRIPTION = Loc::getMessage('SL3W_CUSTOMSCROLL_MODULE_DESC');

            $this->PARTNER_NAME = Loc::getMessage('SL3W_CUSTOMSCROLL_PARTNER_NAME');
            $this->PARTNER_URI = Loc::getMessage('SL3W_CUSTOMSCROLL_PARTNER_URI');

            $this->MODULE_DIR = dirname(__FILE__) . '/../';
        }
    }

    public function DoInstall()
    {
        global $APPLICATION;

        self::IncludeServiceFiles();

        RegisterModule($this->MODULE_ID);

        $this->SetOptions();

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage('SL3W_CUSTOMSCROLL_INSTALL_TITLE') . ' "' . Loc::getMessage('SL3W_CUSTOMSCROLL_MODULE_NAME') . '"',
            __DIR__ . '/step.php'
        );
    }

    public function DoUninstall()
    {
        global $APPLICATION;

        self::IncludeServiceFiles();

        $this->UnInstallEvents();
        $this->ClearOptions();

        UnRegisterModule($this->MODULE_ID);

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage('SL3W_CUSTOMSCROLL_UNINSTALL_TITLE') . ' "' . Loc::getMessage('SL3W_CUSTOMSCROLL_MODULE_NAME') . '"',
            __DIR__ . '/unstep.php'
        );
    }

    public function UnInstallEvents()
    {
        register_add_css_events_webkit(false);

        register_add_css_events_firefox(false);

        return true;
    }

    private function SetOptions()
    {
        Settings::set('switch_on', 'N');
        Settings::set('switch_on_webkit', 'N');
        Settings::set('switch_on_firefox', 'N');
    }

    private function ClearOptions()
    {
        Settings::deleteAll();
    }

    private static function IncludeServiceFiles()
    {
        include_once('service.php');
    }
}