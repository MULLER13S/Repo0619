<?php

namespace app\modules\article;

class Article extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\article\controllers';

    public function init()
    {
        parent::init();
        //ģ������
        $this->modules=[
            'category' => [
                'class' => 'app\modules\article\modules\category\Category',
            ],
        ];

        // custom initialization code goes here
    }
}
