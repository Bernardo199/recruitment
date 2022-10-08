<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Contact $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'countrycodes')->widget(Select2::class, []);
    ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>








    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
$.ajax({
        url: "https://restcountries.com/v3.1/all",
    })
    .done(function(response) {
        if (response.length > 0) {
            $('#contact-countrycodes').html('');
            var options = '';
            options += '<option value="Select">Select</option>';
            for (var i = 0; i < response.length; i++) {
                var tel = response[i].idd.suffixes

                options += '<option value="' + response[i].name.common + '(' + response[i].idd.root + tel + ')' +
                    '">' +
                    response[i].name.common + '(' + response[i].idd.root + tel + ')' +
                    '</option>';
            }
            $('#contact-countrycodes').append(options);
        }
    });
</script>