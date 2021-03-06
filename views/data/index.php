<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use app\models\Perangkat;
use app\models\DataSearch;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Harian';
$this->params['breadcrumbs'][] = $this->title;


  $gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    ['attribute' => 'perangkat',
      'value' => 'perangkat.alias'
    ],
    ['attribute' => 'pukul',
      'value' => 'tgl',
      'format' =>  ['date', 'php:H:i'],
    ],
    'kelembaban',
    'kecepatan_angin',
    'arah_angin',
    'curah_hujan',
    'temperature',
    'tekanan_udara'
  ];


?>
<div class="data-index">
    <div class="box box-info">
        <div class="box-body" id="data">
            <?php Pjax::begin(); ?>
            <div class="row">
              <br>
                <div class="col-md-6" style="padding-left:0px;">
                    <?php
                      echo ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $gridColumns,
                        'target'=> '_blank',
                        'dropdownOptions' => [
                            'label' => 'Export',
                            'class' => 'btn ',
                            'style' => 'border-radius:0;'
                          ],
                        'columnSelectorOptions' => [
                          'disabled' => true,
                          'label' => 'Kolom',
                          'class' => 'btn',
                          'style' => 'visibility: hidden;width:0;height:0;position:absolute;'
                        ],
                        'exportConfig' => [
                          ExportMenu::FORMAT_HTML => false,
                          ExportMenu::FORMAT_CSV => [
                                'alertMsg' => 'Tabel data harian akan di export menjadi file CSV',
                            ],
                          ExportMenu::FORMAT_TEXT => [
                                'alertMsg' => 'Tabel data harian akan di export menjadi file TEXT',
                            ],
                          ExportMenu::FORMAT_PDF => [
                                'alertMsg' => 'Tabel data harian akan di export menjadi file PDF',
                            ],
                          ExportMenu::FORMAT_EXCEL => [
                                'alertMsg' => 'Tabel data harian akan di export menjadi file EXCEL 95+',
                            ],
                          ExportMenu::FORMAT_EXCEL_X => [
                                'alertMsg' => 'Tabel data harian akan di export menjadi file EXCEL 2007+',
                            ],
                          ],
                        'filename' => date('YmdHis', mktime(date('H')+5)).'_WSDataHarian',
                        'messages' => [
                          'allowPopups' =>  '',
                          'confirmDownload' => 'Lanjutkan proses export ?',
                          'downloadProgress' => 'Memproses file. silahkan tunggu...',
                          'downloadComplete' => 'Download selesai.'
                        ]
                      ]);
                       ?>
                </div>
                <div class="col-md-6">
                    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
            </div>


            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => "Menampilkan <b>{begin}-{end}</b> dari <b id='totaldata'>{totalCount}</b> data",
            'emptyText' => '<center class="text-danger">Tidak Ada Data Untuk Ditampilkan</center>',
            'columns' =>$gridColumns,
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
    </div>
</div>
