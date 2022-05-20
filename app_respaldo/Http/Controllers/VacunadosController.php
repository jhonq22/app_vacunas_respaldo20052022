<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Vacunados;
use Illuminate\Http\Request;

class VacunadosController extends Controller
{
    public function index()
    {
        $vacunados =Vacunados::get();
        echo json_encode($vacunados);
    }
    

    public function listadoVacunados()
    {
        $inventarios = DB::select("SELECT vacunados.id ,tipo_identificacion, cedula, apellidos, nombres, sexo, fecha_nacimiento, telefono, estado, municipio, centro_salud, vacunados.direccion,establecimiento_laboral , email, dosis1, lote1, fecha_dosis1, dosis2, lote2, fecha_dosis2, nombre_vacuna, pueblo_indigena, grupo_especial, etnia
        FROM vacunados
        LEFT JOIN estados ON estado_id = estados.id
        LEFT JOIN municipios ON municipio_id = municipios.id
        LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
        LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN etnias on etnia_id = etnias.id
        LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
        LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
  
        ORDER BY vacunados.id DESC");

        echo json_encode($inventarios); // para pasar en json
    }
    

    public function listadoVacunadosQRCompleta()
    {
        $inventarios = DB::select("SELECT tipo_identificacion, cedula, apellidos, nombres, sexo, fecha_nacimiento, telefono, estado, municipio, centro_salud, vacunados.direccion,establecimiento_laboral , email, dosis1, lote1, fecha_dosis1, dosis2, lote2, fecha_dosis2, nombre_vacuna, pueblo_indigena, grupo_especial, etnia
        FROM vacunados
        LEFT JOIN estados ON estado_id = estados.id
        LEFT JOIN municipios ON municipio_id = municipios.id
        LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
        LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN etnias on etnia_id = etnias.id
        LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
        LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
        WHERE cedula IS NOT NULL AND dosis1 IS NOT NULL AND fecha_dosis1 IS NOT NULL AND dosis2 IS NOT NULL AND fecha_dosis2 IS NOT NULL
        ORDER BY vacunados.id DESC");

        echo json_encode($inventarios); // para pasar en json
    }
    




    public function ApiInformacionCompletaVacunadosMpps()
    {
        $inventarios = DB::select("SELECT tipo_identificacion, cedula, nombres, apellidos, sexo, fecha_nacimiento,telefono, 
        vacunados.parroquia_id, vacunados.municipio_id, vacunados.estado_id, vacunados.centro_salud_id, vacunados.user_id
        nb_parroquia,
        vacunados.direccion,vacunados.email, dosis1,lote1,fecha_dosis1, dosis2,lote2, fecha_dosis2,
        dosis3,lote3, fecha_dosis3,tipo_vacuna_refuerzo_id,
        nombre_vacuna,establecimiento_laboral, pueblo_indigena,etnia,grupo_especial, 
        u.name as usuario_vacunador, u.email as correo_vacunador, f.estado as estado_vacunador, centro_salud as centro_salud_vacunador, vacunados.created_at AS fecha_registro 
        FROM vacunados
        join users as u on (u.id=vacunados.user_id)
        join estados as e on (e.id=vacunados.estado_id)
        join estados as f on (f.id=u.estado_id)
        LEFT JOIN centro_salud ON u.centro_salud_id = centro_salud.id
        LEFT JOIN parroquias ON vacunados.parroquia_id = parroquias.id
        LEFT JOIN tipo_vacunas ON vacunados.tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN pueblos_indigenas ON vacunados.pueblo_indigena_id = pueblos_indigenas.id
        LEFT JOIN etnias ON vacunados.etnia_id = etnias.id
        LEFT JOIN grupo_especiales ON vacunados.grupo_especial_id = grupo_especiales.id");

        echo json_encode($inventarios); // para pasar en json
    }
    



    public function ApiInformacionCompletaVacunadosMppsFecha2($fecha1, $fecha2)
    {
        $inventarios = DB::select("SELECT tipo_identificacion, cedula, nombres, apellidos, sexo, fecha_nacimiento,telefono, 
        vacunados.parroquia_id, vacunados.municipio_id, vacunados.estado_id, vacunados.centro_salud_id, vacunados.user_id
        nb_parroquia,
        vacunados.direccion,vacunados.email, dosis1,lote1,fecha_dosis1, dosis2,lote2, fecha_dosis2,
       dosis3,lote3, fecha_dosis3,tipo_vacuna_refuerzo_id,
 
        nombre_vacuna,establecimiento_laboral, pueblo_indigena,etnia,grupo_especial, 
        u.name as usuario_vacunador, u.email as correo_vacunador, f.estado as estado_vacunador, centro_salud as centro_salud_vacunador,
        vacunados.created_at AS fecha_registro 
        FROM vacunados
        join users as u on (u.id=vacunados.user_id)
        join estados as e on (e.id=vacunados.estado_id)
        join estados as f on (f.id=u.estado_id)
        LEFT JOIN centro_salud ON u.centro_salud_id = centro_salud.id
        LEFT JOIN parroquias ON vacunados.parroquia_id = parroquias.id
        LEFT JOIN tipo_vacunas ON vacunados.tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN pueblos_indigenas ON vacunados.pueblo_indigena_id = pueblos_indigenas.id
        LEFT JOIN etnias ON vacunados.etnia_id = etnias.id
        LEFT JOIN grupo_especiales ON vacunados.grupo_especial_id = grupo_especiales.id
        WHERE DATE(vacunados.created_at) BETWEEN  ? AND ?", [$fecha1, $fecha2]);

        echo json_encode($inventarios); // para pasar en json
    }



    public function ApiInformacionCompletaVacunadosMppsFecha1($fecha1)
    {
        $fecha1 = '%'.$fecha1.'%';

        $inventarios = DB::select("SELECT tipo_identificacion, cedula, nombres, apellidos, sexo, fecha_nacimiento,telefono, 
        vacunados.parroquia_id, vacunados.municipio_id, vacunados.estado_id, vacunados.centro_salud_id, vacunados.user_id
        nb_parroquia,
        vacunados.direccion,vacunados.email, dosis1,lote1,fecha_dosis1, dosis2,lote2, fecha_dosis2,
        dosis3,lote3, fecha_dosis3,tipo_vacuna_refuerzo_id,
 
        nombre_vacuna,establecimiento_laboral, pueblo_indigena,etnia,grupo_especial, 
        u.name as usuario_vacunador, u.email as correo_vacunador, f.estado as estado_vacunador, centro_salud as centro_salud_vacunador,
        vacunados.created_at AS fecha_registro 
        FROM vacunados
        join users as u on (u.id=vacunados.user_id)
        join estados as e on (e.id=vacunados.estado_id)
        join estados as f on (f.id=u.estado_id)
        LEFT JOIN centro_salud ON u.centro_salud_id = centro_salud.id
        LEFT JOIN parroquias ON vacunados.parroquia_id = parroquias.id
        LEFT JOIN tipo_vacunas ON vacunados.tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN pueblos_indigenas ON vacunados.pueblo_indigena_id = pueblos_indigenas.id
        LEFT JOIN etnias ON vacunados.etnia_id = etnias.id
        LEFT JOIN grupo_especiales ON vacunados.grupo_especial_id = grupo_especiales.id
        WHERE vacunados.created_at LIKE '?' ", [$fecha1]);

        echo json_encode($inventarios); // para pasar en json
    }





    //vacunados por estados vista

    public function listadoVacunadosEstadal($estado_id)
    {
        $inventarios = DB::select("SELECT vacunados.id, tipo_identificacion, cedula, apellidos, nombres, sexo, fecha_nacimiento, telefono, estado, municipio, centro_salud, vacunados.direccion,establecimiento_laboral , email, dosis1, fecha_dosis1, lote1, dosis2,fecha_dosis2, lote2, nombre_vacuna, pueblo_indigena, grupo_especial, etnia
        FROM vacunados
        LEFT JOIN estados ON estado_id = estados.id
        LEFT JOIN municipios ON municipio_id = municipios.id
        LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
        LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN etnias on etnia_id = etnias.id
        LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
        LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
        WHERE vacunados.estado_id = ?
  
        ORDER BY vacunados.id DESC", [$estado_id]);

        echo json_encode($inventarios); // para pasar en json
    }





   //vacunados por Centro de salud PARA ROLES REGISTRADOREs

   public function listadoVacunadosPorCentroSalud($centro_salud_id)
   {
       $inventarios = DB::select("SELECT vacunados.id, tipo_identificacion, cedula, apellidos, nombres, sexo, fecha_nacimiento, telefono, estado, municipio, centro_salud, vacunados.direccion,establecimiento_laboral , email, dosis1, fecha_dosis1, lote1, dosis2,fecha_dosis2, lote2, nombre_vacuna, pueblo_indigena, grupo_especial, etnia
       FROM vacunados
       LEFT JOIN estados ON estado_id = estados.id
       LEFT JOIN municipios ON municipio_id = municipios.id
       LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
       LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
       LEFT JOIN etnias on etnia_id = etnias.id
       LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
       LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
       WHERE vacunados.centro_salud_id = ?
 
       ORDER BY vacunados.id DESC", [$centro_salud_id]);

       echo json_encode($inventarios); // para pasar en json
   }















    public function listadoVacunadosPorCedula($cedula)
    {
        $inventarios = DB::select("SELECT vacunados.id, tipo_identificacion, cedula, apellidos, nombres, sexo, fecha_nacimiento, telefono, estado, municipio, centro_salud, vacunados.direccion,establecimiento_laboral , email, dosis1, fecha_dosis1, lote1, lote2, dosis2,fecha_dosis2, nombre_vacuna, pueblo_indigena, grupo_especial, etnia
        FROM vacunados
        LEFT JOIN estados ON estado_id = estados.id
        LEFT JOIN municipios ON municipio_id = municipios.id
        LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN etnias on etnia_id = etnias.id
        LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
        LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
        LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
        WHERE vacunados.cedula = ?
        ORDER BY vacunados.id DESC", [$cedula]);

        echo json_encode($inventarios); // para pasar en json
    }




    public function cedulaVacunadosRegistrado($cedula, $tipo_identificacion)
    {
        $inventarios = DB::select("SELECT * 
        FROM vacunados
        WHERE vacunados.cedula = ? AND vacunados.tipo_identificacion = ?", [$cedula, $tipo_identificacion]);

        echo json_encode($inventarios); // para pasar en json
    }





    public function listadoVacunadosPorDesercion()
    {
        $inventarios = DB::select("SELECT tipo_identificacion, cedula, apellidos, nombres, sexo, fecha_nacimiento, telefono, estado, municipio, motivo_desercion, centro_salud, vacunados.direccion,establecimiento_laboral , email, dosis1, fecha_dosis1, lote1, lote2, dosis2,fecha_dosis2, nombre_vacuna, pueblo_indigena, grupo_especial, etnia
        FROM vacunados
        LEFT JOIN estados ON estado_id = estados.id
        LEFT JOIN municipios ON municipio_id = municipios.id
        LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
        LEFT JOIN etnias on etnia_id = etnias.id
        LEFT JOIN centro_salud ON centro_salud_id = centro_salud.id
        LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
        LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
        WHERE vacunados.dosis2 = 'no'
        ORDER BY vacunados.id DESC");

        echo json_encode($inventarios); // para pasar en json
    }

















    
     public function store(Request $request)
    {
        $vacunado = new Vacunados();
        $vacunado->tipo_identificacion = $request->input('tipo_identificacion');
        $vacunado->cedula = $request->input('cedula');
        $vacunado->nombres = $request->input('nombres');
        $vacunado->apellidos = $request->input('apellidos');
        $vacunado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $vacunado->telefono = $request->input('telefono');
        $vacunado->estado_id = $request->input('estado_id');
        $vacunado->municipio_id = $request->input('municipio_id');
        $vacunado->parroquia_id = $request->input('parroquia_id');
        $vacunado->centro_salud_id = $request->input('centro_salud_id');
        $vacunado->direccion = $request->input('direccion');
        $vacunado->sexo = $request->input('sexo');
        $vacunado->email = $request->input('email');
        $vacunado->dosis1 = $request->input('dosis1');
        $vacunado->fecha_dosis1 = $request->input('fecha_dosis1');
        $vacunado->dosis2 = $request->input('dosis2');
        $vacunado->fecha_dosis2 = $request->input('fecha_dosis2');
        $vacunado->tipo_vacuna_id = $request->input('tipo_vacuna_id');
        $vacunado->imagen_qr = $request->input('imagen_qr');
        $vacunado->lote1 = $request->input('lote1');
        $vacunado->lote2 = $request->input('lote2');
        $vacunado->establecimiento_laboral = $request->input('establecimiento_laboral');
        $vacunado->pueblo_indigena_id = $request->input('pueblo_indigena_id');
        $vacunado->etnia_id = $request->input('etnia_id');
        $vacunado->grupo_especial_id = $request->input('grupo_especial_id');
        $vacunado->user_id = $request->input('user_id');
        $vacunado->motivo_desercion = $request->input('motivo_desercion');
        $vacunado->lote3 = $request->input('lote3');
        $vacunado->fecha_dosis3 = $request->input('fecha_dosis3');
        $vacunado->dosis3 = $request->input('dosis3');
        $vacunado->tipo_vacuna_refuerzo_id = $request->input('tipo_vacuna_refuerzo_id');


        $vacunado->save(); // para guardar en json

        echo json_encode($vacunado); // para pasar en json
    }

   

    public function show($vacunado_id)
    {
        $vacunados =Vacunados::find($vacunado_id);
        echo json_encode($vacunados);
    }
      

   
    public function update(Request $request, $vacunado_id)
    {
        $vacunado =Vacunados::find($vacunado_id);
        $vacunado->tipo_identificacion = $request->input('tipo_identificacion');
        $vacunado->cedula = $request->input('cedula');
        $vacunado->nombres = $request->input('nombres');
        $vacunado->apellidos = $request->input('apellidos');
        $vacunado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $vacunado->telefono = $request->input('telefono');
        $vacunado->estado_id = $request->input('estado_id');
        $vacunado->municipio_id = $request->input('municipio_id');
        $vacunado->parroquia_id = $request->input('parroquia_id');
        $vacunado->centro_salud_id = $request->input('centro_salud_id');
        $vacunado->direccion = $request->input('direccion');
        $vacunado->sexo = $request->input('sexo');
        $vacunado->email = $request->input('email');
        $vacunado->dosis1 = $request->input('dosis1');
        $vacunado->fecha_dosis1 = $request->input('fecha_dosis1');
        $vacunado->dosis2 = $request->input('dosis2');
        $vacunado->fecha_dosis2 = $request->input('fecha_dosis2');
        $vacunado->tipo_vacuna_id = $request->input('tipo_vacuna_id');
        $vacunado->lote1 = $request->input('lote1');
        $vacunado->lote2 = $request->input('lote2');
        $vacunado->establecimiento_laboral = $request->input('establecimiento_laboral');
        $vacunado->pueblo_indigena_id = $request->input('pueblo_indigena_id');
        $vacunado->etnia_id = $request->input('etnia_id');
        $vacunado->grupo_especial_id = $request->input('grupo_especial_id');
        $vacunado->user_id = $request->input('user_id');
        $vacunado->motivo_desercion = $request->input('motivo_desercion');
        $vacunado->lote3 = $request->input('lote3');
        $vacunado->fecha_dosis3 = $request->input('fecha_dosis3');
        $vacunado->dosis3 = $request->input('dosis3');
        $vacunado->tipo_vacuna_refuerzo_id = $request->input('tipo_vacuna_refuerzo_id');
        












        //$vacunado->imagen_qr = $request->input('imagen_qr');
      
        $vacunado->save(); // para guardar en json

        echo json_encode($vacunado); // para pasar en json
    }



    public function actualizarDosis(Request $request, $vacunado_id)
    {
        $vacunado =Vacunados::find($vacunado_id);
    
      
        $vacunado->dosis2 = $request->input('dosis2');
        $vacunado->fecha_dosis2 = $request->input('fecha_dosis2');
        $vacunado->lote2 = $request->input('lote2');
        $vacunado->motivo_desercion = $request->input('motivo_desercion');
        $vacunado->lote3 = $request->input('lote3');
        $vacunado->fecha_dosis3 = $request->input('fecha_dosis3');
        $vacunado->dosis3 = $request->input('dosis3');
        $vacunado->tipo_vacuna_refuerzo_id = $request->input('tipo_vacuna_refuerzo_id');
        
     
      
        $vacunado->save(); // para guardar en json

        echo json_encode($vacunado); // para pasar en json
    }

  
    public function destroy($vacunado_id)
    {
        $vacunado =Vacunados::find($vacunado_id);
        $vacunado->delete();
    }






// REPORTES GENERAL //


public function reportePorEdadVacunadosGeneral()
{
    $vacunas = DB::select("SELECT
    estados.estado,	centro_salud,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 1 AND 12, 1, 0)) de_1_a_12,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 13 AND 21, 1, 0)) de_13_a_21,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 22 AND 59, 1, 0)) de_22_a_59,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())  >= 60, 1, 0)) de_60_o_mas,
    count(cedula) as total
  FROM vacunados
  LEFT JOIN users ON user_id = users.id
  LEFT JOIN estados ON users.estado_id = estados.id
  LEFT JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
   GROUP BY estados.estado, centro_salud");

    echo json_encode($vacunas); // para pasar en json
}



public function reportePorEdadVacunadosEstados($estado_id)
{
    $vacunas = DB::select("SELECT
    estados.estado, centro_salud,	
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 1 AND 12, 1, 0)) de_1_a_12,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 13 AND 21, 1, 0)) de_13_a_21,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 22 AND 59, 1, 0)) de_22_a_59,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())  >= 60, 1, 0)) de_60_o_mas,
    count(cedula) as total
  FROM vacunados
  LEFT JOIN users ON user_id = users.id
  LEFT JOIN estados ON users.estado_id = estados.id
  LEFT JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
  WHERE users.estado_id = ?
  GROUP BY estados.estado, centro_salud",  [$estado_id]);

    echo json_encode($vacunas); // para pasar en json
}



