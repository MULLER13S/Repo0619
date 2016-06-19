<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%test2}}".
 *
 * @property integer $id
 * @property integer $title
 */
class ImoocTest2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test2}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id', 'title'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
        ];
    }
}
