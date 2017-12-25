<?php

\vavepl\portfolio\frontend\assets\Main::register($this);

?>
<div class="container-fluid">
    <div class="portfolio_vave" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <h1> Portfolio </h1>
                </div>
                <div class="col-xs-12 col-md-9 portfolio-menu">
                    <ul>
                        <li id="group_all" style="color: #fe8f00;">All</li>
                        <?php foreach($groups as $key=>$element){ ?>
                            <li id="group<?= $key ?>"><?= $element ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php foreach($items as $key=>$element): ?>
                    <div class="col-xs-12 col-lg-3 col-md-6 no-padding element_portfolio group<?= $element->group_id ?>" style="background-image: url('<?= $element->img_min_id->getSource() ?>');">
                        <div class="portfolio-fade-in" style="background-color:<?= $element->color ?>" data-target="#exampleModal1" data-href="<?= $element->link ?>" data-description="<?= $element->description ?>" data-img="<?= $element->img_max_id->getSource() ?>">
                            <h1><?= $element->group->group_name ?></h1>
                            <h2><?= strtoupper($element->name) ?></h2>
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog portfolio-dialog" role="document">
            <div class="row">
                <div class="col-xs-9 text-center hidden-xs portfolio-bg-white">
                    <img src="" alt="" class="img-responsive" style="width: 100%;">
                </div>
                <div class="col-xs-12 col-sm-3 portfolio-sticky-top">
                    <h1 class="modal-header"></h1>
                    <p class="modal-p"></p>
                    <div class="modal-btn"></div>
                </div>
                <div class="col-xs-12 text-center visible-xs portfolio-bg-white">
                    <img src="" alt="" class="img-responsive" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
</div>