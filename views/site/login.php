<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo"> 
        <h2 class="text-center text-white text-shadow">GTI - WEATHER STATION</h2>
    </div>
    <div class="login-box-body box">
        <h2 class="text-center title"><?= Html::encode($this->title) ?></h2>
        <?php 
            $fieldUsername = [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
            ];
            $fieldPassword = [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => "{input}<span class='nput-group-addon pwd'><span toggle='#loginform-password' class='form-control-feedback glyphicon glyphicon-eye-open field-icon toggle-password'></span></span>"
            ];

        ?>
        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
            ]); 
        ?>

        <?= $form->field($model, 'username',$fieldUsername)->textInput(['autofocus' => true,'placeholder' => 'Masukkan Username'])->label(false) ?>

        <?= $form->field($model, 'password',$fieldPassword)->passwordInput(['placeholder' => 'Masukkan Password'])->label(false) ?>

        <!-- <?= $form->field($model, 'rememberMe')->checkbox([ 'template' => "<div
        class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div
        class=\"col-lg-8\">{error}</div>", ]) ?> -->

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
        <div style="color:#999;">
            Anda belum punya akun? daftar
            <?= Html::a('disini', ['/site/signup'])?>
        </div>

    </div>
    
</div>

<?php 
    $js = <<<js
    $(".toggle-password").click(function() {
        $(this).toggleClass(".glyphicon glyphicon-eye-close");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
js;
$this->registerJs($js);
?>