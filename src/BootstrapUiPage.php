<?php


namespace Brace\UiKit\Bootstrap;


use Brace\UiKit\Base\Template\Page;

class BootstrapUiPage extends Page
{
    public static function createEmptyPage(string $containerElementDef="div") : self
    {
        return new self(__DIR__ . "/../tpl/base.tpl.php", $containerElementDef);
    }

    public static function createPageWithNavbar(string $containerElementDef="div @container-fluid @fade-in") : self
    {
        return new self(__DIR__ . "/../tpl/bootstrap-full.tpl.php", $containerElementDef);
    }
}