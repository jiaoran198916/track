<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property Banner[] $banners
 * @property Resource[] $resources
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
            [['name', 'year','duration', 'status'], 'required'],
            [['year', 'valid', 'duration', 'douban_id', 'user_id', 'status', 'is_recommend','count', 'create_time', 'update_time'], 'integer'],
            [['desc'], 'string'],
            [['name', 'foreign_name', 'cover'], 'string', 'max' => 128],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['name', 'cover',  'duration', 'year', 'release', 'musician_id', 'director_id', 'actor_id', 'douban_id'], 'required'],
            [['desc', 'music_desc'], 'string'],
            [['duration', 'year', 'douban_id', 'user_id', 'status', 'is_recommend', 'count', 'create_time', 'update_time'], 'integer'],
            [['release', 'musician_id', 'director_id', 'actor_id'], 'safe'],
            [['name', 'foreign_name'], 'string', 'max' => 128],
            [['cover'], 'string', 'max' => 255],
            [['douban_id', 'user_id'], 'default', 'value' => 0],
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
            'foreign_name' => '原名',
            'cover' => '封面图',
            'year' => '年份',
            'duration' => '时长（分）',
            'douban_id' => '豆瓣ID',
            'desc' => '概要',
            'music_desc' => '音乐简介',
            'release' => '上映日期',
            'musician_id' => '音乐作者',
            'director_id' => '导演',
            'actor_id' => '演员',
            'user_id' => '创建者',
            'status' => '状态',
            'count' => '浏览量',
            'is_recommend' => '推荐',
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
     * 获取链接
     * @return \yii\db\ActiveQuery
     */
    public function getStatusName(){
        return Yii::$app->params['movieStatus'][$this->status];
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
        return $this->hasMany(Resource::className(), ['item_id' => 'id']);
    }
    /**
     * 获取 待审核 的电影数目
     * @return int
     */
    public static function getPengdingMovieCount(){
        return Movie::find()->where(['status' => 0])->count();
    }

    /**
     * 获取随机推送的数据
     * @return object
     */
    public static function getRandomData(){
        return Movie::find()->where(['status' => 1])->limit(6)->all();
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

    /**
     * 获取年份数组，用于上映时间选择
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
