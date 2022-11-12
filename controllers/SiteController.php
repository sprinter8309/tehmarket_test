<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Tree;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionLoad()
    {
        $base_category = new Tree(['name'=>'Categories']);
        $base_category->makeRoot();
        
        for ($i=0; $i<5; $i++) {
            $first_level_category = new Tree(['name'=>'Category_'.$i]);
            $first_level_category->appendTo($base_category);
            
            for ($j=0; $j<20; $j++) {
                $second_level_category = new Tree(['name'=>'Sub_Category_'.$i.'_'.$j]);
                $second_level_category->appendTo($first_level_category);
                
                for ($k=0; $k<5; $k++) {
                    $third_level_category = new Tree(['name'=>'Sub_Sub_Category_'.$i.'_'.$j.'_'.$k]);
                    $third_level_category->appendTo($second_level_category);
                    
                    for ($l=0; $l<10; $l++) {
                        $fourth_level_category = new Tree(['name'=>'Sub_Sub_Sub_Category_'.$i.'_'.$j.'_'.$k.'_'.$l]);
                        $fourth_level_category->appendTo($third_level_category);
                    }
                }
            }
        }
        
        echo 'Load complete';
    }
    
    public function actionCategory(string $category_id)
    {
        $selected_category = Tree::findOne(['id'=>$category_id]);
                
        return $this->render('category', [
            'full_path'=>$selected_category->parents()->all(),
            'category_name'=>$selected_category->name
        ]);
    }
}
