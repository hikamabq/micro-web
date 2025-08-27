<?php

namespace app\models\settings;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $logo_header
 * @property string|null $logo_header_width
 * @property string|null $logo_footer
 * @property string|null $logo_footer_width
 * @property string $title
 * @property string|null $tagline
 * @property string|null $description
 * @property string|null $address
 * @property string|null $email
 * @property string|null $phone
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
            [['logo_header', 'logo_header_width', 'logo_footer', 'logo_footer_width', 'tagline', 'description', 'address', 'email', 'phone', 'facebook', 'instagram', 'youtube', 'tiktok', 'linkedin', 'updated_at', 'deleted_at'], 'default', 'value' => null],
            [['title'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['logo_header', 'logo_header_width', 'logo_footer', 'logo_footer_width', 'title', 'tagline', 'address', 'email', 'phone', 'facebook', 'instagram', 'youtube', 'tiktok', 'linkedin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo_header' => 'Logo Header',
            'logo_header_width' => 'Logo Header Width',
            'logo_footer' => 'Logo Footer',
            'logo_footer_width' => 'Logo Footer Width',
            'title' => 'Title',
            'tagline' => 'Tagline',
            'description' => 'Description',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
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
