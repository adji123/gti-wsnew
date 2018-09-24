<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Perangkat
                        <?= $model['alias'] ?>
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Perangkat</strong>
                            </p>
                            <div class="chart">
                                <h4>Nama Perangkat :</h4>
                                <h3><?= $model['alias'] ?></h3>
                                <hr style="border:1px solid #4F7BC3;">
                                <h4>Kordinat :</h4>
                                <h3><?= $model['longitude'] ?></h3>
                                <hr style="border:1px solid #4F7BC3;">
                                <h3 class="text-center"><?= date('Y-m-d'); ?></h3>
                                <!-- <div id="MyClockDisplay" class="clock text-center"></div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="text-center">
                                <strong>Data</strong>
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <p class="text-center">Arah Angin</p>
                                            <h3>
                                            NULL
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="ion-ios-compass"></i>
                                        </div>
                                        <a href="#data-detail" class="small-box-footer">More info
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <p class="text-center">Kelembaban</p>
                                            <h3>
                                            NULL
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="ion-ios-water"></i>
                                        </div>
                                        <a href="#data-detail" class="small-box-footer">More info
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <p class="text-center">Curah Hujan</p>
                                            <h3>
                                            NULL
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="ion-ios-rainy"></i>
                                        </div>
                                        <a href="#data-detail" class="small-box-footer">More info
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <p class="text-center">Kecepatan Angin</p>
                                            <h3>
                                                NULL
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="ion-ios-speedometer"></i>
                                        </div>
                                        <a href="#data-detail" class="small-box-footer">More info
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p class="text-center">
                                <strong>Suhu</strong>
                            </p>
                            <div class="pad box-pane-right bg-green text-center" style="min-height: 280px">
                                <i class="ion-ios-thermometer big"></i>
                                <h2>NULL &deg;</h2>
                                <h3>Celcius</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box" id="data-detail">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Selengkapnya</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="display:none;">
                    <?= $this->renderAjax('/data/index', [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>