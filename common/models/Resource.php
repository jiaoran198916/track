<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resource".
 */
class Resource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'item_id', 'is_download', 'type', 'create_time', 'update_time', 'valid'], 'integer'],
            [['item_id', 'position'], 'required'],
            [['name', 'url'], 'string', 'max' => 128],
            [['desc'], 'string', 'max' => 255],
            [['source'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '标题',
            'desc' => '简介',
            'url' => '链接',
            'position' => '排序',
            'item_id' => '关联片段',
            'type' => '类型，0片段，1电影',
            'is_download' => '是否可下载，0在线，1下载',
            'source' => '来源',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'valid' => '是否有效',
        ];
    }

    public function getItem()
    {
        if($this->type == 1){
            return $this->hasOne(Movie::className(), ['id' => 'item_id']);
        }else{
            return $this->hasOne(Episode::className(), ['id' => 'item_id']);
        }
    }

    public function getSourceName()
    {
        return $this->hasOne(Source::className(), ['id' => 'source']);
    }

    /**
     * 获取状态
     * @return \yii\db\ActiveQuery
     */
    public function getStatusName(){
        return Yii::$app->params['resourceStatus'][$this->status];
    }

    public function getDownloadStatus(){
        $str = '';
        if($this->is_download == 1){
            $str = '下载';
        }else{
            $str = '在线';
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

    /**
     * 获取类型名称
     * @return \yii\db\ActiveQuery
     */
    public function getTypeName(){
        return Yii::$app->params['resourceType'][$this->status];
    }
}
