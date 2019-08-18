<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "post".
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content', 'cate_id'], 'required'],
            [['content', 'tags'], 'string'],
            [['valid', 'cate_id', 'create_time', 'update_time', 'author_id','count', 'movie_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['movie_id', 'author_id'], 'default', 'value' => 0],
         ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '标题',
            'cate_id' => '分类',
            'content' => '内容',
            'movie_id' => '关联电影',
            'count' => '浏览次数',
            'tags' => '标签',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'author_id' => '作者',
            'valid' => '状态',
        ];
    }

    /**
     * 获取电影
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }

    /**
     * 获取分类
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(Cate::className(), ['id' => 'cate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'author_id']);
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

    public function getUrl(){

        return Yii::$app->urlManager->createUrl(
            ['post/detail','id' => $this->id,
            ]);
    }

    public function getBeginning($length=288)
    {
        $tmpStr = strip_tags($this->content);
        $tmpLen = mb_strlen($tmpStr);

        $tmpStr = mb_substr($tmpStr,0,$length,'utf-8');
        return $tmpStr.($tmpLen>$length?'...':'');
    }

    public function  getTagLinks()
    {
        $links=array();
        foreach(Tag::string2array($this->tags) as $tag)
        {
            $links[]=Html::a(Html::encode($tag),array('post/index','PostSearch[tags]'=>$tag));
        }
        return $links;
    }


}
