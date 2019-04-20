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
        border: 0px solid black; 
      
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
                    @if(isset($dataLapRedis))                                              
                      <center>
                          <u><font size="14">LAPORAN REKAM MEDIS<br></u>
                          </font>  
                          <h7>&nbsp;</h7>        
                       </center>
                                                
                            <table >
                                <tbody>
                                <tr>                                  
                                  <td>Tanggal </td>                                  
                                  <td><span class="badge bg-white">:  {{date('d - m - Y', strtotime($dateAwal))}} Sampai {{date('d - m - Y', strtotime($dateAkhir))}} </span></td>
                                </tr>
                                <tr>
                                  <td>Unit Pelayanan</td>                                  
                                  <td><span class="badge bg-light-white">: Pengolahan Data Rekam Medis</span></td>
                                </tr>                                                                                 
                              </tbody>
                            </table>                                                                
                    @endif
                    <br>
                    <table >
                    <thead>
                      <tr>
                        <th>No.</th>          
                        <th>No.Rekam Medis</th>            
                        <th>Kode Pasien</th> 
                        <th>Nama Pasien</th>                                 
                        <th>Tangal Lahir</th>                                          
                        <th>Keluhan</th>                        
                        <th>Pemeriksaan Fisik</th>
                        <th>Diagnosa</th>
                        <th>Theraphy</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (! empty($dataLapRedis))
                     <?php $i=1;foreach ($dataLapRedis as $itemLaporan):  ?>
                      <tr>
                        

                        <td align="center">{{$i}}</td>
                        <td align="center">{{$itemLaporan->no_redis}}</td>
                        <td align="center">{{$itemLaporan->kode_pasien}}</td>
                        <td align="center">{{$itemLaporan->nama_pasien}}</td>
                        <td align="center">{{date('d - m - Y', strtotime($itemLaporan->tgl_lahir))}}</td> 
                        
                        <td align="center">{{$itemLaporan->keluhan}}</td>
                        <td align="center">{{$itemLaporan->pmrk_fisik}}</td>
                        <td align="center">{{$itemLaporan->diagnosa}}</td>
                        <td align="center">{{$itemLaporan->therapy}}</td>
                        <td align="center">{{date('d - m - Y', strtotime($itemLaporan->created_at))}}</td>
                      </tr>
                      <?php $i++; endforeach  ?>
                    @endif 
                    </tbody>                  
                  </table>
                  <br>                  
                  <table border="0" width="100%">                    
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
                      <td align="center"><br><br><br>Pimpinan</u></td>                             
                    </tr>            
                  </table>

    </div>

  </body>

</html>