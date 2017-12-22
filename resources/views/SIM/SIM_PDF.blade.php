
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>SIM PDF</title>
</head>

<body>

    <H4 style="color:red"><b>SISTEMA INTEGRAL DE MONITOREO</b></H4>    
    <table width="100%">
      <tbody>
        <tr>
          <td>
            {!!Form::label('empresa','Empresa:')!!} <br>
            <font size="4"><b>{{$empresa[0]->nombre}}</b></font>
          </td>
          <td  >
            {!!Form::label('zona','Zona:')!!} <br>
            <font size="4"><b>{{$granja[0]->zona}}</b></font>
          </td>
          <td   >
            {!!Form::label('edad','Edad:')!!} <br>
            <font size="4"><b>{{$sistema_integral[0]->edad}}</b></font>
          </td>
          <td  >
            {!!Form::label('nro_pollos','Nro de Pollos:')!!} <br>
            <font size="4"><b>{{$sistema_integral[0]->nro_pollos}}</b></font>
          </td>
          <td  >
            {!!Form::label('codigo','Codigo:')!!}  <font size="4"><b>R.50</b></font>         
          </td>
        </tr>

        <tr>
          <td  >
            {!!Form::label('granja','Granja:')!!} <br>
            <font size="4"><b>{{$granja[0]->nombre}}</b></font>
          </td>
          <td  >
            {!!Form::label('galpon','Galpon:')!!} <br>
            <font size="4"><b>{{$galpon[0]->codigo}}</b></font>
          </td>
          <td    >
            {!!Form::label('sexo','Sexo:')!!} <br>
            <?php switch ($sistema_integral[0]->sexo) {
                case 0:
                    $sexo = "Mixto";
                    break;
                case "F":
                    $sexo = "Hembra";
                    break;
                case "M":
                    $sexo = "Macho";
                    break;
            } ?>
            <font size="4"><b>{{$sexo}}</b></font>
          </td>
          <td  >
            {!!Form::label('fecha','Fecha:')!!} <br>
            <font size="4"><b>{{$sistema_integral[0]->fecha}}</b></font>
          </td>
          <td  >
            {!!Form::label('revision','Revisión:')!!} <font size="4"><b>00</b></font>
          </td>
        </tr>        
      </tbody>
    </table><br>



      <table width="100%">
        <thead style="background-color: #00993b; color: white">
          <tr>
            <th><center>Peso Corporal</center></th> 
            <th><center>Peso de Bursa (g)</center></th> 
            <th><center>Peso de Bazo (g)</center></th> 
            <th><center>Peso de Timo (g)</center></th> 
            <th><center>Peso de Higado (g)</center></th> 
            <th><center>Indice Bursal</center></th> 
            <th><center>Indice Timico</center></th> 
            <th><center>Indice Hepatico</center></th> 
            <th><center>Bursometro</center></th>             
          </tr>
        </thead>
        <tbody>
          <tr align="center" bgcolor="#E6E6E6">
            <td><font size="2"><b>{{$peso[0]->peso_corporal}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->peso_bursa}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->peso_brazo}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->peso_timo}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->peso_higado}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->indice_bursal}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->indice_timico}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->indice_hepatico}}</b></font></td>
            <td><font size="2"><b>{{$peso[0]->bursometro}}</b></font></td>
          </tr>
          <tr align="center" bgcolor="#E6E6E6">
            <td><font size="2"><b>{{$peso[1]->peso_corporal}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->peso_bursa}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->peso_brazo}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->peso_timo}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->peso_higado}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->indice_bursal}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->indice_timico}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->indice_hepatico}}</b></font></td>
            <td><font size="2"><b>{{$peso[1]->bursometro}}</b></font></td>
          </tr>
          <tr align="center" bgcolor="#E6E6E6">
            <td><font size="2"><b>{{$peso[2]->peso_corporal}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->peso_bursa}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->peso_brazo}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->peso_timo}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->peso_higado}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->indice_bursal}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->indice_timico}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->indice_hepatico}}</b></font></td>
            <td><font size="2"><b>{{$peso[2]->bursometro}}</b></font></td>
          </tr>
          <tr align="center" bgcolor="#E6E6E6">
            <td><font size="2"><b>{{$peso[3]->peso_corporal}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->peso_bursa}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->peso_brazo}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->peso_timo}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->peso_higado}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->indice_bursal}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->indice_timico}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->indice_hepatico}}</b></font></td>
            <td><font size="2"><b>{{$peso[3]->bursometro}}</b></font></td>
          </tr>    
          <tr align="center" bgcolor="#E6E6E6">
            <td><font size="2"><b>{{$peso[4]->peso_corporal}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->peso_bursa}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->peso_brazo}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->peso_timo}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->peso_higado}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->indice_bursal}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->indice_timico}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->indice_hepatico}}</b></font></td>
            <td><font size="2"><b>{{$peso[4]->bursometro}}</b></font></td>
          </tr>
          <tr align="center" bgcolor="#15BC44">
            <td><font size="2"><b>{{$peso[5]->peso_corporal}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->peso_bursa}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->peso_brazo}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->peso_timo}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->peso_higado}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->indice_bursal}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->indice_timico}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->indice_hepatico}}</b></font></td>
            <td><font size="2"><b>{{$peso[5]->bursometro}}</b></font></td>
          </tr>                               
        </tbody>
      </table>  <br> 



