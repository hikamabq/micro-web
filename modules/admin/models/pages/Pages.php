<?php

namespace app\modules\admin\models\pages;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $layout
 * @property string|null $html_content
 * @property string|null $css_content
 * @property int|null $as_home
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Pages extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'ensureUnique' => true,
                // 'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'description', 'layout', 'updated_at', 'deleted_at', 'as_home'], 'default', 'value' => null],
            [['name', 'layout'], 'required'],
            [['as_home'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'html_content', 'css_content'], 'safe'],
            [['name', 'slug', 'layout'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Url',
            'description' => 'Description',
            'layout' => 'Layout',
            'html_content' => 'Html Content',
            'css_content' => 'Css Content',
            'as_home' => 'Set Home',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
