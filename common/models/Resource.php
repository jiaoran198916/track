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
            [['position', 'movie_id', 'status', 'type', 'create_time', 'update_time'], 'integer'],
            [['movie_id', 'create_time', 'update_time'], 'required'],
            [['name', 'url'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 255],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
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
            'movie_id' => '关联电影',
            'status' => '状态',
            'type' => '类型',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }

    /**
     * 获取状态
     * @return \yii\db\ActiveQuery
     */
    public function getStatusName(){
        return Yii::$app->params['resourceStatus'][$this->status];
    }

    /**
     * 获取类型名称
     * @return \yii\db\ActiveQuery
     */
    public function getTypeName(){
        return Yii::$app->params['resourceType'][$this->status];
    }
}
