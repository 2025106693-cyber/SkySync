<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bagagem;

/**
 * BagagemSearch represents the model behind the search form of `common\models\Bagagem`.
 */
class BagagemSearch extends Bagagem
{
    /**
     * {@inheritdoc}
     */

    public $bilhete_numero;

    public function rules()
    {
        return [
            [['id', 'bilhete_id', 'tipo_bagagem_id'], 'integer'],
            [['peso', 'preco'], 'number'],
            [['bilhete_numero'], 'safe'],   // sem isto o que escrevemos na caixa de procura é ignorado
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
        // fazer join com a tabela bilhete para ter acesso aos atributos de bilhete
        $query = Bagagem::find()->joinWith(['bilhete']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // permitir ordenar pelo número do bilhete (coluna da tabela bilhete) fica a azul clicável
        $dataProvider->sort->attributes['bilhete_numero'] = // bilhete_numero que aparece no index
        [
            'asc' => ['bilhete.numero' => SORT_ASC],
            'desc' => ['bilhete.numero' => SORT_DESC],
        ];

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions, bagagem. para fazer join with das duas tabelas
        $query->andFilterWhere([
            'bagagem.id' => $this->id,
            'bagagem.bilhete_id' => $this->bilhete_id,
            'bagagem.tipo_bagagem_id' => $this->tipo_bagagem_id,
            'bagagem.peso' => $this->peso,
            'bagagem.preco' => $this->preco,
        ]);

        // filtrar pelo número do bilhete (o que se escreve na caixa)
        // like para caso se escrevermos 123 aparece todos os bilhetes que comecam por 123
        $query->andFilterWhere(['like', 'bilhete.numero', $this->bilhete_numero]);

        return $dataProvider;
    }
}
