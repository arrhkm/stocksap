<?php
use yii\helpers\Html;
use yii\helpers\Url;



/* @var $this yii\web\View */

$this->title = yii::$app->name;//'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome To The Jungle!</h1>

        <p class="lead">You have successfully WELCOME TO THE JUNGLE.</p>

        <p><a class="btn btn-lg btn-success" href="#">Get started with WH LDP</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>
                              
                <?php echo Html::img('@web/image/IMG_20170223_151847.jpg', ['alt'=>'Hallo Bos', 
                'class'=>'img-responsive', 
                'height'=>'400x', 'witdh'=>'300px'
                ]);?>
               
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>                 

                <p><a class="btn btn-default" href="#">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <?php echo Html::img('@web/image/IMG_20170223_151837.jpg', ['alt'=>'Hallo Bos', 
                'class'=>'img-responsive', 
                'height'=>'400x', 'witdh'=>'300px'
                ]);?>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <?php echo Html::img('@web/image/IMG_20170223_151935.jpg', ['alt'=>'Hallo Bos', 
                'class'=>'img-responsive', 
                'height'=>'400x', 'witdh'=>'300px'
                ]);?>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
