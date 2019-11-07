<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cate".
 *
 */
class Cate extends Common
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['position', 'create_time', 'update_time', 'valid'], 'integer'],
            ['position', 'default', 'value'=> 0]
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
            'position' => '排序',
            'create_time' => '添加时间',
            'update_time' => '更新时间',
            'valid' => '是否有效',
        ];
    }

}
