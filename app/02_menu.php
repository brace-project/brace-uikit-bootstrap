<?php
namespace App;

use Brace\Core\AppLoader;
use Brace\Core\BraceApp;
use Brace\UiKit\Base\Element\Button;
use Brace\UiKit\Bootstrap\BootstrapConfig;
use Phore\Di\Container\Producer\DiService;

AppLoader::extend(function (BraceApp $app) {
    $app->define("bootstrapConfig", new DiService(function (BootstrapConfig $bootstrapConfigPreset) {
        $boostrapConfig = clone $bootstrapConfigPreset;


        $boostrapConfig->topNav
            ->addElement(new Button("Dashboard", "", "/"));


        $boostrapConfig->topRightNav
            ->addElement(new Button("", "bi-github", "https://github.com/brace-project/brace-uikit-coreui"));

        return $boostrapConfig;
    }));
});