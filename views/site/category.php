<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="info-label">
    Информация о категории
</div>

<pre>
<?php
    foreach ($full_path as $path_elem) {
        echo $path_elem->name . ' > ';
    }
    
    echo $category_name;
?>
</pre>

<div class="link-container">
    <?= Html::a( "Вернуться на главную", Url::to(['/'])); ?>
</div>
    