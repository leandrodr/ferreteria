<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Suppliers;

/**
 * SuppliersSearch represents the model behind the search form about `app\models\Suppliers`.
 */
class SuppliersSearch extends Suppliers
{
    public $nombres;
    public $apellidos;
    public $celular;
    public $email;
    public $direccion;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'person_id', 'deleted'], 'integer'],
            [['company_name', 'account_number','nombres','apellidos','celular','email','direccion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Suppliers::find();
        $query->joinWith(['person']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         $dataProvider->sort->attributes['nombres'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['people.first_name' => SORT_ASC],
        'desc' => ['people.first_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['apellidos'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['people.last_name' => SORT_ASC],
        'desc' => ['people.last_name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['celular'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['people.phone_number' => SORT_ASC],
        'desc' => ['people.phone_number' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['email'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['people.email' => SORT_ASC],
        'desc' => ['people.email' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['direccion'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['people.address_1' => SORT_ASC],
        'desc' => ['people.address_1' => SORT_DESC],
        ];




       

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
           // 'person_id' => $this->person_id,
            //'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'people.first_name', $this->nombres])
            ->andFilterWhere(['like', 'people.last_name', $this->apellidos])
            ->andFilterWhere(['like', 'people.phone_number', $this->celular])
            ->andFilterWhere(['like', 'people.email', $this->email])
            ->andFilterWhere(['like', 'people.address_1', $this->direccion]);
            
    
 
        return $dataProvider;
    }
}
