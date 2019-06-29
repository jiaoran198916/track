<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "episode".
 *
 * @property integer $id
 * @property string $timing
 * @property string $name
 * @property string $foreign_name
 * @property string $summary
 * @property integer $status
 * @property string $url1
 * @property string $url2
 * @property string $url3
 * @property integer $movie_id
 * @property integer $seconds
 * @property integer $create_time
 * @property integer $update_time
 */
class Episode extends \yii\db\ActiveRecord
{

    public static $movie_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'episode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timing', 'summary', 'status', 'movie_id'], 'required'],
            [['summary'], 'string'],
            [['status', 'movie_id','singer_id', 'seconds', 'create_time', 'update_time', 'movie_id'], 'integer'],
            [['timing'], 'string', 'max' => 255],
            [['name', 'foreign_name', 'url1', 'url2', 'url3'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timing' => '位置',
            'name' => '标题',
            'foreign_name' => '外文名',
            'summary' => '简介',
            'status' => '状态',
            'url1' => '链接1',
            'url2' => '链接2',
            'url3' => '链接3',
            'movie_id' => '所属电影',
            'singer_id' => '歌手',
            'seconds' => '秒',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                //$this->movie_id = self::$movie_id;
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSinger()
    {
        return $this->hasOne(Master::className(), ['id' => 'singer_id']);
    }
}
