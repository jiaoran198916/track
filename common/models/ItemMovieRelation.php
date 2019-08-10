<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_movie_relation".
 */
class ItemMovieRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_movie_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id','movie_id', 'type'], 'required'],
            [['item_id', 'type', 'is_hit', 'create_time', 'update_time', 'valid'], 'integer'],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => '电影节ID',
            'movie_id' => '电影ID',
            'type' => '子奖项',
            'is_hit' => '提名/获奖',
            'create_time' => '添加时间',
            'update_time' => '更新时间',
            'valid' => '是否有效'
        ];
    }

    public function getHitText()
    {
        switch ($this->is_hit){
            case 0:
                $str = '提名';
                break;
            case 1:
                $str = '获奖';
                break;
            default:
                $str = '';
                break;
        }
        return $str;
    }

    /**
     * 获取奖项
     * @return \yii\db\ActiveQuery
     */
    public function getAwardsitem()
    {
        return $this->hasOne(Awardsitem::className(), ['id' => 'item_id']);
    }

    /**
     * 获取电影
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
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
