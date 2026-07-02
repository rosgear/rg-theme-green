<?php
/**
 * Регистрация пакетов ресурсов темы Green.
 * 
 * Тема Green.
 * 
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

use Ge\View\ClientScript;

/**
 * Класс регистрация пакетов ресурсов темы.
 * 
 * @package Theme
 * @subpackage Green
 * @version 1.0
 */
class Asset extends \Ge\Theme\ThemeAsset
{
    /**
     * Формирует метаданные документа для страницы рабочего пространства панели 
     * управления.
     * 
     * @return void
     */
    public function workspace()
    {
        // регистрация JS и CSS пакетов
        $this->script
            ->appendPackages([
                // Workspace
                'workspace' => [
                    'position' => ClientScript::POS_HEAD,
                    'theme'    => true,
                    'noCache'  => true,
                    'css'       => [
                        'bootstrap.css' => ['/assets/css/bootstrap.min.css'],
                        'twitter.css'   => ['/vendors/twitter.min.css']
                    ]
                ],
                // Font Awesome
                'fontawesome' => [
                    'position' => ClientScript::POS_HEAD,
                    'theme'    => true,
                    'noCache'  => true,
                    'css'       => [
                        'fontawesome' => ['/vendors/fontawesome/css/all.min.css']
                    ]
                ],
                // Application
                'app' => [
                    'position' => ClientScript::POS_HEAD,
                    'vendor'   => true,
                    'noCache'  => true,
                    'js'       => [
                        'panelBootstrap' => ['/ge/panel/bootstrap.js'],
                        'panelApp'       => ['/ge/panel/app.js']
                    ]
                ]
            ])
            ->registerPackages('workspace', 'fontawesome', 'app');
    }

    /**
     * Формирует метаданные документа для страницы авторизации и восстановления аккаунта
     * пользователя панели управления.
     * 
     * @return void
     */
    public function sign()
    {
        /** @var \Ge\View\Helper\Stylesheet $stylesheet регистрация CSS пакетов */
        $this->script->css
            ->registerThemeFile('wow', '/vendors/wow/css/animate.min.css', ClientScript::POS_HEAD)
            ->registerThemeFile('bootstrap', '/assets/css/bootstrap.min.css', ClientScript::POS_HEAD)
            ->registerThemeFile('form', '/assets/css/form.min.css', ClientScript::POS_HEAD);
        /** @var \Ge\View\Helper\Script $script регистрация JS пакетов */
        $this->script->js
            ->registerVendorFile('ext', '/ge/panel/ext/ext-core.js', ClientScript::POS_HEAD)
            ->registerVendorFile('form', '/ge/panel/singleton/Form.js', ClientScript::POS_HEAD);
    }
}
