<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property integer $id
 * @property string $cname
 * @property string $ename
 * @property string $desc
 * @property string $logo
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $valid
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cname', 'ename'], 'required'],
            [['create_time', 'update_time', 'valid'], 'integer'],
            [['cname', 'ename'], 'string', 'max' => 20],
            [['desc'], 'string', 'max' => 255],
            [['logo'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cname' => '名称',
            'ename' => '英文名',
            'desc' => '描述',
            'logo' => 'Logo',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'valid' => 'Valid',
        ];
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
