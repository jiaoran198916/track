<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "awards".
 *
 */
class Awards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'awards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ename', 'pic', 'desc', 'item_id'], 'required'],
            [['desc'], 'string'],
            [['city_id', 'create_time', 'update_time', 'valid'], 'integer'],
            [['name', 'ename', 'pic'], 'string', 'max' => 255],
            [['item_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'ename' => '外文名',
            'pic' => '图片',
            'desc' => '描述',
            'city_id' => '城市',
            'item_id' => '相关奖项',
            'create_time' => '添加时间',
            'update_time' => '更新时间',
            'valid' => '是否有效',
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
     * 获取奖项条目
     * @return \yii\db\ActiveQuery
     */
    public function getItems(){
        $res = '';
        if(strpos($this->item_id, ',')){
            $items = explode(',', $this->item_id);
            foreach ($items as $v){
                $res .= Yii::$app->params['awardsItems'][$v] . '，';
            }
            $res = substr($res, 0 ,-1);
        }else{
            $res = Yii::$app->params['awardsItems'][$this->item_id];
        }

        return $res;
    }

    /**
     * 获取奖项条目 Array
     * @return
     */
    public function getItemsArr(){
        $res = [];
        if(strpos($this->item_id, ',')){
            $items = explode(',', $this->item_id);
            foreach ($items as $v){
                $res[] = ['id' => $v, 'name' => Yii::$app->params['awardsItems'][$v]];
            }
        }else{
            $res[] = ['id' => $this->item_id, 'name' => Yii::$app->params['awardsItems'][$this->item_id]];
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
