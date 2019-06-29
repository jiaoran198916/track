<?php
namespace backend\models;

use yii\base\Model;
use common\models\Adminuser;

/**
 * Signup form
 */
class ResetpwdForm extends Model
{

    public $password;
    public $password_repeat;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [


            [['password'],  'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat' , 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致.'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'password_repeat' => '重输密码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function resetPassword($id)
    {
        
        $adminuser = Adminuser::findOne($id);

        $adminuser->setPassword($this->password);
        $adminuser->removePasswordResetToken();

        return $adminuser->save() ? true : false;
    }
}
