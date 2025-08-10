<?php

namespace app\modules\admin\models\users;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $email
 * @property string|null $password_reset_token
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property string|null $role
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Users extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password_reset_token', 'auth_key', 'access_token', 'role', 'updated_at', 'deleted_at'], 'default', 'value' => null],
            [['username', 'password', 'email'], 'required'],
            [['password', 'password_reset_token'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['username'], 'string', 'max' => 30],
            [['auth_key', 'access_token'], 'string', 'max' => 50],
            [['role'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
