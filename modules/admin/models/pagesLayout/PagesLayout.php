<?php

namespace app\modules\admin\models\pagesLayout;

use Yii;

/**
 * This is the model class for table "pages_layout".
 *
 * @property int $id
 * @property int $id_pages
 * @property int $is_static
 * @property string|null $layout_name
 * @property string|null $content
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class PagesLayout extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_layout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['layout_name', 'content', 'updated_at', 'deleted_at'], 'default', 'value' => null],
            [['id_pages', 'is_static'], 'required'],
            [['id_pages', 'is_static'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['layout_name', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pages' => 'Id Pages',
            'is_static' => 'Is Static',
            'layout_name' => 'Layout Name',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

}
