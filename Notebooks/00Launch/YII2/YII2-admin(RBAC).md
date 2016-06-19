  mdsoft/yii2-admin(RBAC的配置使用)  
==============

6/17/2016 9:33:57 AM   &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Author:Suhang


<hr/>
## installation ##
add to composer.json with composer update command

    "mdmsoft/yii2-admin": "~2.0"

Basic Configuration
--------
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    //'userClassName' => 'dektrium\user\models\User',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id'
                ],

            ],
            'menus' => [
                'assignment' => [
                                // 'label' => 'Grand Access' // change label
                    'label' => 'Users Assignments'
                ],
                'route' => null, // disable menu route
            ]
        ],
    ],
<br/>

       'components' => [
    			'user' => [
    			'identityClass' => 'common\models\User',
   				'enableAutoLogin' => true,
    ],
<br/>

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'site/error',
            'admin/*',
        ]
    ],

To use the menu manager (optional), execute the migration here:

    yii migrate --migrationPath=@mdm/admin/migrations
If you use database (class 'yii\rbac\DbManager') to save rbac data, execute the migration here:

    yii migrate --migrationPath=@yii/rbac/migrations

---

更多详情请查看官方文档


<a href="https://github.com/mdmsoft/yii2-admin">官方文档</a>