<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
  {font-family:"Cambria Math";
  panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
  {font-family:Calibri;
  panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
  {font-family:"Adobe Devanagari";
  panose-1:0 0 0 0 0 0 0 0 0 0;}
@font-face
  {font-family:"Bernard MT Condensed";
  panose-1:2 5 8 6 6 9 5 2 4 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
  {margin-top:0cm;
  margin-right:0cm;
  margin-bottom:8.0pt;
  margin-left:0cm;
  line-height:107%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
  {margin-top:0cm;
  margin-right:0cm;
  margin-bottom:8.0pt;
  margin-left:36.0pt;
  line-height:107%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
  {margin-top:0cm;
  margin-right:0cm;
  margin-bottom:0cm;
  margin-left:36.0pt;
  margin-bottom:.0001pt;
  line-height:107%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
  {margin-top:0cm;
  margin-right:0cm;
  margin-bottom:0cm;
  margin-left:36.0pt;
  margin-bottom:.0001pt;
  line-height:107%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
  {margin-top:0cm;
  margin-right:0cm;
  margin-bottom:8.0pt;
  margin-left:36.0pt;
  line-height:107%;
  font-size:11.0pt;
  font-family:"Calibri","sans-serif";}
.MsoChpDefault
  {font-family:"Calibri","sans-serif";}
.MsoPapDefault
  {margin-bottom:8.0pt;
  line-height:107%;}
@page WordSection1
  {size:595.3pt 841.9pt;
  margin:72.0pt 42.45pt 72.0pt 42.55pt;}
div.WordSection1
  {page:WordSection1;}
 /* List Definitions */
 ol
  {margin-bottom:0cm;}
ul
  {margin-bottom:0cm;}
-->

</style>
<style type="text/css">
    table{
      width: 100%;
    }
    table, th, td {
       /* border: 1px solid black; 
       $datetime1 = $itemLaporan->tgl_lahir;
                        $datetime2 = date('Y-m-d');
                        $difference = date_diff( $datetime1, $datetime2 );*/
      
    }
    th, td {
        padding: 5px;
        text-align: left;
        vertical-align: middle;        
        border-bottom: 1px solid #ddd;
        font-size: 12px;
    }   
    th {
      border-top: 1px solid #ddd;
      height: 20px;
      background-color: #ddd;
      text-align : center;
    }
  </style>
</head>

<body lang=IN>

<div class=WordSection1>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;text-indent:63.8pt;line-height:normal'>
   <span style='position:relative;z-index:251659258'>
   <span style='left:0px;position: absolute;left:-80px;top:-18px;width:70px;height:95px'>
  <img width=70 height=95 src="{{asset('/img2/image002.jpg')}}" align=left hspace=12>>
  </span>
  </span>
  <b><span style='font-size:14.0pt;font-family:"Times New Roman","serif"'>PEMERINTAH KABUPATEN TANGGAMUS</span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;text-indent:70pt;line-height:normal'><b>
  <span style='font-size:14.0pt;font-family:"Times New Roman","serif"'>DINAS KESEHATAN</span></b>
</p>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;text-indent:50pt;line-height:normal'>
<span style='font-size:11.0pt;font-family:"Bernard MT Condensed","serif"'>UNIT PELAKSANA TEKNIS PUSKESMAS RAWAT INAP TALANG PADANG</span></p>

<div style='border:none;border-bottom:double windowtext 4.5pt;padding:0cm 0cm 1.0pt 0cm'>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;text-indent:40pt;line-height:normal;border:none;padding:
0cm'><span style='font-family:"Times New Roman","serif"'>Alamat : Jl. Raden Intan
telp. (0729) 41061 Talang Padang Kab. Tanggamus</span></p>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;text-indent:63.8pt;line-height:normal;border:none;padding:
0cm'><span style='font-size:1.0pt;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

</div>
  <h7>&nbsp;</h7>
                    @if(isset($dataResepPasien))  
                      @foreach($dataResepPasien as $itemResep)               
                       <center>
                          <u><font size="14">DATA RESEP PASIEN RAWAT JALAN<br></u>
                          </font>  
                          <h7>&nbsp;</h7>        
                       </center>                          
                                                                                                
                            <table width="70%" align="center">
                                <tbody>
                                <tr>                                  
                                  <td>Kode Pasien </td>                                  
                                  <td><span class="badge bg-white">:   {{$itemResep->kode_pasien}}</span></td>
                                <!-- </tr>
                                  <tr>  -->                                 
                                  <td>Nomor Rekam Medis </td>                                  
                                  <td><span class="badge bg-white">: {{$itemResep->no_redis}}  </span></td>
                                </tr>
                                <tr> 
                                  <td>Nama Pasien </td>                                  
                                  <td><span class="badge bg-white">:   {{$itemResep->nama_pasien}}</span></td>                                                                   
                                <!-- </tr>
                                <tr> -->
                                <td>Nomor Resep </td>                                  
                                  <td><span class="badge bg-white">: {{$itemResep->no_resep}}  </span></td>
                                </tr>                                                                                                
                              </tbody>
                            </table>                                                                
                       @endforeach     
                    @endif
                    <br>
                    <table width="70%" align="center">
                    <thead>
                      <tr>
                        <th>No.</th>  
                        <th>Resep</th>
                        <th>Catatan</th>                            
                        
                      </tr>
                    </thead>
                    <tbody>
                    @if (! empty($dataResepPasien))
                     <?php $i=1;foreach ($dataResepPasien as $itemResep):  ?>
                      <tr>                        
                        <td align="center">{{$i}}</td>                        
                        <td align="center">{{$itemResep->resep}}</td>
                        <td align="center">{{$itemResep->cat_kprawatan}}</td>                                               
                      </tr>
                      <?php $i++; endforeach  ?>
                    @endif 
                    </tbody>                  
                  </table>
                  <br>
                  <table width="90%" border="0" >                    
                    <tr>
                      <td width="70%" align="center"></td>
                      <td align="center"> Talang Padang, {{date('d-m-Y')}}</td>                              
                    </tr>
                    <tr height="60px">
                      <td width="70%" align="center"></td>
                      <td></td>                             
                    </tr>              
                    <tr>
                      <td width="70%" align="center"></td>
                      <td align="center"><br><br><br>Dokter</u></td>                             
                    </tr>            
                  </table>
    </div>
  </body>
</html>