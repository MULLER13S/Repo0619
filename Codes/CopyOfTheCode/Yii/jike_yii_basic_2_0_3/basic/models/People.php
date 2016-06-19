<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property string $name
 * @property integer $sex
 * @property integer $age
 * @property string $edu
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sex', 'age', 'edu'], 'required'],
            [['sex', 'age'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['edu'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'sex' => 'Sex',
            'age' => 'Age',
            'edu' => 'Edu',
        ];
    }
}
