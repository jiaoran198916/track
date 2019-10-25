<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "movie".
 *
 */
class Common extends \yii\db\ActiveRecord
{

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
