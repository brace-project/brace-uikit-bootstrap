<?php


namespace Brace\UiKit\Bootstrap;


use Brace\Core\BraceApp;
use Brace\Core\BraceModule;
use Phore\Di\Container\Producer\DiService;
use Phore\Di\Container\Producer\DiValue;

class BootstrapModule implements BraceModule
{

    private $assetRoot;

    private $factory;


    public function __construct (string $assetRoot = "/assets/")
    {
        $this->assetRoot = $assetRoot;
    }


    public function register(BraceApp $app)
    {
        $app->assets->virtual($this->assetRoot . "css/ui-bundle.css", "text/css")
            ->addFile(__DIR__ . "/../lib-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css")
            ->addFile(__DIR__ . "/../lib-dist/bootstrap-icons-1.3.0/bootstrap-icons.css");

        $app->assets->virtual($this->assetRoot . "js/ui-bundle.js", "text/javascript")
            ->addFile(__DIR__ . "/../lib-dist/jquery.js")
            ->addFile(__DIR__ . "/../lib-dist/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js");

        $app->assets->virtual($this->assetRoot . "js/plugins.js", "text/javascript");

        $app->assets->virtual($this->assetRoot . "css/plugins.css", "text/css");
        // Icons

        $app->assets->virtual($this->assetRoot . "css/fonts/bootstrap-icons.woff")
            ->addFile(__DIR__ . "/../lib-dist/bootstrap-icons-1.3.0/fonts/bootstrap-icons.woff");
        $app->assets->virtual($this->assetRoot . "css/fonts/bootstrap-icons.woff2")
            ->addFile(__DIR__ . "/../lib-dist/bootstrap-icons-1.3.0/fonts/bootstrap-icons.woff2");

        $app->define("bootstrapConfig", new DiValue(new BootstrapConfig($this->assetRoot)));
        $app->define("bootstrapConfigPreset", new DiValue(new BootstrapConfig($this->assetRoot)));

    }
}