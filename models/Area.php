<?php
/**
 * Created by PhpStorm.
 * User: romane
 * Date: 04/06/2018
 * Time: 12:02 AM
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $idarea
 * @property string $nombre_area
 * @property string $descripcion_area
 * @property string $area_idarea
 */
class Area extends \yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'area';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['nombre_area', 'descripcion_area'], 'required'],
      [['nombre_area', 'descripcion_area'], 'string'],
      [['area_idarea'], 'integer'],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'idarea' => 'Idarea',
      'nombre_area' => 'Nombre Area',
      'descripcion_area' => 'Descripcion Area',
      'area_idarea' => 'Area Idarea',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getDocArea()
  {
    return $this->hasMany(DocArea::className(), ['area_idarea' => 'idarea']);
  }
}
