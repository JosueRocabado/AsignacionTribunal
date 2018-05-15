<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class AsignacionRegistroForm extends Model {
    #put your code here
    public $id_titulo; 
    public $fecha_registro;
    //public $id_docente =array();
    public $id_docente;
     public function rules()
    {
         return [
           [['id_titulo', 'fecha_registro', 'id_docente'], 'required' , 'message' => 'no puede ser en blanco '],
//            ['lista_titulo', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras '],
            // [['palabraBuscar'], 'filter',  'filter'=>'strtoupper'],
             //[['palabraBuscar'], 'string', 'max' => 250],
             ];
        
    }
    /*
     * definir los label con el que aparezca
     */
     public function attributeLabels()
    {
        return [
            'id_titulo' => 'TITULO DEL PROYECTO',
            'fecha_registro' => 'Fecha', 
            'id_docente' => 'docentes', 
        ];
    }
     /*
     *  obtener areas bajo el titulo 
     * con el idproyecto
     */
    public function obtener_lista_titulo($id_proyecto){
//        echo $id_proyecto;
//        die();
        $db = Yii::$app->db;
        $register_proy = $db->createCommand('
       select  distinct titulo_proy, idarea, nombre_area
            from registro_proy inner join pro_estu on registro_proy.pro_estu_idpro_estu = pro_estu.idpro_estu
            inner join proyecto on pro_estu.proyecto_idproyecto = proyecto.idproyecto
            inner join estudiante on pro_estu.estudiante_idestudiante = estudiante.idestudiante
            inner join doc_area on registro_proy.doc_area_iddoc_area = doc_area.iddoc_area
            inner join docente on docente.iddocente = doc_area.docente_iddocente
            inner join area on area.idarea = doc_area.area_idarea
            inner join carrera_mod on carrera_mod.idcarrera_mod = registro_proy.carrera_mod_idcarrera_mod
            inner join carrera on carrera.idcarrera = carrera_mod.carrera_idcarrera
            inner join modalidad on modalidad.idmodalidad = carrera_mod.modalidad_idmodalidad
            where idproyecto =:id_proyecto 
            ')
       ->bindValue(':id_proyecto',$id_proyecto)
        ->queryAll();
        return $register_proy;
    }
    /*
     * lista de docente posibles  
     * para la asignacion de tribunales
     */
    public function lista_docentes_asignar($id_pro){
        $db = Yii::$app->db;
        $register_proy = $db->createCommand('
        select*
        from docente inner join doc_area on  docente.iddocente= doc_area.docente_iddocente
             inner join area on doc_area.area_idarea= area.idarea
        where   idarea =:id_area
            ')
        ->bindValue(':id_area',$id_pro)
        ->queryAll();
        return $register_proy;
    }
    /*
     * lista de docente posibles  
     * para el check
     */
    public  function getListaDocente($id_pro) {
       
         $docente = AsignacionRegistroForm::lista_docentes_asignar($id_pro);
         
         $array_resultante= array_merge($docente);   
        return ArrayHelper::map($array_resultante, 'iddocente', 'nombre_doc');
         
    }
   /*
     * lista de de estudiantes y sus respectivos proyecto  
     * para el check
     */
    public  function getListaTitu_estu($id) {
       $sql = Yii::$app->db->createCommand('select *
                from proyecto inner join pro_estu on proyecto.idproyecto = pro_estu.proyecto_idproyecto
                inner join estudiante on pro_estu.estudiante_idestudiante = estudiante.idestudiante
                where idproyecto =:id_proyecto')
                ->bindValue(':id_proyecto', $id)
                ->queryAll();
        return $sql;  
    }
    /*
     * lista de registron con tribunales 
     * 
     */
    public  function lista_profe_asignados($id) {
       $sql = Yii::$app->db->createCommand('select distinct nombre_doc, paterno_doc, materno_doc, iddocente
        from proyecto 
             inner join pro_estu on proyecto.idproyecto = pro_estu.proyecto_idproyecto
             inner join estudiante on pro_estu.estudiante_idestudiante = estudiante.idestudiante
             inner join reg_asig_tri on pro_estu.idpro_estu = reg_asig_tri.pro_estu_idpro_estu
             inner join docente on reg_asig_tri.docente_iddocente = docente.iddocente 
        where idproyecto =:id_proyecto')
                ->bindValue(':id_proyecto', $id)
                ->queryAll();
        return $sql;  
    }
    /*
     * lista de registron con tribunal
     * 
     */
    public  function lista_estu_asignados($id) {
       $sql = Yii::$app->db->createCommand('select distinct nombre_estu, paterno_estu, materno_estu, idestudiante
        from proyecto 
             inner join pro_estu on proyecto.idproyecto = pro_estu.proyecto_idproyecto
             inner join estudiante on pro_estu.estudiante_idestudiante = estudiante.idestudiante
             inner join reg_asig_tri on pro_estu.idpro_estu = reg_asig_tri.pro_estu_idpro_estu
             inner join docente on reg_asig_tri.docente_iddocente = docente.iddocente 
        where idproyecto =:id_proyecto')
                ->bindValue(':id_proyecto', $id)
                ->queryAll();
        return $sql;  
    }
    /*
     * lista de registron con tribunales 
     * 
     */
    public  function lista_titulo_asignados($id) {
       $sql = Yii::$app->db->createCommand('select distinct titulo_proy
        from proyecto 
             inner join pro_estu on proyecto.idproyecto = pro_estu.proyecto_idproyecto
             inner join estudiante on pro_estu.estudiante_idestudiante = estudiante.idestudiante
             inner join reg_asig_tri on pro_estu.idpro_estu = reg_asig_tri.pro_estu_idpro_estu
             inner join docente on reg_asig_tri.docente_iddocente = docente.iddocente 
        where idproyecto =:id_proyecto')
                ->bindValue(':id_proyecto', $id)
                ->queryAll();
        return $sql;  
    }
}