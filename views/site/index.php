<?php
use yii\helpers\Html;
use yii\helpers\Url;



/* @var $this yii\web\View */

$this->title = yii::$app->name;//'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>W E R H O U S E</h1>

        <p class="lead">You have successfully WELCOME TO THE Werhouse.</p>

        <p><a class="btn btn-lg btn-success" href="#">Get started with WH LDP</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Customer Service Werhouse</h2>
                              
                <?php echo Html::img('@web/image/IMG_20170223_151847.jpg', ['alt'=>'Hallo Bos', 
                'class'=>'img-responsive', 
                'height'=>'400x', 'witdh'=>'300px'
                ]);?>
               
                <p>In this room all service ready, there are issued transfer and good receive. </p>                 

                <p><a class="btn btn-default" href="#"> Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Head of Werhouse and Staff Employee</h2>
                <?php echo Html::img('@web/image/IMG_20170223_151837.jpg', ['alt'=>'Hallo Bos', 
                'class'=>'img-responsive', 
                'height'=>'400x', 'witdh'=>'300px'
                ]);?>
                
                <p> Ini adalah gambar dari kepala gudang dan para staff nya. Tampak disini sangat 
                    akur dan cooperative sakali dalam bekerja. Disana terbayangkan sebuah kerja team work yang solid. 
                    Hal inilah yang menjadikan kunci keberhasilan dari gudang untuk bekerja. </p>

                <p><a class="btn btn-default" href="#">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>BIN The places of Good Recive</h2>
                <?php echo Html::img('@web/image/IMG_20170223_151935.jpg', ['alt'=>'Hallo Bos', 
                'class'=>'img-responsive', 
                'height'=>'400x', 'witdh'=>'300px'
                ]);?>
                
                <p>Bin adalah tempat atau letak rak penyimpanan untuk barang bukan Badan Intelejen Negara (BIN) Lhoo. Dengan rak ini maka akan memudahkan
                    pencarian atau menyimpanan itu sendiri. Identifikasi keberadaan barang akan sangat mudah dan hal ini 
                    akan berpengaruh terhadap kecapatan pelayanan dari gudang. Selain itu barang yang di tata 
                    begitu rapi dan berjajar menjadikan pemandangan yang mempunyai daya tarik tersendiri bagi 
                    setiap yang memandang.
                </p>

                <p><a class="btn btn-default" href="#">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
