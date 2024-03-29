<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stagearea".
 *
 * @property integer $idStageArea
 * @property integer $TipoStageArea_idTipoStageArea
 *
 * @property Tipostagearea $tipoStageAreaIdTipoStageArea
 * @property StageareaHasPallet[] $stageareaHasPallets
 * @property StockcenterHasStagearea[] $stockcenterHasStageareas
 */
class Stagearea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stagearea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TipoStageArea_idTipoStageArea'], 'required'],
            [['TipoStageArea_idTipoStageArea'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idStageArea' => 'Id Stage Area',
            'TipoStageArea_idTipoStageArea' => 'Tipo Stage Area Id Tipo Stage Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoStageAreaIdTipoStageArea()
    {
        return $this->hasOne(Tipostagearea::className(), ['idTipoStageArea' => 'TipoStageArea_idTipoStageArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStageareaHasPallets()
    {
        return $this->hasMany(StageareaHasPallet::className(), ['StageArea_idStageArea' => 'idStageArea', 'StageArea_TipoStageArea_idTipoStageArea' => 'TipoStageArea_idTipoStageArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasStageareas()
    {
        return $this->hasMany(StockcenterHasStagearea::className(), ['StageArea_idStageArea' => 'idStageArea', 'StageArea_TipoStageArea_idTipoStageArea' => 'TipoStageArea_idTipoStageArea']);
    }
}
