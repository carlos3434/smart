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
        if ($formObj->Form->Version=='12') {
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
        if ($form['Version']=='12') {
            $this->registrarVerifActuaTrib($form);
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

    private function registrarVerifActuaTrib($form)
    {
        Log::useDailyFiles(storage_path().'/logs/tributaria.log');
        $form = json_encode($form);

        Log::info( ["inicio"]);

        $form = json_decode($form);
        //operador
        $Email = $EmployeeNumber = $FirstName = $GroupName='';
        $ubicacion = $fichaNro = $observaciones = $ape_nom = $dni = '';
        if (isset($form->Employee->Email) )    $Email = $form->Employee->Email;
        if (isset($form->Employee->EmployeeNumber) )    $EmployeeNumber = $form->Employee->EmployeeNumber;
        if (isset($form->Employee->FirstName) )    $FirstName = $form->Employee->FirstName;
        if (isset($form->Employee->Group->Name) )    $GroupName = $form->Employee->Group->Name;
        $fisca =[
            'Email' => $Email,
            'EmployeeNumber' => $EmployeeNumber,
            'FirstName' => $FirstName,
            'GroupName' => $GroupName,
        ];
        $fiscalizacion = Fiscalizacion::create($fisca);
        $Propietario = $Domicilio = $Prediouno = $Prediodos = $Prediotres = $Construccion = $Instalacion = $Datos = [];
        if (isset($form->Form->Fields->Field) ) {
            
            foreach ($form->Form->Fields->Field as $key => $value) 
            {
                if ( $value->Id=='UBICACIÓN (Presionar Imagen)')
                {
                    if (isset($value->Value))    $ubicacion = $value->Value;
                }
                if ( $value->Id=='Ficha Nro')
                {
                    if (isset($value->Value))    $fichaNro = $value->Value;
                }
                if ( $value->Id=='OBSERVACIONES')
                {
                    if (isset($value->Value))    $observaciones = $value->Value;
                }
                //declarante
                if ( $value->Id=='APELLIDO Y NOMBRES')
                {
                    if (isset($value->Value))    $ape_nom = $value->Value;
                }
                if ( $value->Id=='DNI')
                {
                    if (isset($value->Value))    $dni = $value->Value;
                }
                //propietario
                if ( $value->Id=='APELLIDO Y NOMBRES')
                {
                    if (isset($value->Value))    $ape_nom = $value->Value;
                }
                if ( $value->Id=='DNI')
                {
                    if (isset($value->Value))    $dni = $value->Value;
                }
                //fiscalizador
                if ( $value->Id=='APELLIDO Y NOMBRES')
                {
                    if (isset($value->Value))    $ape_nom = $value->Value;
                }
                if ( $value->Id=='DNI')
                {
                    if (isset($value->Value))    $dni = $value->Value;
                }
                //1
                if ( $value->Id=='IDENTIFICACIÓN DEL PROPIETARIO')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $codigo = $tipo_doc = $num_doc = $ape_nombres ='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )    $codigo = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )    $tipo_doc = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )    $num_doc = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )    $ape_nombres = $v->Field[3]->Value;
                        } else {
                            if ( isset($v[0]->Value ))    $codigo = $v[0]->Value;
                            if ( isset($v[1]->Value ))    $tipo_doc = $v[1]->Value;
                            if ( isset($v[2]->Value ))    $num_doc = $v[2]->Value;
                            if ( isset($v[3]->Value ))    $ape_nombres = $v[3]->Value;
                        }
                        $propietarios =[
                            "codigo" => $codigo,
                            "tipo_doc" => $tipo_doc,
                            "num_doc" => $num_doc,
                            "ape_nombres" => $ape_nombres
                        ];
                        $Propietario[]=new Propietario($propietarios);
                    }
                    $fiscalizacion->propietarios()->saveMany($Propietario);
                }
                //2
                if ( $value->Id=='DOMICILIO FISCAL DEL CONTRIBUYENTE ')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $cod_postal=$distrito=$cod_urbano=$conjunto_urbano=$cod_via=$via=$num_municipal=$departamento=$manzana=$lote=$telefono='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $cod_postal = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $distrito = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $cod_urbano = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $conjunto_urbano = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $cod_via = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $via = $v->Field[5]->Value;
                            if (isset($v->Field[6]->Value) )     $num_municipal = $v->Field[6]->Value;
                            if (isset($v->Field[7]->Value) )     $departamento = $v->Field[7]->Value;
                            if (isset($v->Field[8]->Value) )     $manzana = $v->Field[8]->Value;
                            if (isset($v->Field[9]->Value) )     $lote = $v->Field[9]->Value;
                            if (isset($v->Field[10]->Value) )    $telefono = $v->Field[10]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $cod_postal = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $distrito = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $cod_urbano = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $conjunto_urbano = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $cod_via = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $via = $v[5]->Value;
                            if ( isset($v[6]->Value ))     $num_municipal = $v[6]->Value;
                            if ( isset($v[7]->Value ))     $departamento = $v[7]->Value;
                            if ( isset($v[8]->Value ))     $manzana = $v[8]->Value;
                            if ( isset($v[9]->Value ))     $lote = $v[9]->Value;
                            if ( isset($v[10]->Value ))    $telefono = $v[10]->Value;
                        }
                        $propietarios =[
                            "cod_postal" => $cod_postal,
                            "distrito" => $distrito,
                            "cod_urbano" => $cod_urbano,
                            "conjunto_urbano" => $conjunto_urbano,
                            "cod_via" => $cod_via,
                            "via" => $via,
                            "num_municipal" => $num_municipal,
                            "departamento" => $departamento,
                            "manzana" => $manzana,
                            "lote" => $lote,
                            "telefono" => $telefono
                        ];
                        $Domicilio[]=new Domicilio($propietarios);
                    }
                    $fiscalizacion->domicilios()->saveMany($Domicilio);
                }
                //3
                if ( $value->Id=='UBICACIÓN DEL PREDIO I')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $cod_predio=$departamento=$provincia=$distrito=$sector=$manzana=$lote=$edifica=$entrada=$peso=$unidad=$dc=$cod_uso=$uso_propiedad='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $cod_predio = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $departamento = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $provincia = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $distrito = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $sector = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $manzana = $v->Field[5]->Value;
                            if (isset($v->Field[6]->Value) )     $lote = $v->Field[6]->Value;
                            if (isset($v->Field[7]->Value) )     $edifica = $v->Field[7]->Value;
                            if (isset($v->Field[8]->Value) )     $entrada = $v->Field[8]->Value;
                            if (isset($v->Field[9]->Value) )     $peso = $v->Field[9]->Value;
                            if (isset($v->Field[10]->Value) )    $unidad = $v->Field[10]->Value;
                            if (isset($v->Field[11]->Value) )    $dc = $v->Field[11]->Value;
                            if (isset($v->Field[12]->Value) )    $cod_uso = $v->Field[12]->Value;
                            if (isset($v->Field[13]->Value) )    $uso_propiedad = $v->Field[13]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $cod_predio = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $departamento = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $provincia = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $distrito = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $sector = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $manzana = $v[5]->Value;
                            if ( isset($v[6]->Value ))     $lote = $v[6]->Value;
                            if ( isset($v[7]->Value ))     $edifica = $v[7]->Value;
                            if ( isset($v[8]->Value ))     $entrada = $v[8]->Value;
                            if ( isset($v[9]->Value ))     $peso = $v[9]->Value;
                            if ( isset($v[10]->Value ))    $unidad = $v[10]->Value;
                            if ( isset($v[11]->Value ))    $dc = $v[11]->Value;
                            if ( isset($v[12]->Value ))    $cod_uso = $v[12]->Value;
                            if ( isset($v[13]->Value ))    $uso_propiedad = $v[13]->Value;
                        }
                        $propietarios =[
                            "cod_predio" => $cod_predio,
                            "departamento" => $departamento,
                            "provincia" => $provincia,
                            "distrito" => $distrito,
                            "sector" => $sector,
                            "manzana" => $manzana,
                            "lote" => $lote,
                            "edifica" => $edifica,
                            "entrada" => $entrada,
                            "peso" => $peso,
                            "unidad" => $unidad,
                            "dc" => $dc,
                            "cod_uso" => $cod_uso,
                            "uso_propiedad" => $uso_propiedad
                        ];
                        $Prediouno[]=new Prediouno($propietarios);
                    }
                    $fiscalizacion->prediouno()->saveMany($Prediouno);
                }


                if ( $value->Id=='UBICACIÓN DEL PREDIO II')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $codigo_urbano=$centro_poblado=$desc_centro_poblado=$cod_via=$via=$numero=$block=$manzana=$lote=$sublote=$fecha_compra=$fecha_exon=$num_resolucion_municipal=$condicion=$desc_condicion='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $codigo_urbano = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $centro_poblado = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $desc_centro_poblado = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $cod_via = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $via = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $numero = $v->Field[5]->Value;
                            if (isset($v->Field[6]->Value) )     $block = $v->Field[6]->Value;
                            if (isset($v->Field[7]->Value) )     $manzana = $v->Field[7]->Value;
                            if (isset($v->Field[8]->Value) )     $lote = $v->Field[8]->Value;
                            if (isset($v->Field[9]->Value) )     $sublote = $v->Field[9]->Value;
                            if (isset($v->Field[10]->Value) )    $fecha_compra = $v->Field[10]->Value;
                            if (isset($v->Field[11]->Value) )    $fecha_exon = $v->Field[11]->Value;
                            if (isset($v->Field[12]->Value) )    $num_resolucion_municipal = $v->Field[12]->Value;
                            if (isset($v->Field[13]->Value) )    $condicion = $v->Field[13]->Value;
                            if (isset($v->Field[14]->Value) )    $desc_condicion = $v->Field[14]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $codigo_urbano = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $centro_poblado = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $desc_centro_poblado = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $cod_via = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $via = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $numero = $v[5]->Value;
                            if ( isset($v[6]->Value ))     $block = $v[6]->Value;
                            if ( isset($v[7]->Value ))     $manzana = $v[7]->Value;
                            if ( isset($v[8]->Value ))     $lote = $v[8]->Value;
                            if ( isset($v[9]->Value ))     $sublote = $v[9]->Value;
                            if ( isset($v[10]->Value ))    $fecha_compra = $v[10]->Value;
                            if ( isset($v[11]->Value ))    $fecha_exon = $v[11]->Value;
                            if ( isset($v[12]->Value ))    $num_resolucion_municipal = $v[12]->Value;
                            if ( isset($v[13]->Value ))    $condicion = $v[13]->Value;
                            if ( isset($v[14]->Value ))    $desc_condicion = $v[14]->Value;
                        }
                        $propietarios =[
                            "codigo_urbano" => $codigo_urbano,
                            "centro_poblado" => $centro_poblado,
                            "desc_centro_poblado" => $desc_centro_poblado,
                            "cod_via" => $cod_via,
                            "via" => $via,
                            "numero" => $numero,
                            "block" => $block,
                            "manzana" => $manzana,
                            "lote" => $lote,
                            "sublote" => $sublote,
                            "fecha_compra" => $fecha_compra,
                            "fecha_exon" => $fecha_exon,
                            "num_resolucion_municipal" => $num_resolucion_municipal,
                            "condicion" => $condicion,
                            "desc_condicion" => $desc_condicion
                        ];
                         $Prediodos[]=new Prediodos($propietarios);
                    }
                    $fiscalizacion->prediodos()->saveMany($Prediodos);
                }


                if ( $value->Id=='UBICACIÓN DEL PREDIO III')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $sum_luz=$sum_agua=$area_terreno_cecla=$area_terreno_verifica=$area_terreno_comun=$area_terreno_propia=$longitud_fachada=$ubicacion_parques=$clasificacion_predio='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $sum_luz = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $sum_agua = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $area_terreno_cecla = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $area_terreno_verifica = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $area_terreno_comun = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $area_terreno_propia = $v->Field[5]->Value;
                            if (isset($v->Field[6]->Value) )     $longitud_fachada = $v->Field[6]->Value;
                            if (isset($v->Field[7]->Value) )     $ubicacion_parques = $v->Field[7]->Value;
                            if (isset($v->Field[8]->Value) )     $clasificacion_predio = $v->Field[8]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $sum_luz = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $sum_agua = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $area_terreno_cecla = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $area_terreno_verifica = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $area_terreno_comun = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $area_terreno_propia = $v[5]->Value;
                            if ( isset($v[6]->Value ))     $longitud_fachada = $v[6]->Value;
                            if ( isset($v[7]->Value ))     $ubicacion_parques = $v[7]->Value;
                            if ( isset($v[8]->Value ))     $clasificacion_predio = $v[8]->Value;
                        }
                        $propietarios =[
                            "sum_luz" => $sum_luz,
                            "sum_agua" => $sum_agua,
                            "area_terreno_cecla" => $area_terreno_cecla,
                            "area_terreno_verifica" => $area_terreno_verifica,
                            "area_terreno_comun" => $area_terreno_comun,
                            "area_terreno_propia" => $area_terreno_propia,
                            "longitud_fachada" => $longitud_fachada,
                            "ubicacion_parques" => $ubicacion_parques,
                            "clasificacion_predio" => $clasificacion_predio
                        ];
                        $Prediotres[]=new Prediotres($propietarios);
                    }
                    $fiscalizacion->prediotres()->saveMany($Prediotres);
                }


                if ( $value->Id=='CONSTRUCCIONES EDIFICADAS(Llenar cada línea por cada: Piso,Sótano,Mezanine y por otra construcción verificada)')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $piso =$fecha_construccion =$materiales_construccion =$estado_conservacion =$estado_construccion =$muros_columnas =$techos =$pisos =$puertas_ventanas =$revestimientos =$banios =$instalaciones_electricas =$area_construida_declarada =$area_construida_verificada =$uca ='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $piso = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $fecha_construccion = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $materiales_construccion = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $estado_conservacion = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $estado_construccion = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $muros_columnas = $v->Field[5]->Value;
                            if (isset($v->Field[6]->Value) )     $techos = $v->Field[6]->Value;
                            if (isset($v->Field[7]->Value) )     $pisos = $v->Field[7]->Value;
                            if (isset($v->Field[8]->Value) )     $puertas_ventanas = $v->Field[8]->Value;
                            if (isset($v->Field[9]->Value) )     $revestimientos = $v->Field[9]->Value;
                            if (isset($v->Field[10]->Value) )    $banios = $v->Field[10]->Value;
                            if (isset($v->Field[11]->Value) )    $instalaciones_electricas = $v->Field[11]->Value;
                            if (isset($v->Field[12]->Value) )    $area_construida_declarada = $v->Field[12]->Value;
                            if (isset($v->Field[13]->Value) )    $area_construida_verificada = $v->Field[13]->Value;
                            if (isset($v->Field[14]->Value) )    $uca = $v->Field[14]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $piso = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $fecha_construccion = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $materiales_construccion = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $estado_conservacion = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $estado_construccion = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $muros_columnas = $v[5]->Value;
                            if ( isset($v[6]->Value ))     $techos = $v[6]->Value;
                            if ( isset($v[7]->Value ))     $pisos = $v[7]->Value;
                            if ( isset($v[8]->Value ))     $puertas_ventanas = $v[8]->Value;
                            if ( isset($v[9]->Value ))     $revestimientos = $v[9]->Value;
                            if ( isset($v[10]->Value ))    $banios = $v[10]->Value;
                            if ( isset($v[11]->Value ))    $instalaciones_electricas = $v[11]->Value;
                            if ( isset($v[12]->Value ))    $area_construida_declarada = $v[12]->Value;
                            if ( isset($v[13]->Value ))    $area_construida_verificada = $v[13]->Value;
                            if ( isset($v[14]->Value ))    $uca = $v[14]->Value;
                        }
                        $propietarios =[
                            "piso" => $piso,
                            "fecha_construccion" => $fecha_construccion,
                            "materiales_construccion" => $materiales_construccion,
                            "estado_conservacion" => $estado_conservacion,
                            "estado_construccion" => $estado_construccion,
                            "muros_columnas" => $muros_columnas,
                            "techos" => $techos,
                            "pisos" => $pisos,
                            "puertas_ventanas" => $puertas_ventanas,
                            "revestimientos" => $revestimientos,
                            "banios" => $banios,
                            "instalaciones_electricas" => $instalaciones_electricas,
                            "area_construida_declarada" => $area_construida_declarada,
                            "area_construida_verificada" => $area_construida_verificada,
                            "uca" => $uca
                        ];
                        $Construccion[]=new Construccion($propietarios);
                    }
                    $fiscalizacion->construcciones()->saveMany($Construccion);
                }

                if ( $value->Id=='OTRAS INSTALACIONES FIJAS Y PERMANENTES')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $codigo=$desc_instalacion=$fecha_termino=$unidad_medida=$material_predominante=$estado_conservacion=$largo=$ancho=$alto=$total=$valor_soles='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $codigo = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $desc_instalacion = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $fecha_termino = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $unidad_medida = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $material_predominante = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $estado_conservacion = $v->Field[5]->Value;
                            if (isset($v->Field[6]->Value) )     $largo = $v->Field[6]->Value;
                            if (isset($v->Field[7]->Value) )     $ancho = $v->Field[7]->Value;
                            if (isset($v->Field[8]->Value) )     $alto = $v->Field[8]->Value;
                            if (isset($v->Field[9]->Value) )     $total = $v->Field[9]->Value;
                            if (isset($v->Field[10]->Value) )    $valor_soles = $v->Field[10]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $codigo = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $desc_instalacion = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $fecha_termino = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $unidad_medida = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $material_predominante = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $estado_conservacion = $v[5]->Value;
                            if ( isset($v[6]->Value ))     $largo = $v[6]->Value;
                            if ( isset($v[7]->Value ))     $ancho = $v[7]->Value;
                            if ( isset($v[8]->Value ))     $alto = $v[8]->Value;
                            if ( isset($v[9]->Value ))     $total = $v[9]->Value;
                            if ( isset($v[10]->Value ))    $valor_soles = $v[10]->Value;
                        }
                        $propietarios =[
                            "codigo" => $codigo,
                            "desc_instalacion" => $desc_instalacion,
                            "fecha_termino" => $fecha_termino,
                            "unidad_medida" => $unidad_medida,
                            "material_predominante" => $material_predominante,
                            "estado_conservacion" => $estado_conservacion,
                            "largo" => $largo,
                            "ancho" => $ancho,
                            "alto" => $alto,
                            "total" => $total,
                            "valor_soles" => $valor_soles
                        ];
                        $Instalacion[]=new Instalacion($propietarios);
                    }
                    $fiscalizacion->instalaciones()->saveMany($Instalacion);
                }
                if ( $value->Id=='DATOS RELACIONADOS A LOS CONDOMINANTES')
                {
                    //recorrer los propietarios
                    foreach ($value->Rows->Row as $k => $v)
                    {
                        $codigo = $tipo_doc = $num_doc = $ape_nombres ='';

                        $codigo_contribuyente=$num_doc_identidad=$ape_nom_razon_social_condominio=$domicilio_fiscal=$porcentaje_condominio='';
                        //si son varios registros viene como objeto
                        if ( is_object($v) ) {
                            if (isset($v->Field[0]->Value) )     $numero = $v->Field[0]->Value;
                            if (isset($v->Field[1]->Value) )     $codigo_contribuyente = $v->Field[1]->Value;
                            if (isset($v->Field[2]->Value) )     $num_doc_identidad = $v->Field[2]->Value;
                            if (isset($v->Field[3]->Value) )     $ape_nom_razon_social_condominio = $v->Field[3]->Value;
                            if (isset($v->Field[4]->Value) )     $domicilio_fiscal = $v->Field[4]->Value;
                            if (isset($v->Field[5]->Value) )     $porcentaje_condominio = $v->Field[5]->Value;
                        } else {
                            if ( isset($v[0]->Value ))     $numero = $v[0]->Value;
                            if ( isset($v[1]->Value ))     $codigo_contribuyente = $v[1]->Value;
                            if ( isset($v[2]->Value ))     $num_doc_identidad = $v[2]->Value;
                            if ( isset($v[3]->Value ))     $ape_nom_razon_social_condominio = $v[3]->Value;
                            if ( isset($v[4]->Value ))     $domicilio_fiscal = $v[4]->Value;
                            if ( isset($v[5]->Value ))     $porcentaje_condominio = $v[5]->Value;
                        }
                        $propietarios =[
                            "numero" => $numero,
                            "codigo_contribuyente" => $codigo_contribuyente,
                            "num_doc_identidad" => $num_doc_identidad,
                            "ape_nom_razon_social_condominio" => $ape_nom_razon_social_condominio,
                            "domicilio_fiscal" => $domicilio_fiscal,
                            "porcentaje_condominio" => $porcentaje_condominio
                        ];
                        $Datos[]=new Datos($propietarios);
                    }
                    $fiscalizacion->datos()->saveMany($Datos);
                }

            }
        }
        if ($fiscalizacion) {
            $ubicacion = $fichaNro = $observaciones = $ape_nom = $dni = '';
            $fiscalizacion->ubicacion = $ubicacion;
            $fiscalizacion->fichaNro = $fichaNro;
            $fiscalizacion->observaciones = $observaciones;
            $fiscalizacion->ape_nom = $ape_nom;
            $fiscalizacion->dni = $dni;
            $fiscalizacion->save();
        }
        Log::info( ["fin"]);
    }

}