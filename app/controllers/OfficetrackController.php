<?php
class OfficetrackController extends \BaseController
{
    public function postFormulario()
    {
        $type = trim(Input::get('type'));
        $forms = trim(Input::get('Data'));
        try {
            if ($this->is_valid_xml($forms) === false) {
                return 'Cadena XML no valida.';
            }
        } catch (Exception $exc) {
            return  "_OK_";
        }
        $formObj = simplexml_load_string($forms);

        Log::useDailyFiles(storage_path().'/logs/formulario.log');
        Log::info([$formObj]);
        $xmlResponse = "<Response>"
                . "<Message>"
                    . "<Text>[msg]</Text>"
                    . "<Icon>Warning/Critical/Info</Icon>"
                    . "<ButtonText>OK</ButtonText>"
                . "</Message>"
                . "<ReturnValue>"
                    . "<ShortText>[shortText]</ShortText>"
                    . "<LongText>[longText]</LongText>"
                    . "<Value>[value]</Value>"
                    . "<Action></Action>"
                . "</ReturnValue>"
             . "</Response>";
        $searchArray = [
                    '[msg]',
                    '[shortText]',
                    '[longText]',
                    '[value]'
        ];
        $replaceArray = [
                    "hi",
                    "hi",
                    'Proceso terminado',
                    'estado ok'
        ];
        $xmlResponse = str_replace(
                    $searchArray,
                    $replaceArray,
                    $xmlResponse
        );
        echo $xmlResponse;
        return;
    }

