<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'year', 'cover', 'duration', 'douban_id'], 'required'],
            [['year', 'valid', 'duration', 'douban_id', 'user_id', 'status','count', 'create_time', 'update_time'], 'integer'],
            [['desc', 'ename'], 'string'],
            [['director_id', 'musician_id'], 'safe'],
            [['user_id'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
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
            'ename' => '原名',
            'cover' => '封面图',
            'year' => '年份',
            'duration' => '时长（分）',
            'douban_id' => '豆瓣ID',
            'desc' => '概要',
            'musician_id' => '音乐作者',
            'director_id' => '导演',
            'user_id' => '创建者',
            'status' => '状态，0待审核，1已审核',
            'count' => '浏览量',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'valid' => '1有效，2失效',
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
     * 获取链接
     * @return string
     */
    public function getDetail(){
        return Yii::$app->urlManager->createUrl(
            ['movie/detail','id' => $this->id ]);
    }

    /**
     * 获取链接
     * @return string
     */
    public function getUrl(){
        return Yii::$app->urlManager->createUrl(
            ['movie/view','id' => $this->id ]);
    }

    /**
     * 获取状态
     */

    public function getStatusName()
    {
        switch ($this->status){
            case 0:
                $str = '待审核';
                break;
            case 1:
                $str = '已审核';
                break;
            default:
                $str = '';
                break;
        }
        return $str;
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
     * 获取导演，根据导演ID
     * @return \yii\db\ActiveQuery
     */
    public function getDirector(){
        $res = '';
        if(strpos($this->director_id, ',')){
            $masters = explode(',', $this->director_id);
            foreach ($masters as $v){
                $res .= Master::findOne($v)->name . '/';
            }
            $res = substr($res, 0 ,-1);
        }else{
            $res = Master::findOne($this->director_id)->name;
        }

        return $res;
    }

    /**
     * 获取创建者
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    /**
     * 获取歌曲列表
     * @return \yii\db\ActiveQuery
     */
    public function getEpisodes()
    {
        return $this->hasMany(Episode::className(), ['movie_id' => 'id'])->where(['valid' => 1])->orderBy(['min' => SORT_ASC, 'sec' => SORT_ASC, 'id' =>SORT_ASC]);
    }

    /**
     * 获取资源列表
     * @return \yii\db\ActiveQuery
     */
    public function getResources()
    {
        return $this->hasMany(Resource::className(), ['item_id' => 'id'])->where('type=1');
    }
    /**
     * 获取 待审核 的电影数目
     * @return int
     */
    public static function getPengdingMovieCount(){
        return Movie::find()->where(['status' => 0])->count();
    }

    /**
     * 获取热门电影，按点击量倒序，更新时间倒序
     * @return object
     */
    public static function findHotTen(){
        return Movie::find()->where(['status' => 1, 'valid' => 1])->orderBy(['count' => SORT_DESC, 'update_time' => SORT_DESC])->limit(10)->all();
    }

    /**
     * 获取最新电影，按创建时间倒序，更新时间倒序
     * @return object
     */
    public static function findNewTen(){
        return Movie::find()->where(['status' => 1, 'valid' => 1])->orderBy(['create_time' => SORT_DESC, 'update_time' => SORT_DESC])->limit(10)->all();
    }


    public function getIntro($length=200)
    {
        $tmpStr = strip_tags($this->desc);
        $tmpLen = mb_strlen($tmpStr);

        $tmpStr = mb_substr($tmpStr,0,$length,'utf-8');
        return $tmpStr.($tmpLen>$length?'...':'');
    }


    /**
     * 获取年份数组
     * @return array
     */
    public static function getYearData(){
        $data = [];
        //1905是电影诞生的年份
        for ($i = date('Y');$i >= 1905;$i --){
            $data[$i] = $i;
        }
        return $data;
    }
}
