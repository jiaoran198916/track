<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type".
 */
class Type extends Common
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['create_time', 'update_time', 'valid'], 'integer'],
            [['name', 'ename'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'ename' => '外文名',
            'create_time' => '创建时间',
            'update_time' => 'Update Time',
            'valid' => 'Valid',
        ];
    }
}
