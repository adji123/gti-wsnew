<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use app\models\Perangkat;
use app\models\DataSearch;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data harian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">
  <div class="box">
    <div class="box-body">
    
      <?php Pjax::begin(); ?>
      <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'summary' => "Menampilkan <b>{begin}-{end}</b> dari <b id='totaldata'>{totalCount}</b> data",
          'emptyText' => '<center class="text-danger">Tidak ada data untuk ditampilkan</center>',
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              ['attribute' => 'perangkat',
                'value' => 'perangkat.alias'
              ],
              'tgl:time',
              'kelembaban',
              'kecepatan_angin',
              'arah_angin',
              'curah_hujan',
              'temperature',
              'kapasitas_baterai',
          ],
      ]); ?>
      <?php Pjax::end(); ?>
      </div>
  </div>
</div>