    public function getServer()
    {
        $forms = trim(Input::get('forms'));
        try {
            if ($this->is_valid_xml($forms) === false) {
                //DB::insert($sql, $arrayVal);
                return 'Cadena XML no valida.';
            }
        } catch (Exception $exc) {
            return  "_OK_";
            //Registrar error
            //$this->error->saveError($exc);
        }
        $formObj = simplexml_load_string($forms);
        if ($formObj->Form->Name=='Verificación y Actualización Tributaria II') {
            $this->registrarVerifActuaTrib($formObj);
            return  "_OK_";
        }
        $form =[
            'Form'              =>      $formObj->Form->Name,                   //0001-Inicio
            'Version'           =>      $formObj->Form->Version,                //23 53
            'Fields'            =>      $formObj->Form->Fields,                 //23 53

            'EntryDate'         =>      $formObj->EntryDate,                    //10082017132715
            'Data'              =>      $formObj->Data,                         //
            'EventDate'         =>      $formObj->EventDate,                    //10082017132718
            'EntryType'         =>      $formObj->EntryType,                    //34
            'EntrySource'       =>      $formObj->EntrySource,                  //4

            'X'                 =>      $formObj->EntryLocation->X,             //-77.0200653076172
            'Y'                 =>      $formObj->EntryLocation->Y,             //-11.9959096908569
            'Address'           =>      $formObj->EntryLocation->Address,       //8.4 Km North East of Callao, Peru
            'MSISDN'            =>      $formObj->EntryLocation->MSISDN,        //+5112968818954
            'Date'              =>      $formObj->EntryLocation->Date,          //10082017084808
            'DateAge'           =>      $formObj->EntryLocation->DateAge,       //-335
            'DateFromEpoch'     =>      $formObj->EntryLocation->DateFromEpoch, //1502390087000

            'TaskNumber'        =>      $formObj->Task->TaskNumber,             //418098
            'Status'            =>      $formObj->Task->Status,                 //256
            'Description'       =>      $formObj->Task->Description,            //418098-49023375
            'CustomerName'      =>      $formObj->Task->CustomerName,           //16:00 - 18:00 / MODESTOPARIAHUNCA
            'Data2'             =>      $formObj->Task->Data2,                  //
            'Data3'             =>      $formObj->Task->Data3,                  //
            'Data4'             =>      $formObj->Task->Data4,                  //
            'Data6'             =>      $formObj->Task->Data6,                  //
            'Data7'             =>      $formObj->Task->Data7,                  //
            'Data8'             =>      $formObj->Task->Data8,                  //
            'Data9'             =>      $formObj->Task->Data9,                  //
            'Data10'            =>      $formObj->Task->Data10,                 //
            'Data11'            =>      $formObj->Task->Data11,                 //
            'Data13'            =>      $formObj->Task->Data13,                 //
            'Data14'            =>      $formObj->Task->Data14,                 //
            'Data15'            =>      $formObj->Task->Data15,                 //
            'Data16'            =>      $formObj->Task->Data16,                 //
            'Data17'            =>      $formObj->Task->Data17,                 //
            'Data19'            =>      $formObj->Task->Data19,                 //
            'Data21'            =>      $formObj->Task->Data21,                 //
            'Data23'            =>      $formObj->Task->Data23,                 //
            'Data24'            =>      $formObj->Task->Data24,                 //
            'Data25'            =>      $formObj->Task->Data25,                 //
            'Data28'            =>      $formObj->Task->Data28,                 //
            'Data30'            =>      $formObj->Task->Data30,                 //
            'StartDate'         =>      $formObj->Task->StartDate,              //
            'StartDateAge'      =>      $formObj->Task->StartDateAge,           //

            'FirstName'         =>      $formObj->Employee->FirstName,          //STUMPF JARA
            'LastName'          =>      $formObj->Employee->LastName,           //STUMPF JARA
            'EmployeeNumber'    =>      $formObj->Employee->EmployeeNumber,     //LA2508
            'GroupName'              =>      $formObj->Employee->Group->Name,   //Grupo_Cobra_Criticos'

            //'Files->File'       =>      $formObj->Files->File->Guid,          //b3c3353d-46a9-4709-a7e1-55730b26c174
            //'Files->File'       =>      $formObj->Files->File->Filename,   //2d14a70d-0d2b-464e-ab81-2ab2fbf3f7e0_0.jpg
            //'Files->File'       =>      $formObj->Files->File->Id,             //Casa  Trabajo Final
            //'Files->File'       =>      $formObj->Files->File->Data,             //base64
        ];
        //log

        //filtrar solo 667
        if ($form['EmployeeNumber']!='667' &&
            $form['EmployeeNumber']!='666' &&
            $form['EmployeeNumber']!='70' &&
            $form['EmployeeNumber']!='123456') {//cel de test
            return  "_OK_";
        }
        /*if ( $form['Version']=='30' || $form['Version']=='17') {//cel de test
        } else {
            return  "_OK_";
        }*/

        if ( isset($formObj->Form->Fields) &&
            isset($formObj->Form->Fields->Field) &&
            isset($formObj->Form->Fields->Field->Id) &&
            $formObj->Form->Fields->Field->Id=='Ubicación actual' ){

            $coord = $formObj->Form->Fields->Field->Value;
            list($y,$x) = explode(",", $coord );
            $form['Y'] = $y;
            $form['X'] = $x;
        }
        //buscar id de tarea
        $mov = Movimiento::where('TaskNumber',$form['TaskNumber'])->first();
        if (is_null($mov)) {
            //echo "OK";
            //$form['movimiento_id']=1;
            //Formulario::create($form);
            return  "_OK_";
        }
        if ($form['Version']=='17') {
            $new_mov = $mov->replicate();
            $new_mov->push();
            $mov = $new_mov;
            //$mov = new Movimiento($mov);
            //$mov->save();
        }
        //buscar si hay formulario con  movimiento_id   $mov->id
        //$formulario = Formulario::where('movimiento_id',$mov->id)->first();
        /*if (!is_null($formulario)) {
            return  "_OK_";
        }*/
        $mov->coordy=$y;
        $mov->coordx=$x;
        $mov->save();
        $form['movimiento_id']=$mov->id;
        //Log::useDailyFiles(storage_path().'/logs/officetrack.log');
        //Log::info([$form]);
        $formulario = Formulario::create($form);
        if ($formulario) {
            //imagenes
            $dir = 'img/test/';
            if (count($formObj->Files->File)>0 ) {
                $imagenes =[];
                foreach ($formObj->Files->File as $value) {
                    $nombreImagen = $formObj->Task->TaskNumber.'_'.str_replace(' ', '', $value->Id).'.jpg';
                    $ifp = fopen($dir.$nombreImagen, "w+");
                    fwrite($ifp, base64_decode($value->Data));
                    fclose($ifp);
                    $imagen =[
                        'url' => 'img/test/'.$nombreImagen
                    ];
                    $imagenes[]=new Imagen($imagen);
                }
            $formulario->imagenes()->saveMany($imagenes);
            }
        }
        if (isset($formObj->Form->Fields->Field) ) {
            $fields=[];
            foreach ($formObj->Form->Fields->Field as $key => $value) {
                $value = get_object_vars($value);
                $fields[ ]  = $value;
                /*$fields2=[];
                foreach ( $value  as  $val) {
                     $fields2[] = $val;
                }
                Log::info($fields2);*/
            }
            //Log::info($fields);
        }


        return  "_OK_";
    }
    public function getEnvio(){
        //vencimiento
        $dueDate = date("YmdHis", strtotime("2017-08-10 23:59:59"));

        $trama['TaskNumber'] = '123456';
        $trama['EmployeeNumber'] = '667';
        $trama['DueDateAsYYYYMMDDHHMMSS'] = $dueDate;
        $trama['Duration'] = 0.75;
        $trama['Notes'] = "";
        $trama['Description']='417908-49020472';

        $trama['CustomerName'] = '/ DELGADO DE LA FLOR DE PIEROLA, MONICA CECILIA';
        $trama['Location'] = [
            "East"      => '-76.9815876',//lng X
            "North"     => '-12.0775882',//lat Y
            "Address"   => 'AV LA MERCED 625 UR UR MONTAGNE, Piso: 1 Int: 102 Mzn:  Lt: '
        ];
       // $trama['Data2'] = 'TEST0007';//'49020472';
       // $trama['Data3'] = '2017-08-10 09:44:48';
       // $trama['Data4'] = 'NO';
       // $trama['Data6'] = 'Averia - RR|I128';
       // $trama['Data7'] = '32136299';
       // $trama['Data8'] = 'HI|R010';
       // $trama['Data9'] = null;
       // $trama['Data10'] = '999879281';
       // $trama['Data11'] = 'HI';
       // $trama['Data12'] = '';
       // $trama['Data13'] = '16';
       // $trama['Data14'] = '0';
       // $trama['Data15'] = 'LIM';
       // $trama['Data16'] = '0';
       // $trama['Data17'] = 'POST_DIGIT';
       // $trama['Data18'] = 'CRITICOS';
       // $trama['Data19'] = 'SANTIAGO DE SURCO';
       // $trama['Data20'] = '';
       // $trama['Data21'] = '999879281';
       // $trama['Data22'] = 'EN CAMPO';
       // $trama['Data23'] = 'link de mapa';
       // $trama['Data24'] = 'link de mapa';
       // $trama['Data25'] = '5';
       // $trama['Data26'] = 'PROBLEMA NAVEGACION';
       // $trama['Data28'] = 'se repone 2 decos desaparecidos un HD y un digital mas tarjetas atendio //titular dni 07867178obs no se recupera equipos de baja';
       // $trama['Data29'] = 'MOVISTAR SPEEDY 8M';
        //$trama['Data30'] = $componente;

        $ot = new Officetrack;
        $response = $ot->envio($trama);
        if($response->CreateOrUpdateTaskResult=='OK'){
            var_dump($response);
        }
    }
    private function is_valid_xml($xml)
    {
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument('1.0', 'utf-8');
        $doc->loadXML($xml);
        $errors = libxml_get_errors();
        return empty($errors);
    }
    public function imagenes($form)
    {
        $dir = 'img/test/';
        if (count($form->Files->File)>0 ) {
            $imagenes =[];
            foreach ($form->Files->File as $value) {
                $nombreImagen = $form->Task->TaskNumber.'_'.str_replace(' ', '', $value->Id).'.jpg';
                $ifp = fopen($dir.$nombreImagen, "w+");
                fwrite($ifp, base64_decode($value->Data));
                fclose($ifp);
                $imagen =[
                    'url' => 'img/test/'.$nombreImagen
                ];
                $imagenes[]=new Imagen($imagen);
            }
            $formulario->imagenes()->saveMany($imagenes);
        }
    }
    //I. IDENTIFICACIÓN DEL PROPIETARIO
    private function parte01($value)
    {
        $documento = $identidad = $nombres= '';
        if (isset($value[0]->Id) && $value[0]->Id == 'doc_parte01' && is_string($value[0]->Value) )    $documento = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == 'identidad_parte01' && is_string($value[1]->Value) )    $identidad = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == 'nombres_parte01' && is_string($value[2]->Value) )    $nombres = $value[2]->Value;

        return  [
            'tipo_documento' => $documento,
            'numero_documento' => $identidad,
            'nombres' => $nombres
        ];
    }
    //2 DOMICILIO FISCAL DEL CONTRIBUYENTE
    private function parte02($value)
    {
        $postal = $distrito = $codvia = $via = $nombrevia = $numero = $depa = $mzna = $lote = $fono = '';
        if (isset($value[0]->Id) && $value[0]->Id == 'postal_parte02' && is_string($value[0]->Value) )    $postal = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == 'distrito_parte02' && is_string($value[1]->Value) )    $distrito = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == 'codvia_parte02' && is_string($value[2]->Value) )    $codvia = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == 'via_parte02' && is_string($value[3]->Value) )    $via = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == 'nombrevia_parte02' && is_string($value[4]->Value) )    $nombrevia = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == 'numero_parte02' && is_string($value[5]->Value) )    $numero = $value[5]->Value;
        if (isset($value[6]->Id) && $value[6]->Id == 'depa_parte02' && is_string($value[6]->Value) )    $depa = $value[6]->Value;
        if (isset($value[7]->Id) && $value[7]->Id == 'mzna_parte02' && is_string($value[7]->Value) )    $mzna = $value[7]->Value;
        if (isset($value[8]->Id) && $value[8]->Id == 'lote_parte02' && is_string($value[8]->Value) )    $lote = $value[8]->Value;
        if (isset($value[9]->Id) && $value[9]->Id == 'fono_parte02' && is_string($value[9]->Value) )    $fono = $value[9]->Value;

        return  [
            'postal'    => $postal,
            'distrito'  => $distrito,
            'codigo_via'    => $codvia,
            'via'   => $via,
            'nombre_via' => $nombrevia,
            'numero_monicipal'    => $numero,
            'departamento'  => $depa,
            'manzana'  => $mzna,
            'lote'  => $lote,
            'telefono'  => $fono
        ];
    }
    //3 UBICACIÓN DEL PREDIO
    private function parte03($value)
    {
        $cuso = $uso = $curbano = $centropoblado = $dcentropoblado = $cvia = $via = $nvia = $numero = $block = $depa = $mzna = $lote = $sublote = $Adeclarada = $Averificada = $Acomun = $Apropia = $Lfachada = $ubicacion = $clacificacion = '';
        if (isset($value[0]->Id) && $value[0]->Id == 'cuso_parte03' && is_string($value[0]->Value) )    $cuso = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == 'uso_parte03' && is_string($value[1]->Value) )    $uso = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == 'curbano_parte03' && is_string($value[2]->Value) )    $curbano = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == 'centropoblado_parte03' && is_string($value[3]->Value) )    $centropoblado = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == 'dcentropoblado_parte03' && is_string($value[4]->Value) )    $dcentropoblado = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == 'cvia_parte03' && is_string($value[5]->Value) )    $cvia = $value[5]->Value;
        if (isset($value[6]->Id) && $value[6]->Id == 'via_parte03' && is_string($value[6]->Value) )    $via = $value[6]->Value;
        if (isset($value[7]->Id) && $value[7]->Id == 'nvia_parte03' && is_string($value[7]->Value) )    $nvia = $value[7]->Value;
        if (isset($value[8]->Id) && $value[8]->Id == 'numero_parte03' && is_string($value[8]->Value) )    $numero = $value[8]->Value;
        if (isset($value[9]->Id) && $value[9]->Id == 'block_parte03' && is_string($value[9]->Value) )    $block = $value[9]->Value;
        if (isset($value[10]->Id) && $value[10]->Id == 'depa_parte03' && is_string($value[10]->Value) )    $depa = $value[10]->Value;
        if (isset($value[11]->Id) && $value[11]->Id == 'mzna_parte03' && is_string($value[11]->Value) )    $mzna = $value[11]->Value;
        if (isset($value[12]->Id) && $value[12]->Id == 'lote_parte03' && is_string($value[12]->Value) )    $lote = $value[12]->Value;
        if (isset($value[13]->Id) && $value[13]->Id == 'sublote_parte03' && is_string($value[13]->Value) )    $sublote = $value[13]->Value;
        if (isset($value[14]->Id) && $value[14]->Id == 'Adeclarada_parte03' && is_string($value[14]->Value) )    $Adeclarada = $value[14]->Value;
        if (isset($value[15]->Id) && $value[15]->Id == 'Averificada_parte03' && is_string($value[15]->Value) )    $Averificada = $value[15]->Value;
        if (isset($value[16]->Id) && $value[16]->Id == 'Acomun_parte03' && is_string($value[16]->Value) )    $Acomun = $value[16]->Value;
        if (isset($value[17]->Id) && $value[17]->Id == 'Apropia_parte03' && is_string($value[17]->Value) )    $Apropia = $value[17]->Value;
        if (isset($value[18]->Id) && $value[18]->Id == 'Lfachada_parte03' && is_string($value[18]->Value) )    $Lfachada = $value[18]->Value;
        if (isset($value[19]->Id) && $value[19]->Id == 'ubicacion_parte03' && is_string($value[19]->Value) )    $ubicacion = $value[19]->Value;
        if (isset($value[20]->Id) && $value[20]->Id == 'clacificacion_parte03' && is_string($value[20]->Value) )    $clacificacion = $value[20]->Value;

        return  [
            'codigo_uso'  => $cuso,
            'uso_propiedad'   => $uso,
            'codigo_urbano'   => $curbano,
            'cod_centro_poblado' => $centropoblado,
            'desc_centro_poblado'    => $dcentropoblado,
            'cod_via'  => $cvia,
            'via'   => $via,
            'nombre_via'  => $nvia,
            'numero'    => $numero,
            'block' => $block,
            'departamento'  => $depa,
            'manzana'  => $mzna,
            'lote'  => $lote,
            'sublote'   => $sublote,
            'area_declarada'    => $Adeclarada,
            'area_verificada'   => $Averificada,
            'area_comun'    => $Acomun,
            'area_propia'   => $Apropia,
            'longitud_fachada'  => $Lfachada,
            'ubicacion' => $ubicacion,
            'clasificacion' => $clacificacion
        ];
    }
    //construcciones
    private function parte04($value)
    {
        $pisoA=$fconstruccion=$mconstruccion=$Econservacion=$econstruccion=$muros=$techos=$pisoB=$puertas=$revestimiento=$baños=$instalacionE=$aconstruida=$Averificada=$uca='';
        if (isset($value[0]->Id) && $value[0]->Id == 'pisoA_parte04' && is_string($value[0]->Value) )    $pisoA = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == 'fconstruccion_parte04' && is_string($value[1]->Value) )    $fconstruccion = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == 'mconstruccion_parte04' && is_string($value[2]->Value) )    $mconstruccion = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == 'Econservacion_parte04' && is_string($value[3]->Value) )    $Econservacion = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == 'econstruccion_parte04' && is_string($value[4]->Value) )    $econstruccion = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == 'muros_parte04' && is_string($value[5]->Value) )    $muros = $value[5]->Value;
        if (isset($value[6]->Id) && $value[6]->Id == 'techos_parte04' && is_string($value[6]->Value) )    $techos = $value[6]->Value;
        if (isset($value[7]->Id) && $value[7]->Id == 'pisoB_parte04' && is_string($value[7]->Value) )    $pisoB = $value[7]->Value;
        if (isset($value[8]->Id) && $value[8]->Id == 'puertas_parte04' && is_string($value[8]->Value) )    $puertas = $value[8]->Value;
        if (isset($value[9]->Id) && $value[9]->Id == 'revestimiento_parte04' && is_string($value[9]->Value) )    $revestimiento = $value[9]->Value;
        if (isset($value[10]->Id) && $value[10]->Id == 'baños_parte04' && is_string($value[10]->Value) )    $baños = $value[10]->Value;
        if (isset($value[11]->Id) && $value[11]->Id == 'instalacionE_parte04' && is_string($value[11]->Value) )    $instalacionE = $value[11]->Value;
        if (isset($value[12]->Id) && $value[12]->Id == 'aconstruida_parte04' && is_string($value[12]->Value) )    $aconstruida = $value[12]->Value;
        if (isset($value[13]->Id) && $value[13]->Id == 'Averificada_parte04' && is_string($value[13]->Value) )    $Averificada = $value[13]->Value;
        if (isset($value[14]->Id) && $value[14]->Id == 'uca_parte04' && is_string($value[14]->Value) )    $uca = $value[14]->Value;

        return  [
            'piso' => $pisoA,
            'fecha_construccion' => $fconstruccion,
            'materiales_construccion' => $mconstruccion,
            'estado_conservacion' => $Econservacion,
            'estado_construccion' => $econstruccion,
            'muros_columnas' => $muros,
            'techos' => $techos,
            'pisos' => $pisoB,
            'puertas_ventanas' => $puertas,
            'revestimientos' => $revestimiento,
            'banios' => $baños,
            'instalaciones_electricas' => $instalacionE,
            'area_construida_declarada' => $aconstruida,
            'area_construida_verificada' => $Averificada,
            'uca' => $uca
        ];
    }
    //5 OTRAS INSTALACIONES FIJAS Y PERMANENTES
    private function parte05($value)
    {
        $cod = $dotrainstalacion = $ftermino = $unidad = $materialP = $estadoC = $largo = $ancho = $alto = $total = $valorS = '';

        if (isset($value[0]->Id) && $value[0]->Id == 'cod_parte05' && is_string($value[0]->Value) )    $cod = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == 'dotrainstalacion_parte05' && is_string($value[1]->Value) )    $dotrainstalacion = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == 'ftermino_parte05' && is_string($value[2]->Value) )    $ftermino = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == 'unidad_parte05' && is_string($value[3]->Value) )    $unidad = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == 'materialP_parte05' && is_string($value[4]->Value) )    $materialP = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == 'estadoC_parte05' && is_string($value[5]->Value) )    $estadoC = $value[5]->Value;
        if (isset($value[6]->Id) && $value[6]->Id == 'largo_parte05' && is_string($value[6]->Value) )    $largo = $value[6]->Value;
        if (isset($value[7]->Id) && $value[7]->Id == 'ancho_parte05' && is_string($value[7]->Value) )    $ancho = $value[7]->Value;
        if (isset($value[8]->Id) && $value[8]->Id == 'alto_parte05' && is_string($value[8]->Value) )    $alto = $value[8]->Value;
        if (isset($value[9]->Id) && $value[9]->Id == 'total_parte05' && is_string($value[9]->Value) )    $total = $value[9]->Value;
        if (isset($value[10]->Id) && $value[10]->Id == 'valorS_parte05' && is_string($value[10]->Value) )    $valorS = $value[10]->Value;

        return  [
            'codigo' => $cod,
            'desc_instalacion' => $dotrainstalacion,
            'fecha_termino' => $ftermino,
            'unidad_medida' => $unidad,
            'material_predominante' => $materialP,
            'estado_conservacion' => $estadoC,
            'largo' => $largo,
            'ancho' => $ancho,
            'alto' => $alto,
            'total' => $total,
            'valor_soles' => $valorS
        ];
    }
    //6 DATOS RELACIONADOS A LOS CONDOMINANTES
    private function parte06($value)
    {
        $nro = $cod = $doc = $nombres = $domicilio = $porcentaje = '';

        if (isset($value[0]->Id) && $value[0]->Id == 'nro_parte06' && is_string($value[0]->Value) )    $nro = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == 'cod_parte06' && is_string($value[1]->Value) )    $cod = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == 'doc_parte06' && is_string($value[2]->Value) )    $doc = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == 'nombres_parte06' && is_string($value[3]->Value) )    $nombres = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == 'domicilio_parte06' && is_string($value[4]->Value) )    $domicilio = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == 'porcentaje_parte06' && is_string($value[5]->Value) )    $porcentaje = $value[5]->Value;

        return  [
            'numero' => $nro,
            'codigo_contribuyente' => $cod,
            'num_doc_identidad' => $doc,
            'nombres' => $nombres,
            'domicilio_fiscal' => $domicilio,
            'porcentaje_condominio' => $porcentaje
        ];
    }
    //anexo01_parte10
    private function autorizacion($id, $value)
    {
        $codigo = $descripcion = '';

        if (isset($value[0]->Id) && $value[0]->Id == $id.'_cactividad' && is_string($value[0]->Value) )    $codigo = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == $id.'_dactividad' && is_string($value[1]->Value) )    $descripcion = $value[1]->Value;

        return  [
            'codigo' => $codigo,
            'descripcion' => $descripcion
        ];
    }
    //anexo01_Ubicacion
    private function ubicacion($id, $value)
    {
        $autorizada = $verficada = '';

        if (isset($value[0]->Id) && $value[0]->Id == $id.'_Aautorizada' && is_string($value[0]->Value) )    $autorizada = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == $id.'_Averficada' && is_string($value[1]->Value) )    $verficada = $value[1]->Value;

        return  [
            'autorizada' => $autorizada,
            'verficada' => $verficada
        ];
    }
    //anexo01_masdatos
    private function masdatos($id, $value)
    {
        $expediente = $licencia = $expedicion = $vencimiento = $actividad = '';

        if (isset($value[0]->Id) && $value[0]->Id == $id.'_Nexpediente' && is_string($value[0]->Value) )    $expediente = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == $id.'_Nlicencia' && is_string($value[1]->Value) )    $licencia = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == $id.'_fexpedicion' && is_string($value[2]->Value) )    $expedicion = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == $id.'_fvencimiento' && is_string($value[3]->Value) )    $vencimiento = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == $id.'_Iactividad' && is_string($value[4]->Value) )    $actividad = $value[4]->Value;

        return  [
            'expediente' => $expediente,
            'licencia' => $licencia,
            'expedicion' => $expedicion,
            'vencimiento' => $vencimiento,
            'actividad' => $actividad
        ];
    }
    //anexo01_Aanuncio
    private function anuncio($id, $value)
    {
        $codigo = $descripcion = $lados = $autor = $verificacion = $expediente = $licencia = $expedicion = $vencimiento = '';
        if (isset($value[0]->Id) && $value[0]->Id == $id.'_CTanuncio' && is_string($value[0]->Value) )    $codigo = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == $id.'_DTanuncio' && is_string($value[1]->Value) )    $descripcion = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == $id.'_Nlados' && is_string($value[2]->Value) )    $lados = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == $id.'_AAanucio' && is_string($value[3]->Value) )    $autor = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == $id.'_AVanuncio' && is_string($value[4]->Value) )    $verificacion = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == $id.'_Nexpediente' && is_string($value[5]->Value) )    $expediente = $value[5]->Value;
        if (isset($value[6]->Id) && $value[6]->Id == $id.'_Nlicencia' && is_string($value[6]->Value) )    $licencia = $value[6]->Value;
        if (isset($value[7]->Id) && $value[7]->Id == $id.'_Fexpedicion' && is_string($value[7]->Value) )    $expedicion = $value[7]->Value;
        if (isset($value[8]->Id) && $value[8]->Id == $id.'_Fvencimiento' && is_string($value[8]->Value) )    $vencimiento = $value[8]->Value;

        return  [
            'codigo' => $codigo,
            'descripcion' => $descripcion,
            'lados' => $lados,
            'autor' => $autor,
            'verificacion' => $verificacion,
            'expediente' => $expediente,
            'licencia' => $licencia,
            'expedicion' => $expedicion,
            'vencimiento' => $vencimiento
        ];
    }
    //anexo01_bien_comun
    private function biencomun($id, $value)
    {
        $codigo = $descripcion = $titulo = $verificada = '';
        if (isset($value[0]->Id) && $value[0]->Id == $id.'_Cuso' && is_string($value[0]->Value) )    $codigo = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == $id.'_Upredio' && is_string($value[1]->Value) )    $descripcion = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == $id.'_Atitulo' && is_string($value[2]->Value) )    $titulo = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == $id.'_Averificada' && is_string($value[3]->Value) )    $verificada = $value[3]->Value;

        return  [
            'codigo' => $codigo,
            'descripcion' => $descripcion,
            'titulo' => $titulo,
            'verificada' => $verificada
        ];
    }
    //anexo01_Ccomunes
    private function comunes($id, $value)
    {
        $piso = $construccion = $material = $conservacion = $estado = $muros = $techos = $pisos = $puertas = $revestimiento = $banios = $electricas = $declarada = $verificada = $uca = '';
        if (isset($value[0]->Id) && $value[0]->Id == $id.'_pisoA' && is_string($value[0]->Value) )    $piso = $value[0]->Value;
        if (isset($value[1]->Id) && $value[1]->Id == $id.'_Fconstruccion' && is_string($value[1]->Value) )    $construccion = $value[1]->Value;
        if (isset($value[2]->Id) && $value[2]->Id == $id.'_Mconstruccion' && is_string($value[2]->Value) )    $material = $value[2]->Value;
        if (isset($value[3]->Id) && $value[3]->Id == $id.'_Econservacion' && is_string($value[3]->Value) )    $conservacion = $value[3]->Value;
        if (isset($value[4]->Id) && $value[4]->Id == $id.'_Econstruccion' && is_string($value[4]->Value) )    $estado = $value[4]->Value;
        if (isset($value[5]->Id) && $value[5]->Id == $id.'_Muros' && is_string($value[5]->Value) )    $muros = $value[5]->Value;
        if (isset($value[6]->Id) && $value[6]->Id == $id.'_Techos' && is_string($value[6]->Value) )    $techos = $value[6]->Value;
        if (isset($value[7]->Id) && $value[7]->Id == $id.'_PisosB' && is_string($value[7]->Value) )    $pisos = $value[7]->Value;
        if (isset($value[8]->Id) && $value[8]->Id == $id.'_Puertas' && is_string($value[8]->Value) )    $puertas = $value[8]->Value;
        if (isset($value[9]->Id) && $value[9]->Id == $id.'_Revestimiento' && is_string($value[9]->Value) )    $revestimiento = $value[9]->Value;
        if (isset($value[10]->Id) && $value[10]->Id == $id.'_Baños' && is_string($value[10]->Value) )    $banios = $value[10]->Value;
        if (isset($value[11]->Id) && $value[11]->Id == $id.'_Ielectricas' && is_string($value[11]->Value) )    $electricas = $value[11]->Value;
        if (isset($value[12]->Id) && $value[12]->Id == $id.'_ACdeclarada' && is_string($value[12]->Value) )    $declarada = $value[12]->Value;
        if (isset($value[13]->Id) && $value[13]->Id == $id.'_ACverficada' && is_string($value[13]->Value) )    $verificada = $value[13]->Value;
        if (isset($value[14]->Id) && $value[14]->Id == $id.'_uca' && is_string($value[14]->Value) )    $uca = $value[14]->Value;

        return  [
            'piso' => $piso,
            'construccion' => $construccion,
            'material' => $material,
            'conservacion' => $conservacion,
            'estado' => $estado,
            'muros' => $muros,
            'techos' => $techos,
            'pisos' => $pisos,
            'puertas' => $puertas,
            'revestimiento' => $revestimiento,
            'banios' => $banios,
            'electricas' => $electricas,
            'declarada' => $declarada,
            'verificada' => $verificada,
            'uca' => $uca
        ];
    }
    //anexo01_Tdocumentos
    private function documentos($id, $value)
    {
        $numero = '';
        if (isset($value[0]->Id) && $value[0]->Id == $id.'_numero' && is_string($value[0]->Value) )    $numero = $value[0]->Value;

        return  [
            'numero' => $numero
        ];
    }
    //anexo01_Opropietario
    private function propietario($id, $value)
    {
        $propietario = '';
        if (isset($value[0]->Id) && $value[0]->Id == $id.'_s_n' && is_string($value[0]->Value) )    $propietario = $value[0]->Value;

        return  [
            'propietario' => $propietario
        ];
    }
    private function registrarVerifActuaTrib($form)
    {
        Log::useDailyFiles(storage_path().'/logs/tributaria.log');
        $form = json_encode($form);

        Log::info( [$form]);

        $form = json_decode($form);
        //operador
        $EmployeeNumber = $FirstName = $GroupName='';
        $ficha_p = $codigo_p = $contador = $ubica = $observaciones = $anexo01_p_anexo = $anexo02_p_anexo = $anexo03_p_anexo = $nombres_declarantes = $dni_declaramtes = $nombres_propietarios = $dni_propietario = $nombres_fiscalizador = $dni_fiscalizador = $x = $y = $coor_x = $coor_y = '';

        if (isset($form->EntryLocation->X) )    $coor_x = $form->EntryLocation->X;
        if (isset($form->EntryLocation->Y) )    $coor_y = $form->EntryLocation->Y;
        if (isset($form->Employee->EmployeeNumber) )    $EmployeeNumber = $form->Employee->EmployeeNumber;
        if (isset($form->Employee->FirstName) )    $FirstName = $form->Employee->FirstName;
        if (isset($form->Employee->Group->Name) )    $GroupName = $form->Employee->Group->Name;
        $fisca =[
            'EmployeeNumber' => $EmployeeNumber,
            'FirstName' => $FirstName,
            'GroupName' => $GroupName,
        ];
        Log::info( "insert");
        $fiscalizacion = Fiscalizacion::create($fisca);
        $Propietario = $Domicilio = $Prediouno = $Prediodos = $Prediotres = $Construccion = $Instalacion = $Datos = [];

        if (isset($form->Form->Fields->Field) ) {

            Log::info( "Field");
            foreach ($form->Form->Fields->Field as $key => $value)
            {
               // Log::info( [$value] );
                if ( $value->Id=='ficha_p' && isset($value->Value) && is_string($value->Value) )    $ficha_p = $value->Value;
                if ( $value->Id=='codigo_p' && isset($value->Value) && is_string($value->Value) )    $codigo_p = $value->Value;
                //if ( $value->Id=='contador' && isset($value->Value) && is_string($value->Value))    $contador = $value->Value;
                if ( $value->Id=='parte07_obs_p' && isset($value->Value) && is_string($value->Value) )    $observaciones = $value->Value;
                if ( $value->Id=='anexo01_p_anexo' && isset($value->Value) && is_string($value->Value) )    $anexo01_p_anexo = $value->Value;
                if ( $value->Id=='anexo02_p_anexo' && isset($value->Value) && is_string($value->Value) )    $anexo02_p_anexo = $value->Value;
                if ( $value->Id=='anexo03_p_anexo' && isset($value->Value) && is_string($value->Value) )    $anexo03_p_anexo = $value->Value;

                if ( $value->Id=='nombres_declarantes' && isset($value->Value) && is_string($value->Value) )    $nombres_declarantes = $value->Value;
                if ( $value->Id=='dni_declaramtes' && isset($value->Value) && is_string($value->Value) )    $dni_declaramtes = $value->Value;
                if ( $value->Id=='nombres_propietarios' && isset($value->Value) && is_string($value->Value) )    $nombres_propietarios = $value->Value;
                if ( $value->Id=='dni_propietario' && isset($value->Value) && is_string($value->Value) )    $dni_propietario = $value->Value;
                if ( $value->Id=='nombres_fiscalizador' && isset($value->Value) && is_string($value->Value) )    $nombres_fiscalizador = $value->Value;
                if ( $value->Id=='dni_fiscalizador' && isset($value->Value) && is_string($value->Value) )    $dni_fiscalizador = $value->Value;
                //if ( $value->Id=='5' && isset($value->Value) && is_string($value->Value))    $fichaNro = $value->Value;
                if ( $value->Id=='ubica' && isset($value->Value) && is_string($value->Value) ) {
                    $ubica = $value->Value;
                    //-11.99691305,-77.05457402
                    list($y,$x) = explode(",", $value->Value);
                }
            }

            $fiscalizacion->ficha_p = $ficha_p;
            $fiscalizacion->codigo_p =$codigo_p;
            $fiscalizacion->ubica = $ubica;
            if ($x=='')    $x= $coor_x;
            if ($y=='')    $y= $coor_y;
            
            $fiscalizacion->x = $x;
            $fiscalizacion->y = $y;
            $fiscalizacion->foto1 ='';
            $fiscalizacion->foto2 ='';
            $fiscalizacion->foto3 ='';
            $fiscalizacion->foto4 ='';
            $fiscalizacion->observaciones = $observaciones;
            $fiscalizacion->anexo01_p_anexo =$anexo01_p_anexo;
            $fiscalizacion->anexo02_p_anexo =$anexo02_p_anexo;
            //$fiscalizacion->anexo03_p_anexo =$anexo03_p_anexo;
            $fiscalizacion->firma_declarante ='';
            $fiscalizacion->nombres_declarantes = $nombres_declarantes;
            $fiscalizacion->dni_declarantes = $dni_declaramtes;
            $fiscalizacion->firma_propietario ='';
            $fiscalizacion->nombres_propietarios =$nombres_propietarios;
            $fiscalizacion->dni_propietario =$dni_propietario;
            $fiscalizacion->firma_fiscalizador ='';
            $fiscalizacion->nombres_fiscalizador =$nombres_fiscalizador;
            $fiscalizacion->dni_fiscalizador =$dni_fiscalizador;

            $fiscalizacion->save();
        }
        $dir = 'img/test/';
        if (isset($form->Files->File) && count($form->Files->File)>0 ) {
            Log::info("imagen");
            $imagenes =[];
            foreach ($form->Files->File as $key => $value) {
                $nombreImagen = $ficha_p.'_'.str_replace(' ', '', $key).'.jpg';
                $ifp = fopen($dir.$nombreImagen, "w+");
                fwrite($ifp, base64_decode($value->Data));
                fclose($ifp);
                $imagenes[]=new ImagenFiscalizacion(['url' => $dir.$nombreImagen]);
            }
            $formulario->imagenes()->saveMany($imagenes);
        }
        if (isset($form->Form->Fields->Field) )
        {
            Log::info( "foreach");

            foreach ($form->Form->Fields->Field as $key => $value)
            {
                //1 IDENTIFICACIÓN DEL PROPIETARIO
                if ( $value->Id=='parte01' && isset($value->Rows->Row)) {
                    foreach ($value->Rows->Row as $k => $v) {
                        $parte01 = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $parte01 = $this->parte01($field);
                            }
                        } else {
                            $parte01 = $this->parte01($v);
                        }
                        if (count($parte01)>0) {
                            $Propietario[]=new Propietario($parte01);
                        }
                    }
                    $fiscalizacion->propietarios()->saveMany($Propietario);
                }
                //2 DOMICILIO FISCAL DEL CONTRIBUYENTE
                if ( $value->Id=='parte02' && isset($value->Rows->Row)) {
                    foreach ($value->Rows->Row as $k => $v) {
                        $parte02 = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $parte02 = $this->parte02($field);
                            }
                        } else {
                            $parte02 = $this->parte02($v);
                        }
                        if (count($parte02)>0) {
                            $Domicilio[]=new Domicilio($parte02);
                        }
                    }
                    $fiscalizacion->domicilios()->saveMany($Domicilio);
                }
                //3 UBICACIÓN DEL PREDIO
                if ( $value->Id=='parte03' && isset($value->Rows->Row)) {
                    foreach ($value->Rows->Row as $k => $v) {
                        $parte03 = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $parte03 = $this->parte03($field);
                            }
                        } else {
                            $parte03 = $this->parte03($v);
                        }
                        if (count($parte03)>0) {
                            $Prediouno[]=new Ubicacion($parte03);
                        }
                    }
                    $fiscalizacion->ubicaciones()->saveMany($Prediouno);
                }
                //4 CONSTRUCCIONES EDIFICADA
                if ( $value->Id=='parte04' && isset($value->Rows->Row)) {
                    foreach ($value->Rows->Row as $k => $v) {
                        $parte04 = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $parte04 = $this->parte04($field);
                            }
                        } else {
                            $parte04 = $this->parte04($v);
                        }
                        if (count($parte04)>0) {
                            $Construccion[]=new Construccion($parte04);
                        }
                    }
                    $fiscalizacion->construcciones()->saveMany($Construccion);
                }
                //5 OTRAS INSTALACIONES FIJAS Y PERMANENTES
                if ( $value->Id=='parte05' && isset($value->Rows->Row)) {
                    foreach ($value->Rows->Row as $k => $v) {
                        $parte05 = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $parte05 = $this->parte05($field);
                            }
                        } else {
                            $parte05 = $this->parte05($v);
                        }
                        if (count($parte05)>0) {
                            $Instalacion[]=new Instalacion($parte05);
                        }
                    }
                    $fiscalizacion->instalaciones()->saveMany($Instalacion);
                }
                //6 DATOS RELACIONADOS A LOS CONDOMINANTES
                if ( $value->Id=='parte06' && isset($value->Rows->Row) ) {
                    foreach ($value->Rows->Row as $k => $v) {
                        $parte06 = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $parte06 = $this->parte06($field);
                            }
                        } else {
                            $parte06 = $this->parte06($v);
                        }
                        if (count($parte06)>0) {
                            $Datos[]=new Dato($parte06);
                        }
                    }
                    $fiscalizacion->datos()->saveMany($Datos);
                }

                //X. AUTORIZACIÓN MUNICIPAL DE FUNCIONAMIENTO
                if ( ($value->Id=='anexo01_autorizacion' ||
                    $value->Id=='anexo02_autorizacion' ||
                    $value->Id=='anexo03_autorizacion') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $autorizacion = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $autorizacion = $this->autorizacion($value->Id,$field);
                            }
                        } else {
                            $autorizacion = $this->autorizacion($value->Id,$v);
                        }
                        if (count($autorizacion)>0) {
                            $autorizacion['anexo_id'] = $anexo;
                            $Datos[]=new Aautorizacion($autorizacion);
                        }
                    }
                    $fiscalizacion->a_autorizaciones()->saveMany($Datos);
                }
                //anexo01_Ubicacion
                if ( ($value->Id=='anexo01_Ubicacion' ||
                    $value->Id=='anexo02_Ubicacion' ||
                    $value->Id=='anexo03_Ubicacion') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $ubicacion = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $this->ubicacion($value->Id, $field);
                            }
                        } else {
                            $ubicacion = $this->ubicacion($value->Id,$v);
                        }
                        if (count($ubicacion)>0) {
                            $ubicacion['anexo_id'] = $anexo;
                            $Datos[]=new Aubicacion($ubicacion);
                        }
                    }
                    $fiscalizacion->a_ubicaciones()->saveMany($Datos);
                }
                //anexo01_masdatos
                if ( ($value->Id=='anexo01_masdatos' ||
                    $value->Id=='anexo02_masdatos' ||
                    $value->Id=='anexo03_masdatos') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $masdato = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $masdato = $this->masdatos($value->Id, $field);
                            }
                        } else {
                            $masdato = $this->masdatos($value->Id,$v);
                        }
                        if (count($masdato)>0) {
                            $masdato['anexo_id'] = $anexo;
                            $Datos[]=new Amasdato($masdato);
                        }
                    }
                    $fiscalizacion->a_masdatos()->saveMany($Datos);
                }
                //anexo01_Aanuncio
                if ( ($value->Id=='anexo01_Aanuncio' ||
                    $value->Id=='anexo02_Aanuncio' ||
                    $value->Id=='anexo03_Aanuncio') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $anuncio = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $anuncio = $this->anuncio($value->Id, $field);
                            }
                        } else {
                            $anuncio = $this->anuncio($value->Id,$v);
                        }
                        if (count($anuncio)>0) {
                            $anuncio['anexo_id'] = $anexo;
                            $Datos[]=new Aanuncio($anuncio);
                        }
                    }
                    $fiscalizacion->a_anuncios()->saveMany($Datos);
                }
                //anexo01_bien_comun
                if ( ($value->Id=='anexo01_bien_comun' ||
                    $value->Id=='anexo02_bien_comun' ||
                    $value->Id=='anexo03_bien_comun') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $biencomun = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $biencomun = $this->biencomun($value->Id, $field);
                            }
                        } else {
                            $biencomun = $this->biencomun($value->Id,$v);
                        }
                        if (count($biencomun)>0) {
                            $biencomun['anexo_id'] = $anexo;
                            $Datos[]=new Abiencomun($biencomun);
                        }
                    }
                    $fiscalizacion->a_biencomun()->saveMany($Datos);
                }
                //anexo01_Ccomunes
                if ( ($value->Id=='anexo01_Ccomunes' ||
                    $value->Id=='anexo02_Ccomunes' ||
                    $value->Id=='anexo03_Ccomunes') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $comun = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $comun = $this->comunes($value->Id, $field);
                            }
                        } else {
                            $comun = $this->comunes($value->Id,$v);
                        }
                        if (count($comun)>0) {
                            $comun['anexo_id'] = $anexo;
                            $Datos[]=new Acomun($comun);
                        }
                    }
                    $fiscalizacion->a_comunes()->saveMany($Datos);
                }
                //anexo01_Tdocumentos
                if ( ($value->Id=='anexo01_Tdocumentos' ||
                    $value->Id=='anexo02_Tdocumentos' ||
                    $value->Id=='anexo03_Tdocumentos') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $documento = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $documento = $this->documentos($value->Id, $field);
                            }
                        } else {
                            $documento = $this->documentos($value->Id,$v);
                        }
                        if (count($documento)>0) {
                            $documento['anexo_id'] = $anexo;
                            $Datos[]=new Adocumento($documento);
                        }
                    }
                    $fiscalizacion->a_documentos()->saveMany($Datos);
                }
                //anexo01_Opropietario
                if ( ($value->Id=='anexo01_Opropietario' ||
                    $value->Id=='anexo02_Opropietario' ||
                    $value->Id=='anexo03_Opropietario') && isset($value->Rows->Row) ) {
                    list($anexo,$nombre) = explode("_", $value->Id);
                    $anexo = substr($anexo, -1);
                    foreach ($value->Rows->Row as $k => $v) {
                        $propietario = [];
                        if ( is_object($v) ) {
                            foreach ($v as $field) {
                                $propietario = $this->propietario($value->Id, $field);
                            }
                        } else {
                            $propietario = $this->propietario($value->Id,$v);
                        }
                        if (count($propietario)>0) {
                            $propietario['anexo_id'] = $anexo;
                            $Datos[]=new Apropietario($propietario);
                        }
                    }
                    $fiscalizacion->a_propietarios()->saveMany($Datos);
                }
               // Log::info( [ $key ] );
            }

            Log::info("pre");        
        }

        Log::info( "fin");
    }

}