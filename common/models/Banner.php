<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $image
 * @property integer $position
 * @property integer $movie_id
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property Movie $movie
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movie_id'], 'required'],
            [['id', 'position', 'movie_id', 'status', 'create_time', 'update_time'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 128],
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
            'title' => '标题',
            'desc' => '简介',
            'image' => '图片',
            'position' => '排序',
            'movie_id' => '关联电影',
            'status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }


    public static function getBannerData(){
        return self::find()->where(['status' => [0,1]])->all();
    }
}
