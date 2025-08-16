<?php

namespace app\models\settings;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $logo
 * @property string $title
 * @property string|null $tagline
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $tiktok
 * @property string|null $linkedin
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Settings extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo', 'tagline', 'email', 'phone', 'address', 'facebook', 'instagram', 'youtube', 'tiktok', 'linkedin', 'updated_at', 'deleted_at'], 'default', 'value' => null],
            [['title'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['logo', 'title', 'tagline', 'email', 'phone', 'address', 'facebook', 'instagram', 'youtube', 'tiktok', 'linkedin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Logo',
            'title' => 'Title',
            'tagline' => 'Tagline',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'youtube' => 'Youtube',
            'tiktok' => 'Tiktok',
            'linkedin' => 'Linkedin',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
