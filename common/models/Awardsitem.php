<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "awardsitem".
 */
class Awardsitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'awardsitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['awards_id', 'idx', 'year'], 'required'],
            [['awards_id', 'idx', 'year', 'city_id', 'create_time', 'update_time', 'valid'], 'integer'],
            [['pic'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'awards_id' => '所属奖项',
            'idx' => '届',
            'year' => '年份',
            'city_id' => '城市',
            'pic' => '图片',
            'create_time' => '添加时间',
            'update_time' => '更新时间',
            'valid' => '是否有效'
        ];
    }

    /**
     * 获取地区
     */
    public function getCity(){
        $str = '';
        $city = City::findOne($this->city_id);
        if($city){
            $str = $city->country->name. ','.$city->name;
        }
        return $str;
    }

    /**
     * 获取链接
     * @return string
     */
    public function getUrl(){
        return Yii::$app->urlManager->createUrl(
            ['awardsitem/view','id' => $this->id ]);
    }

    /**
     * 获取奖项
     * @return \yii\db\ActiveQuery
     */
    public function getAwards()
    {
        return $this->hasOne(Awards::className(), ['id' => 'awards_id']);
    }

    /**
     * 获取所有获奖影片
     * @return
     */
    public function getAwardsItemHit()
    {
        $res = [];
        $awards = Awards::findOne($this->awards_id);
        if(strpos($awards->item_id, ',')){
            $items = explode(',', $awards->item_id);
            foreach ($items as $v){
                $hit = ItemMovieRelation::find()->where(['type' => $v, 'valid' => 1, 'item_id' => $this->id])->all();
                $res[] = ['id' => $v, 'name' => Yii::$app->params['awardsItems'][$v], 'hit' => $hit];
            }
        }else{
            $hit = ItemMovieRelation::find()->where(['type' => $awards->item_id, 'valid' => 1, 'item_id' => $this->id])->all();
            $res[] = ['id' => $this->item_id, 'name' => Yii::$app->params['awardsItems'][$awards->item_id], 'hit' => $hit];
        }

        return $res;
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
