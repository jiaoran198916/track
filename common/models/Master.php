<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master".
 *
 */
class Master extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['desc'], 'string'],
            [['type','douban_id', 'user_id', 'create_time', 'update_time', 'valid'], 'integer'],
            [['name', 'ename', 'place', 'birthday'], 'string', 'max' => 128],
            [['pic'], 'string', 'max' => 255],
            [['douban_id', 'user_id'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'ename' => '外文名',
            'pic' => '图片',
            'type' => '类型',
            'birthday' => '生日',
            'place' => '所在地',
            'desc' => '简介',
            'douban_id' => '豆瓣 ID',
            'user_id' => '创建用户',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'valid' => '1有效，2失效'
        ];
    }

    public function getTypeText()
    {
        switch ($this->type){
            case 0:
                $str = '音乐家';
                break;
            case 1:
                $str = '导演';
                break;
            default:
                $str = '';
                break;
        }
        return $str;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->create_time=time();
                $this->update_time=time();
            }else{
                $this->update_time=time();
            }
            return true;

        }else{
            return false;
        }
    }
}