<!--DESDE AQUI EMPIEZA LO DE LAS TABLAS-->

<table width="100%">
  <TBODY>
    <TR>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>1.-Pico(aftas)</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Comisura:<td align="center"> <font size="2"><b>{{$puntuacion[0]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Paladar Duro:<td align="center"> <font size="2"><b>{{$puntuacion[1]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Paladar Blando:<td align="center"> <font size="2"><b>{{$puntuacion[2]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Necrosis de la punta de la lengua:<td align="center"> <font size="2"><b>{{$puntuacion[3]->estado}}</b></font></td></tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>2.-Petequias</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Pechuga:<td align="center"> <font size="2"><b>{{$puntuacion[4]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Pierna:<td align="center"> <font size="2"><b>{{$puntuacion[5]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Esternón:<td align="center"> <font size="2"><b>{{$puntuacion[6]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>3.- Tarsos</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Frágil:<td align="center"> <font size="2"><b>{{$puntuacion[7]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Flexible:<td align="center"> <font size="2"><b>{{$puntuacion[8]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Duro:<td align="center"> <font size="2"><b>{{$puntuacion[9]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
    </TR>
  </TBODY>
</TABLE><br>


<table width="100%">
  <TBODY>
    <TR>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>4. Relación Morfométrica Bursa / Bazo:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>A favor de la Bursa:<td align="center"> <font size="2"><b>{{$puntuacion[10]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>A favor del Bazo:<td align="center"> <font size="2"><b>{{$puntuacion[11]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Relación 1 / 1:<td align="center"> <font size="2"><b>{{$puntuacion[12]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>5. Apariencia de los pliegues internos de la bursa:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[13]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Anormal:<td align="center"> <font size="2"><b>{{$puntuacion[14]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>6. Tamaño y apariencia del Timo:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[15]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Anormal:<td align="center"> <font size="2"><b>{{$puntuacion[16]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
    </TR>
  </TBODY>
</TABLE> <br>

<table width="100%">
  <TBODY>
    <TR>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>7. Sacos aéreos:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normales:<td align="center"> <font size="2"><b>{{$puntuacion[17]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Aerosaculitis Abdominal:<td align="center"> <font size="2"><b>{{$puntuacion[18]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Aerosaculitis Torácica:<td align="center"> <font size="2"><b>{{$puntuacion[19]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>8. Tráquea:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[20]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Congestionada:<td align="center"> <font size="2"><b>{{$puntuacion[21]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Hemorrágica:<td align="center"> <font size="2"><b>{{$puntuacion[22]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Con mucosidad:<td align="center"> <font size="2"><b>{{$puntuacion[23]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>9. Cornetes Nasales:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[24]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Congestionado:<td align="center"> <font size="2"><b>{{$puntuacion[25]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
    </TR>
  </TBODY>
</TABLE> <br>

<table width="100%">
  <TBODY>
    <TR>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>10. Hígados:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[26]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Inflamado:<td align="center"> <font size="2"><b>{{$puntuacion[27]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Pálido y friable:<td align="center"> <font size="2"><b>{{$puntuacion[28]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Moteado:<td align="center"> <font size="2"><b>{{$puntuacion[29]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Punto de exudado::<td align="center"> <font size="2"><b>{{$puntuacion[30]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>11.Vesicula Biliar:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Llena:<td align="center"> <font size="2"><b>{{$puntuacion[31]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Vacía:<td align="center"> <font size="2"><b>{{$puntuacion[32]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>12. Proventrículo:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[33]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Proventriculitis:<td align="center"> <font size="2"><b>{{$puntuacion[34]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
    </TR>
  </TBODY>
</TABLE> <br>

<table width="100%">
  <TBODY>
    <TR>
      <TD>
        <table width="100%">
          <thead> 
            <tr bgcolor="#FAFAFA"> <td colspan="2"><b>13. Ulceración de Mollejas:</b></td> </tr> 
            <tr bgcolor="#FAFAFA"> <td><b>Grado:</b></td> <td><b>Cantidad:</b></td></tr> 
          </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>0:<td align="center"> <font size="2"><b>{{$puntuacion[35]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>1:<td align="center"> <font size="2"><b>{{$puntuacion[36]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>2:<td align="center"> <font size="2"><b>{{$puntuacion[37]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>3:<td align="center"> <font size="2"><b>{{$puntuacion[38]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>14. Intestinos:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[39]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Enteritis (yeyuno):<td align="center"> <font size="2"><b>{{$puntuacion[40]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Equimosis:<td align="center"> <font size="2"><b>{{$puntuacion[41]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Desp. Mucosa:<td align="center"> <font size="2"><b>{{$puntuacion[42]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Enteritis mucoide:<td align="center"> <font size="2"><b>{{$puntuacion[43]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Transito Rápido:<td align="center"> <font size="2"><b>{{$puntuacion[44]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Gas / espuma:<td align="center"> <font size="2"><b>{{$puntuacion[45]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>15.- Coccidia:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Acervulina:<td align="center"> <font size="2"><b>{{$puntuacion[46]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Máxima:<td align="center"> <font size="2"><b>{{$puntuacion[47]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Tenella:<td align="center"> <font size="2"><b>{{$puntuacion[48]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Necratix:<td align="center"> <font size="2"><b>{{$puntuacion[49]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
    </TR>
  </TBODY>
</TABLE> <br>


<table width="100%">
  <TBODY>
    <TR>
      <TD>
        <table width="100%">
          <thead> 
            <tr bgcolor="#FAFAFA"> <td colspan="2"><b>16. Ciegos ( Contenido)</b></td> </tr> 
          </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Normal:<td align="center"> <font size="2"><b>{{$puntuacion[50]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Tiflitis Erosiva:<td align="center"> <font size="2"><b>{{$puntuacion[51]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Placas diftéricas:<td align="center"> <font size="2"><b>{{$puntuacion[52]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Gaseosos (cont):<td align="center"> <font size="2"><b>{{$puntuacion[53]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Liquido (cont.):<td align="center"> <font size="2"><b>{{$puntuacion[54]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Sangre (cont.):<td align="center"> <font size="2"><b>{{$puntuacion[55]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>17. Tonsilas Ileocecales:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Reactiva:<td align="center"> <font size="2"><b>{{$puntuacion[56]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>No Reactiva:<td align="center"> <font size="2"><b>{{$puntuacion[57]->estado}}</b></font></td> </tr>
          </tbody>
        </table>  <br>

        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>18. Placas de peyer:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Reactiva:<td align="center"> <font size="2"><b>{{$puntuacion[58]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>No Reactiva:<td align="center"> <font size="2"><b>{{$puntuacion[59]->estado}}</b></font></td> </tr>
          </tbody>
        </table> 

      </TD>
      <TD>
        <table width="100%">
          <thead> <tr bgcolor="#FAFAFA"> <td colspan="2"><b>19. Necrosis cabeza de fémur:</b></td> </tr> </thead>
          <tbody>
            <tr bgcolor="#E6E6E6"> <td>Presencia:<td align="center"> <font size="2"><b>{{$puntuacion[60]->estado}}</b></font></td> </tr>
            <tr bgcolor="#E6E6E6"> <td>Ausencia:<td align="center"> <font size="2"><b>{{$puntuacion[61]->estado}}</b></font></td> </tr>
          </tbody>
        </table>         
      </TD>
    </TR>
  </TBODY>
</TABLE> <br>


<table>
  <tr><td>
      <b>{!!Form::label('referencia','Referencia:')!!}</b> <br>
      <font size="3">{{$sistema_integral[0]->referencia}}</font>  <br> <br>  
  </td></tr>
  <tr><td>
      <b>{!!Form::label('observaciones','Observaciones:')!!}</b> <br>
      <font size="3">{{$sistema_integral[0]->observaciones}}</font>  <br><br>
  </td></tr>
  <tr><td>
      <b>{!!Form::label('comentarios','Comentarios:')!!}</b> <br>
      <font size="3">{{$sistema_integral[0]->comentarios}}</font>   <br> <br>  
  </td></tr>    
</table>



<h4>Imagenes:</h4>

<table>
  <tr>
    <td>
    <?php  if ($sistema_integral[0]->imagen1 != "") { ?>      
      <?php $ruta_imagen1="invetsawebservice/".$sistema_integral[0]->imagen1; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen1)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>

    <td>
    <?php  if ($sistema_integral[0]->imagen2 != "") { ?>      
      <?php $ruta_imagen2="invetsawebservice/".$sistema_integral[0]->imagen2; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen2)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>

    <td>
    <?php  if ($sistema_integral[0]->imagen3 != "") { ?>      
      <?php $ruta_imagen3="invetsawebservice/".$sistema_integral[0]->imagen3; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen3)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>    
  </tr>

  <tr>
    <td>
    <?php  if ($sistema_integral[0]->imagen4 != "") { ?>      
      <?php $ruta_imagen4="invetsawebservice/".$sistema_integral[0]->imagen4; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen4)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>

    <td>
    <?php  if ($sistema_integral[0]->imagen5 != "") { ?>      
      <?php $ruta_imagen5="invetsawebservice/".$sistema_integral[0]->imagen5; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen5)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>
<?php /*
    <td>
    <?php  if ($sistema_integral[0]->imagen6 != "") { ?>      
      <?php $ruta_imagen6="invetsawebservice/".$sistema_integral[0]->imagen6; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen6)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>    
  </tr>

  <tr>
    <td>
    <?php  if ($sistema_integral[0]->imagen7 != "") { ?>      
      <?php $ruta_imagen7="invetsawebservice/".$sistema_integral[0]->imagen7; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen7)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>

    <td>
    <?php  if ($sistema_integral[0]->imagen8 != "") { ?>      
      <?php $ruta_imagen8="invetsawebservice/".$sistema_integral[0]->imagen8; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen8)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>

    <td>
    <?php  if ($sistema_integral[0]->imagen9 != "") { ?>      
      <?php $ruta_imagen9="invetsawebservice/".$sistema_integral[0]->imagen9; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen9)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td>    
  </tr>

  <tr>
    <td>
    <?php  if ($sistema_integral[0]->imagen10 != "") { ?>      
      <?php $ruta_imagen10="invetsawebservice/".$sistema_integral[0]->imagen10; ?>
      <center><img src="data:image/jpeg;base64,{{file_get_contents($ruta_imagen10)}}" width="250px" height="200px"></center>
    <?php } ?>     
    </td> */ ?>
  </tr>  
</table> <br> <br>


  <?php if ($sistema_integral[0]->imagen_jefe != "" ||  $sistema_integral[0]->firma_invetsa != "" && $sistema_integral[0]->firma_empresa != ""): ?>
  <table align="center">
    <tr>
      <td>
        {!!Form::label('imagen_jefe','Imagen Del Responsable:')!!} <br>
        <?php $ruta_foto_jefe="invetsawebservice/".$sistema_integral[0]->imagen_jefe; ?>
        <img src="data:image/jpeg;base64,{{file_get_contents($ruta_foto_jefe)}}" width="250px" height="200px">     
      </td>
    </tr>
  </table><br>


  <table align="center">
    <tr>
      <td>
        {!!Form::label('firma_empresa','Firma del Responsable:')!!} <br>
        <?php $ruta_firma_empresa="invetsawebservice/".$sistema_integral[0]->firma_empresa; ?>
        <img src="data:image/jpeg;base64,{{file_get_contents($ruta_firma_empresa)}}" width="250px" height="200px">      
      </td>

      <td>
        {!!Form::label('firma_invetsa','Firma de Invetsa:')!!} <br>
        <?php $ruta_firma_invetsa="invetsawebservice/".$sistema_integral[0]->firma_invetsa; ?>
        <img src="data:image/jpeg;base64,{{file_get_contents($ruta_firma_invetsa)}}" width="250px" height="200px">     
      </td>      
    </tr>
  </table>

  <?php endif ?>


</body>
</html>



