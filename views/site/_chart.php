<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Url;

$urlC = Url::to(['site/chart']);
$this->registerJs("
    $('#bct').click(function(){
        var id = $('#bct').attr('name');
        $.ajax({
            type :'GET',
            url : '{$urlC}',
            data:'id='+id,
            success : function(data){
                $('#ch').html(data);
            }
        });
    });
    $('#bck').click(function(){
        var id = $('#bck').attr('name');
        $.ajax({
            type :'GET',
            url : '{$urlC}',
            data:'id='+id,
            success : function(data){
                $('#ch').html(data);
            }
        });
    });
    $('#bcu').click(function(){
        var id = $('#bcu').attr('name');
        $.ajax({
            type :'GET',
            url : '{$urlC}',
            data:'id='+id,
            success : function(data){
                $('#ch').html(data);
            }
        });
    });
    $('#bcka').click(function(){
        var id = $('#bcka').attr('name');
        $.ajax({
            type :'GET',
            url : '{$urlC}',
            data:'id='+id,
            success : function(data){
                $('#ch').html(data);
            }
        });
    });
    ");
?>

<div class="box-body" id="ch">
    <?php
        foreach ($chart as $values) {
            $b[] = (int)$values[$id]; 
            $c[] = $values['bulan'];
        }
        echo Highcharts::widget([
            'options' => [
                'chart' => ['type' => 'line'],
                'title' => ['text' => 'Data '.$id.' Tahun 2018'],
                'xAxis' => [
                    'categories' =>$c
                ],
                'yAxis' => [
                    'title' => ['text' => 'Jumlah']
                ],
                'plotOptions' => [
                    'line' =>  [
                        'dataLabels' =>  [
                          'enabled' =>  true
                        ],
                        'enableMouseTracking' =>  false
                    ]
                ],
                'series' => [[
                    'data' => $b,
                    'name' =>  $id
                    ]
                ]
            ]
        ]);
        
    ?>
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-block btn-xs bg-orange" id="bct" name="temperature">Temperature</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-block btn-xs bg-maroon" id="bck" name="kelembaban">Kelembaban</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-block btn-xs bg-purple" id="bcka" name="kecepatan_angin">Kecepatan Angin</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-block btn-xs bg-olive" id="bcu" name="curah_hujan">Curah Hujan</button>
        </div>
    </div>  
</div>