// REPORTE POR EDAD POR CENTRO SALUD SE USA PARA EL ROL REGISTRADOR

public function reportePorEdadVacunadosCentroSalud($centro_salud_id)
{
    $vacunas = DB::select("SELECT
    estados.estado, centro_salud,	
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 1 AND 12, 1, 0)) de_1_a_12,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 13 AND 21, 1, 0)) de_13_a_21,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 22 AND 59, 1, 0)) de_22_a_59,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())  >= 60, 1, 0)) de_60_o_mas,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) >= 1, 1, 0)) total
  FROM vacunados
  LEFT JOIN users ON user_id = users.id
  LEFT JOIN estados ON users.estado_id = estados.id
  LEFT JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
  WHERE vacunados.centro_salud_id = ?
  GROUP BY estados.estado, centro_salud",  [$centro_salud_id]);

    echo json_encode($vacunas); // para pasar en json
}




public function listadoVacunadosExcel()
{
    $inventarios = DB::select("SELECT tipo_identificacion ,cedula, nombres, apellidos,fecha_nacimiento, vacunados.email, lote3, fecha_dosis3, dosis3,
    dosis1,lote1, fecha_dosis1, dosis2,lote2, fecha_dosis2, , grupo_especial, nombre_vacuna, users.name AS nombre_vacunador, estado AS estado_vacunador, centro_salud AS centro_salud_vacunador, vacunados.created_at AS fecha_registro
    FROM vacunados
    LEFT JOIN users On vacunados.user_id = users.id
    LEFT JOIN estados ON users.estado_id = estados.id
    LEFT JOIN centro_salud ON users.centro_salud_id = centro_salud.id
    LEFT JOIN tipo_vacunas on tipo_vacuna_id = tipo_vacunas.id
    LEFT JOIN etnias on etnia_id = etnias.id
    LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
    LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id

    ORDER BY vacunados.id DESC");

    echo json_encode($inventarios); // para pasar en json
}


// LISTADO VACUNADOS POR EXCEL DEL ROL ESTADAL //

public function listadoVacunadosExcelEstadalRol($estado_id)
{
    $inventarios = DB::select("SELECT tipo_identificacion ,cedula, nombres, apellidos,fecha_nacimiento, vacunados.email,dosis1,lote1, fecha_dosis1, dosis2,lote2, fecha_dosis2,
    V1.nombre_vacuna,dosis3,fecha_dosis3,  lote3, V2.nombre_vacuna AS refuerzo,
     grupo_especial, users.name AS nombre_vacunador, estado AS estado_vacunador,municipio AS municipio_vacunador, centro_salud AS centro_salud_vacunador, vacunados.created_at A$
    FROM vacunados
    LEFT JOIN users On vacunados.user_id = users.id
    LEFT JOIN estados ON users.estado_id = estados.id
    LEFT JOIN municipios ON municipio_id = municipios.id
    LEFT JOIN centro_salud ON users.centro_salud_id = centro_salud.id
    LEFT JOIN tipo_vacunas V1 ON  tipo_vacuna_id = V1.id
    LEFT JOIN tipo_vacunas V2 ON tipo_vacuna_refuerzo_id = V2.id
    LEFT JOIN etnias on etnia_id = etnias.id
    LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
    LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
    WHERE users.estado_id = ?

    ORDER BY vacunados.id DESC", [$estado_id]);

    echo json_encode($inventarios); // para pasar en json
}




// LISTADO VACUNADOS POR EXCEL DEL ROL REGISTRADOR POR CENTRO SALUD //

public function listadoVacunadosExcelCentroSaludRol($centro_salud_id)
{
    $inventarios = DB::select("SELECT tipo_identificacion ,cedula, nombres, apellidos,fecha_nacimiento, vacunados.email,dosis1,lote1, fecha_dosis1, dosis2,lote2, fecha_dosis2,
    V1.nombre_vacuna,dosis3,fecha_dosis3,  lote3, V2.nombre_vacuna AS refuerzo,
     grupo_especial, users.name AS nombre_vacunador, estado AS estado_vacunador,municipio AS municipio_vacunador, centro_salud AS centro_salud_vacunador, vacunados.created_at AS fecha_registro
    FROM vacunados
    LEFT JOIN users On vacunados.user_id = users.id
    LEFT JOIN estados ON users.estado_id = estados.id
    LEFT JOIN municipios ON municipio_id = municipios.id
    LEFT JOIN centro_salud ON users.centro_salud_id = centro_salud.id
    LEFT JOIN tipo_vacunas V1 ON  tipo_vacuna_id = V1.id
    LEFT JOIN tipo_vacunas V2 ON tipo_vacuna_refuerzo_id = V2.id 
    LEFT JOIN etnias on etnia_id = etnias.id
    LEFT JOIN grupo_especiales on grupo_especial_id = grupo_especiales.id
    LEFT JOIN pueblos_indigenas on pueblo_indigena_id = pueblos_indigenas.id
    WHERE users.centro_salud_id = ?

    ORDER BY vacunados.id DESC", [$centro_salud_id]);

    echo json_encode($inventarios); // para pasar en json
}





// REPORTES TOTAL DE DOSIS PARA EL MINISTRO


// PRIMER REPORTES POR SEXO TOTAL DOSIS
public function reporteSexoTotalDosis()
{
    $inventarios = DB::select("SELECT e.estado, c.centro_salud,
    (SELECT COUNT(*) FROM vacunados as v1 WHERE sexo = 'femenino'  AND v1.centro_salud_id = c.id) AS femenino,
    (SELECT COUNT(*) FROM vacunados as v1 WHERE sexo = 'masculino' AND v1.centro_salud_id = c.id) AS masculino,
    count(dosis1) as totaldosis1,count(dosis2) totaldosis2,count(cedula) as total
    FROM vacunados as v
    JOIN users as u ON v.user_id = u.id
    JOIN estados as e ON u.estado_id = e.id
    JOIN centro_salud as c ON v.centro_salud_id = c.id
    GROUP BY e.estado, c.centro_salud");

    echo json_encode($inventarios); // para pasar en json
}





// SEGUNDO REPORTE TOTAL DOSIS
public function reporteTotalDosis()
{
    $inventarios = DB::select("SELECT estados.estado, count(dosis1) as totaldosis1, count(dosis2) as totaldosis2,
    count(cedula) as total
            FROM vacunados 
            JOIN users ON user_id = users.id
            JOIN estados ON users.estado_id = estados.id
            JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
            GROUP BY estados.estado
            ORDER BY estados.estado");

    echo json_encode($inventarios); // para pasar en json
}


// TERCER REPORTE POR GRUPOS ESPECIALES
public function reporteGrupoEspecialesTotalDosis()
{
    $inventarios = DB::select("SELECT grupo_especial, estados.estado, count(dosis1) as totaldosis1, count(dosis2) as totaldosis2,
    count(cedula) as total
            FROM vacunados 
            JOIN users ON user_id = users.id
            JOIN estados ON users.estado_id = estados.id
            JOIN grupo_especiales ON grupo_especial_id = grupo_especiales.id
            GROUP BY estados.estado, grupo_especial
            ORDER BY estados.estado");

    echo json_encode($inventarios); // para pasar en json
}


// CUARTO REPORTE POR ETNIAS //
public function reporteEtniasTotalDosis()
{
    $inventarios = DB::select("SELECT etnia, estados.estado,count(dosis1) as totaldosis1, count(dosis2) as totaldosis2,
    count(cedula) as total
             FROM vacunados 
            JOIN users ON user_id = users.id
            JOIN estados ON users.estado_id = estados.id
            JOIN etnias ON vacunados.etnia_id = etnias.id
            GROUP BY estados.estado, etnia
            ORDER BY estados.estado");

    echo json_encode($inventarios); // para pasar en json
}



// CUARTO REPORTE POR PUEBLOS INDIGENAS //
public function reportePuebloIndgineasTotalDosis()
{
    $inventarios = DB::select("SELECT pueblo_indigena, estados.estado,count(dosis1) as totaldosis1, count(dosis2) as totaldosis2,
    count(cedula) as total
    from vacunados
            JOIN users ON user_id = users.id
            JOIN estados ON users.estado_id = estados.id
            JOIN pueblos_indigenas ON vacunados.pueblo_indigena_id = pueblos_indigenas.id
            GROUP BY estados.estado, pueblo_indigena
            ORDER BY estados.estado, pueblo_indigena");

    echo json_encode($inventarios); // para pasar en json
}







// REPORTE DOSIS 1 POR FECHAS //

public function reportePorFechasDosis1($fecha1, $fecha2)
{
    $inventarios = DB::select("SELECT estados.estado, fecha_dosis1, count(fecha_dosis1) as totaldosis1, count(fecha_dosis2) as totaldosis2,
    count(cedula) as total
            FROM vacunados
            JOIN users ON user_id = users.id
            JOIN estados ON users.estado_id = estados.id
            JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
    WHERE fecha_dosis1 between ? and ?
            GROUP BY estados.estado
            ORDER BY fecha_dosis1, estados.estado", [$fecha1, $fecha2]);

    echo json_encode($inventarios); // para pasar en json
}

public function reportePorFechasDosis1PorEstados($estado_id,$fecha1, $fecha2)
{
    $inventarios = DB::select("SELECT estados.estado, fecha_dosis1, count(fecha_dosis1) as totaldosis1, count(fecha_dosis2) as totaldosis2,
    count(cedula) as total
            FROM vacunados
            JOIN users ON user_id = users.id
            JOIN estados ON users.estado_id = estados.id
            JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
    WHERE users.estado_id = ? AND fecha_dosis1 between ? and ?
            GROUP BY estados.estado
            ORDER BY fecha_dosis1, estados.estado", [$estado_id,$fecha1, $fecha2]);

    echo json_encode($inventarios); // para pasar en json
}



//REPORTES ESPECIALES HECHO EL  30032021

public function reporteEspecialGeneralPorSexo()
{
    $inventarios = DB::select("SELECT t.nombre_vacuna,
    (SELECT COUNT(*) FROM vacunados as v1 WHERE sexo = 'femenino' and tipo_vacuna_id= t.id) AS femenino,
    (SELECT COUNT(*) FROM vacunados as v2 WHERE sexo = 'masculino' and tipo_vacuna_id= t.id) AS masculino,   
    count(dosis1) as totaldosis1,
    count(dosis2)as totaldosis2,
    count(dosis2) as total_dosis_completadas
    FROM vacunados as v
    JOIN users as u ON v.user_id = u.id
    JOIN tipo_vacunas as t ON v.tipo_vacuna_id = t.id
    group by tipo_vacuna_id");

    echo json_encode($inventarios); // para pasar en json
}


public function reporteEspecialGeneralPorEdades()
{
    $inventarios = DB::select("SELECT t.nombre_vacuna,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 13 AND 21, 1, 0)) de_13_a_21,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 22 AND 59, 1, 0)) de_22_a_59,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())  >= 60, 1, 0)) de_60_o_mas,
    count(cedula) as total
  FROM vacunados AS v
  JOIN users ON user_id = users.id
  JOIN tipo_vacunas as t ON v.tipo_vacuna_id = t.id
  group by tipo_vacuna_id");

    echo json_encode($inventarios); // para pasar en json
}


public function reporteEspecialGeneralPorEstados()
{
    $inventarios = DB::select("SELECT estados.estado, nombre_vacuna,  count(dosis1) as totaldosis1, count(dosis2) as totaldosis2,
    count(dosis2) as total_dosis_completas
             FROM vacunados
             JOIN users ON user_id = users.id
             JOIN estados ON users.estado_id = estados.id
             JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
             JOIN tipo_vacunas ON vacunados.tipo_vacuna_id = tipo_vacunas.id
             GROUP BY estados.estado,vacunados.tipo_vacuna_id
             ORDER BY estados.estado,vacunados.tipo_vacuna_id");

    echo json_encode($inventarios); // para pasar en json
}


public function ReporteEspecialSumatoriaGeneralVacunadosGeneral()
{
    $inventarios = DB::select("SELECT tipo_vacunas.nombre_vacuna,
    count(dosis1) as totaldosis1,
    count(dosis2) as totaldosis2,
    count(dosis2) as total_dosis_completas
     FROM vacunados
     JOIN tipo_vacunas on vacunados.tipo_vacuna_id = tipo_vacunas.id
     group by tipo_vacunas.id");

    echo json_encode($inventarios); // para pasar en json
}





//REPORTES ESPECIALES CON WHERE

public function reporteEspecialGeneralPorSexoWhere($tipo_vacuna_id)
{
    $inventarios = DB::select("SELECT t.nombre_vacuna,
    (SELECT COUNT(*) FROM vacunados as v1 WHERE sexo = 'femenino' and tipo_vacuna_id= t.id) AS femenino,
    (SELECT COUNT(*) FROM vacunados as v2 WHERE sexo = 'masculino' and tipo_vacuna_id= t.id) AS masculino,   
    count(dosis1) as totaldosis1,
    count(dosis2)as totaldosis2,
    count(dosis2) as total_dosis_completadas
    FROM vacunados as v
    JOIN users as u ON v.user_id = u.id
    JOIN tipo_vacunas as t ON v.tipo_vacuna_id = t.id
    WHERE v.tipo_vacuna_id = ?
    group by tipo_vacuna_id", [$tipo_vacuna_id] );

    echo json_encode($inventarios); // para pasar en json
}


public function reporteEspecialGeneralPorEdadesWhere($tipo_vacuna_id)
{
    $inventarios = DB::select("SELECT t.nombre_vacuna,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 13 AND 21, 1, 0)) de_13_a_21,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) BETWEEN 22 AND 59, 1, 0)) de_22_a_59,
    SUM(IF (TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())  >= 60, 1, 0)) de_60_o_mas,
    count(cedula) as total
  FROM vacunados AS v
  JOIN users ON user_id = users.id
  JOIN tipo_vacunas as t ON v.tipo_vacuna_id = t.id
  WHERE v.tipo_vacuna_id = ?
  group by tipo_vacuna_id", [$tipo_vacuna_id] );

    echo json_encode($inventarios); // para pasar en json
}


public function reporteEspecialGeneralPorEstadosWhere($tipo_vacuna_id)
{
    $inventarios = DB::select("SELECT estados.estado, nombre_vacuna,  count(dosis1) as totaldosis1, count(dosis2) as totaldosis2,
    count(dosis2) as total_dosis_completas
             FROM vacunados
             JOIN users ON user_id = users.id
             JOIN estados ON users.estado_id = estados.id
             JOIN centro_salud ON vacunados.centro_salud_id = centro_salud.id
             JOIN tipo_vacunas ON vacunados.tipo_vacuna_id = tipo_vacunas.id
             WHERE tipo_vacuna_id = ?
             GROUP BY estados.estado,vacunados.tipo_vacuna_id
             ORDER BY estados.estado,vacunados.tipo_vacuna_id", [$tipo_vacuna_id] );

    echo json_encode($inventarios); // para pasar en json
}


public function ReporteEspecialSumatoriaGeneralVacunadosGeneralWhere($tipo_vacuna_id)
{
    $inventarios = DB::select("SELECT tipo_vacunas.nombre_vacuna,
    count(dosis1) as totaldosis1,
    count(dosis2) as totaldosis2,
    count(dosis2) as total_dosis_completas
     FROM vacunados
     JOIN tipo_vacunas on vacunados.tipo_vacuna_id = tipo_vacunas.id
     WHERE tipo_vacuna_id = ?
     group by tipo_vacunas.id", [$tipo_vacuna_id] );

    echo json_encode($inventarios); // para pasar en json
}










}
