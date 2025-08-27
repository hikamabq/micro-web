<?php

namespace app\modules\admin\models\settings;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\settings\Settings;

/**
 * SettingsSearch represents the model behind the search form of `app\modules\admin\models\settings\Settings`.
 */
class SettingsSearch extends Settings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['logo_header', 'logo_header_width', 'logo_footer', 'logo_footer_width', 'title', 'tagline', 'description', 'address', 'email', 'phone', 'facebook', 'instagram', 'youtube', 'tiktok', 'linkedin', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Settings::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'logo_header', $this->logo_header])
            ->andFilterWhere(['like', 'logo_header_width', $this->logo_header_width])
            ->andFilterWhere(['like', 'logo_footer', $this->logo_footer])
            ->andFilterWhere(['like', 'logo_footer_width', $this->logo_footer_width])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'tagline', $this->tagline])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'instagram', $this->instagram])
            ->andFilterWhere(['like', 'youtube', $this->youtube])
            ->andFilterWhere(['like', 'tiktok', $this->tiktok])
            ->andFilterWhere(['like', 'linkedin', $this->linkedin]);

        return $dataProvider;
    }
}
