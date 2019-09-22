<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "episode".
 *
 */
class Episode extends \yii\db\ActiveRecord
{
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
            [['name', 'movie_id'], 'required'],
            [['desc', 'ename'], 'string'],
            [['musician_id'], 'safe'],
            [[ 'min', 'sec','movie_id', 'valid', 'create_time', 'update_time'], 'integer'],
            [[ 'name', 'ename','desc', 'musician_id'], 'default', 'value' => ''],
            [[ 'min', 'sec'], 'default', 'value' => 0],
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
            'ename' => '外文名',
            'desc' => '场景',
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
     * 获取歌手
     * @return \yii\db\ActiveQuery
     */
    public function getMusicians(){
        $res = '';
        if(strpos($this->musician_id, ',')){
            $masters = explode(',', $this->musician_id);
            foreach ($masters as $v){
                $master = Master::findOne($v);
                $res .= $master ? $master->name. ' / ' : '' ;
            }
            $res = substr($res, 0 ,-2);
        }else{
            $master = Master::findOne($this->musician_id);
            $res = $master ? $master->name : '';
        }
        return $res;
    }

    /**
     * 获取歌曲所在位置
     */
    public function getLocation(){
        $res = '';
        if($this->min > 0 || $this->sec > 0){
            $res = $this->min.':'.$this->sec;
        }
        return $res;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResources()
    {
        return $this->hasMany(Resource::className(), ['item_id' => 'id'])->where('type=0')->orderBy(['position' => SORT_ASC]);
    }
}
