<?php

namespace app\modules\admin\models\posts;

use app\modules\admin\models\pages\Pages;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $id_pages
 * @property string $title
 * @property string $slug
 * @property string|null $cover_image
 * @property string|null $content
 * @property string $author
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Posts extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
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
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cover_image', 'content', 'updated_at', 'deleted_at'], 'default', 'value' => null],
            [['id_pages', 'title', 'slug'], 'required'],
            [['id_pages', 'status'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title', 'slug', 'cover_image', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pages' => 'Show in Page',
            'title' => 'Title',
            'slug' => 'Slug',
            'cover_image' => 'Cover Image',
            'content' => 'Content',
            'author' => 'Author',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['id' => 'id_pages']);
    }

}
