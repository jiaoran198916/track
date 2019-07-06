<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master".
 *
 * @property integer $id
 * @property string $name
 * @property string $foreign_name
 * @property string $pic
 * @property integer $type
 * @property string $birthday
 * @property string $place
 * @property string $intro
 * @property integer $douban_id
 * @property integer $user_id
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property Adminuser $user
 * @property Poststatus $status0
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

    const MASTER_TYPE_MUSICIAN = 0;
    const MASTER_TYPE_DIRECTOR = 1;
    const MASTER_TYPE_ACTOR = 2;
    const MASTER_TYPE_OTHER = 3;

    public static function masterType(){
        return [
            self::MASTER_TYPE_MUSICIAN => '音乐家',
            self::MASTER_TYPE_DIRECTOR => '导演',
            self::MASTER_TYPE_ACTOR => '演员',
            self::MASTER_TYPE_OTHER => '其他',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'intro'], 'required'],
            [['intro'], 'string'],
            [['type','douban_id', 'user_id', 'status', 'create_time', 'update_time'], 'integer'],
            [['name', 'foreign_name', 'place'], 'string', 'max' => 128],
            [['pic'], 'string', 'max' => 255],
            [['birthday'], 'string', 'max' => 11],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Adminuser::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Poststatus::className(), 'targetAttribute' => ['status' => 'id']],
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
            'foreign_name' => '外文名',
            'pic' => '图片',
            'type' => '类型',
            'birthday' => '生日',
            'place' => '所在地',
            'intro' => '简介',
            'douban_id' => '豆瓣 ID',
            'user_id' => '创建用户',
            'status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
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
    public function getUser()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Poststatus::className(), ['id' => 'status']);
    }
}
