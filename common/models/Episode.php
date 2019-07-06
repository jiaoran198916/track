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
            [['min', 'sec', 'summary', 'movie_id'], 'required'],
            [['summary'], 'string'],
            [['musician_id'], 'safe'],
            [[ 'min', 'sec','movie_id', 'valid', 'create_time', 'update_time', 'movie_id'], 'integer'],
            [['name', 'foreign_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min' => '位置:分',
            'sec' => '位置:秒',
            'name' => '标题',
            'foreign_name' => '外文名',
            'summary' => '简介',
            'movie_id' => '所属电影',
            'musician_id' => '歌手',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'valid' => '是否有效',
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
    public function getMusician()
    {
        return $this->hasOne(Master::className(), ['id' => 'musician_id']);
    }

    public function getUrl(){
        return Yii::$app->urlManager->createUrl(
            ['movie/view','id' => $this->movie_id ]);
    }

    /**
     * 获取音乐作者，根据作者ID
     * @return \yii\db\ActiveQuery
     */
    public function getMusicians(){
        $res = '';
        if(strpos($this->musician_id, ',')){
            $masters = explode(',', $this->musician_id);
            foreach ($masters as $v){
                $res .= Master::findOne($v)->name . '/';
            }
            $res = substr($res, 0 ,-1);
        }else{
            $res = Master::findOne($this->musician_id)->name;
        }

        return $res;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResources()
    {
        return $this->hasMany(Resource::className(), ['item_id' => 'id'])->orderBy(['position' => SORT_ASC]);
    }
}
