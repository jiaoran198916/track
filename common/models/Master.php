<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master".
 *
 */
class Master extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'ename'], 'trim'],
            [['name', 'ename'], 'unique', 'message' => '艺术家已存在'],
            [['desc'], 'string'],
            [['official'], 'url'],
            [['type','douban_id', 'user_id', 'create_time', 'update_time', 'valid','city_id', 'sex'], 'integer'],
            [['name', 'ename',  'birthday', 'official'], 'string', 'max' => 128],
            [['pic'], 'string', 'max' => 255],
            [['douban_id', 'user_id', 'sex','city_id'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'ename' => '外文名',
            'pic' => '图片',
            'type' => '类型',
            'sex' => '性别',
            'birthday' => '生日',
            'city_id' => '所在地',
            'desc' => '简介',
            'official' => '官方网站',
            'douban_id' => '豆瓣 ID',
            'user_id' => '创建用户',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'valid' => '1有效，2失效'
        ];
    }

    public function getTypeText()
    {
        switch ($this->type){
            case 0:
                $str = '音乐家';
                break;
            case 1:
                $str = '导演';
                break;
            case 2:
                $str = '歌手';
                break;
            default:
                $str = '';
                break;
        }
        return $str;
    }

    public function getSexText()
    {
        switch ($this->sex){
            case 0:
                $str = '保密';
                break;
            case 1:
                $str = '男';
                break;
            case 2:
                $str = '女';
                break;
            default:
                $str = '';
                break;
        }
        return $str;
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
    public function getDetail(){
        return Yii::$app->urlManager->createUrl(
            ['master/detail','id' => $this->id ]);
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
     * @notes: 获取作曲家列表
     * @user : liusijun
     * @date : 2019/9/4 16:05
     */
    public static function getComposers($keyword=''){
        if($keyword!=''){
            return Yii::$app->getDb()->createCommand("select * from master where `type`=0 and get_first_pinyin_char(name) = '{$keyword}' order by id desc")->queryAll();
        }
        return self::find()->where(['type' => 0])->andWhere(['<>','pic',''])->orderBy('update_time desc')->limit(20)->asArray()->all();
    }

    /**
     * 获取热门音乐家列表
     * @param string $keyword
     * @return array|\yii\db\ActiveRecord[]
     * @throws \yii\db\Exception
     */
    public static function getHotMaster(){

        return self::find()->where(['type' => 0])->andWhere(['<>','pic',''])->orderBy('update_time desc')->limit(5)->all();
    }

    /**
     * @notes: 判读字符是否为字符
     * @user : liusijun
     * @date : 2019/9/10 11:32
     */
    public static function getChar($keyword){
        $keyword = strtoupper($keyword);
        $charArr = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        if(in_array($keyword,$charArr))
            return $keyword;
        return false;
    }
}
