<?php
use app\models\Tree;
use kartik\tree\TreeView;
use kartik\tree\TreeViewInput;
$this->title = 'Тестовое задание Техмаркет';
?>

<div class="info-label">
    Переход на страницу категории
</div>

<?php

echo TreeViewInput::widget([
    'query'             => Tree::find()->addOrderBy('root, lft'), 
    'headingOptions'    => ['label' => 'Categories'],
    'name'              => 'kv-product',    // input name
    'value'             => '',         // values selected (comma separated for multiple select)
    'asDropdown'        => false,            // will render the tree input widget as a dropdown.
    'multiple'          => false,            // set to false if you do not need multiple selection
    'fontAwesome'       => true,            // render font awesome icons
    'options'=>[
        'id'=>'tree-view-input'
    ],
    'rootOptions'       => [
        'label' => '<i class="fa fa-tree"></i>', 
        'class'=>'text-success'
    ], 
]);

?>



<div class="info-label">
    Изменение данных
    <br>
    (Для перемещения категорий используются стрелки вверх/вниз (Move Up/Move Down))
</div>


<?php

echo TreeView::widget([
    // single query fetch to render the tree
    'query'             => Tree::find()->addOrderBy('root, lft'), 
    'headingOptions'    => ['label' => 'Categories'],
    'isAdmin'           => false,                       // optional (toggle to enable admin mode)
    'displayValue'      => 1,                           // initial display value
    'options'=>[
        'id'=>'tree-view'
    ],
    //'softDelete'      => true,                        // normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]);

?>
