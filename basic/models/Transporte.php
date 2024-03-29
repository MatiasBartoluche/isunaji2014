<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transporte".
 *
 * @property integer $idTransporte
 * @property string $Matricula
 * @property integer $Peso
 * @property integer $TIpoTransporte_idTIpoTransporte
 * @property integer $RRHH_idRRHH
 * @property integer $tiporrhh_idTipoRRHH
 *
 * @property Hojaruta[] $hojarutas
 * @property Ticket[] $tickets
 * @property Rrhh $rRHHIdRRHH
 * @property Tipotransporte $tIpoTransporteIdTIpoTransporte
 * @property Tiporrhh $tiporrhhIdTipoRRHH
 * @property TransporteHasCaja[] $transporteHasCajas
 * @property TransporteHasPallet[] $transporteHasPallets
 */
class Transporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Matricula', 'Peso', 'TIpoTransporte_idTIpoTransporte', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH'], 'required'],
            [['Peso', 'TIpoTransporte_idTIpoTransporte', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH'], 'integer'],
            [['Matricula'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTransporte' => 'Id Transporte',
            'Matricula' => 'Matricula',
            'Peso' => 'Peso',
            'TIpoTransporte_idTIpoTransporte' => 'Tipo Transporte Id Tipo Transporte',
            'RRHH_idRRHH' => 'Rrhh Id Rrhh',
            'tiporrhh_idTipoRRHH' => 'Tiporrhh Id Tipo Rrhh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHojarutas()
    {
        return $this->hasMany(Hojaruta::className(), ['Transporte_idTransporte' => 'idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte' => 'TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH' => 'RRHH_idRRHH', 'Transporte_tiporrhh_idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['Transporte_idTransporte' => 'idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte' => 'TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH' => 'RRHH_idRRHH', 'Transporte_tiporrhh_idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRRHHIdRRHH()
    {
        return $this->hasOne(Rrhh::className(), ['idRRHH' => 'RRHH_idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIpoTransporteIdTIpoTransporte()
    {
        return $this->hasOne(Tipotransporte::className(), ['idTIpoTransporte' => 'TIpoTransporte_idTIpoTransporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiporrhhIdTipoRRHH()
    {
        return $this->hasOne(Tiporrhh::className(), ['idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporteHasCajas()
    {
        return $this->hasMany(TransporteHasCaja::className(), ['Transporte_idTransporte' => 'idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte' => 'TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH' => 'RRHH_idRRHH', 'Transporte_tiporrhh_idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporteHasPallets()
    {
        return $this->hasMany(TransporteHasPallet::className(), ['Transporte_idTransporte' => 'idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte' => 'TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH' => 'RRHH_idRRHH', 'Transporte_tiporrhh_idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }
}
