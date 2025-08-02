<?php

namespace app\models\pages;

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
            [['slug', 'description', 'layout', 'updated_at', 'deleted_at'], 'default', 'value' => null],
            [['name', 'layout'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
            'slug' => 'Link',
            'description' => 'Description',
            'layout' => 'layout',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
