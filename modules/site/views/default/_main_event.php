<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image');
?>


        <div class="media-left">
            <?php
            foreach ($images as $image) {
                echo Html::img($image->getThumb(64,64), [
                    'alt' => $image->name,
                    'class' => 'media-object image-item',
                ]);
            }
            ?>
        </div>
    <div class="media-body">
        <span class="event_time"><i class="material-icons">event</i>&nbsp; <?= date('j.m.Y в H:i',$model->date) ?> </span>
         <?=Html::a('<h4>'.$model->title.'</h4>', ['/event/node/view', 'slug'=>$model->slug],['class'=>'item'])?>
        <p> <?= mb_substr(strip_tags($model->body),0,400); ?></p>
    </div>


