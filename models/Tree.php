<?php

namespace app\models;

use creocoder\nestedsets\NestedSetsBehavior;

class Tree extends \kartik\tree\models\Tree
{
    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                //'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                'depthAttribute' => 'lvl',
            ],
        ];
    }
    
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tree';
    }    
}
