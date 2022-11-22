<?php
echo '<table width="100%"><tr>';
$i=0;
foreach ($colegiados as $data){
    if($i%2==0 && $i!=0)
    {
    echo '</tr><tr><td>'.$data->Nombre. ' ' . $data->Apellidos . '<br>'. '<br>'. $data->Direccion . ', '. $data->Localidad . ', '. $data->Provincia . '   '. $data->CP . '</td>';
    }
   else
    echo '<td>'.$data->Nombre. ' ' . $data->Apellidos . '<br>'. '<br>'. $data->Direccion . ', '. $data->Localidad . ', '. $data->Provincia . '   '. $data->CP . '</td>';
  $i++;
}
echo '</tr></table>';