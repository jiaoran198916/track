<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
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
            [['id', 'position', 'movie_id', 'valid', 'type', 'create_time', 'update_time'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['desc', 'img'], 'string', 'max' => 128],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
        ];
    }

    const BANNER_TYPE_MOVIE = 0;
    const BANNER_TYPE_POST = 1;

    public static function bannerType(){
        return [
            self::BANNER_TYPE_MOVIE => '电影',
            self::BANNER_TYPE_POST => '博客'
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
            'desc' => '简介1',
            'img' => '图片',
            'type' => '类型',
            'position' => '排序',
            'movie_id' => '关联电影',
            'valid' => '状态',
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
        return self::find()->where(['valid' => 1])->all();
    }
}
