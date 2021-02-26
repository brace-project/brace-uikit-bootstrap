<?php

namespace Brace\UiKit\CoreUi;


use Brace\UiKit\Base\Element\Button;
use Brace\UiKit\Base\Element\Spacer;
use Brace\UiKit\Base\Element\Title;
use Brace\UiKit\Base\Template\Renderer;
use function Brace\UiKit\Base\el;
use function Brace\UiKit\Base\txt;

/**
 * @var \Brace\UiKit\Bootstrap\BootstrapConfig $__CONFIG
 * @var Renderer $this
 * @var string $__CONTENT
 */

$this->renderIn(__DIR__ . "/base.tpl.php");

?>

<header class="navbar shadow-sm flex-column flex-md-row navbar-dark bg-dark box-shadow sticky-top">
    <div class="navbar-expand-sm container">
        <a class="navbar-brand mr-0 mr-md-2" href="/">
            <img src="<?php txt($__CONFIG->brandLogoUrl); ?>" width="30" height="30"/>
            <?php txt($__CONFIG->brandName); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            $nav = $__CONFIG->topNav;
            $nav->setRenderer(function (Button $b) {
                $childList = null;
                if (count($b->childreen) > 0) {
                    $childList = fhtml("li @class=nav-item dropdown");
                    foreach ($b->childreen as $child) {
                        $childList[] = fhtml([
                            "div @dopdown-menu @dropdown" => [
                                "a @class=dropdown-item @href=:href" => [
                                    "span @class=c-sidebar-nav-icon @class=:icon" => "",
                                    "{$child->name}",
                                    $child->badge
                                ]
                            ]
                        ], (array)$child);
                    }

                    return fhtml(
                        ["li @class=nav-item @dropdown" => [
                            "a @nav-link @dropdown-toggle @href=:href" => [
                                ["i @class=c-sidebar-nav-icon @class=:icon" => ""],
                                "$b->name",
                                $b->badge
                            ],
                            $childList
                        ]
                        ], (array)$b);
                }

                return fhtml(
                    ["li @class=nav-item" => [
                        "a @class=nav-link @href=:href" => [
                            ["i @class=:icon" => ""],
                            "$b->name",
                            $b->badge
                        ],
                        $childList
                    ]
                    ], (array)$b);
            });

            $nav->out("ul @navbar-nav mr-auto");


            ?>



        </div>

    </div>

</header>
<main class="container">
    <?php echo $__CONTENT ?>
</main>



