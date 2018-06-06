<?php
$fechas = $_GET["fecha"];
$doc= "";
require_once("../tcpdf/tcpdf.php");
require_once("../bd/bd.php");
$identificador = $_GET['pdf'];
if($identificador == 1)
{
	$doc.= "<h1 align=\"center\">Reporte completo de reservaciones</h1>";
	$doc.= "<table border=\"1\" cellspacing=\"0\" cellpadding=\"3\">";
	$doc.=			"<tr style=\"background-color: rgb(132,150,176); color: white;\">";
	$doc.=				"<th><strong>Reservante</strong></th>";
	$doc.=				"<th><strong>Equipo</strong></th>";
	$doc.=				"<th><strong>Marca - Modelo</strong></th>";
	$doc.=				"<th><strong>Local</strong></th>";
	$doc.=				"<th><strong>Hora Inicial</strong></th>";
	$doc.=				"<th><strong>Hora Final</strong></th>";
	$doc.=				"<th><strong>Fecha</strong></th>";
	$doc.=				"<th><strong>Grupo</strong></th>";
	$doc.=				"<th><strong>Ciclo</strong></th>";
	$doc.=				"<th><strong>Materia</strong></th>";
	$doc.=				"<th><strong>Estado <br>Reservaciones</strong></th>";
	$doc.=			"</tr>";
	$sql="SELECT iddetalle, nombre, apellido, equipores, equipo, marcaeq, local, horai, horaf, fecha, grupo, seccion, ciclo, materia, estadores
	FROM detalle INNER JOIN equipoav ON equipoav.idequipo = detalle.equipores INNER JOIN usuario ON usuario.iduser = detalle.reservate INNER JOIN grupo on grupo.idgrupo = detalle.grupores INNER JOIN local ON local.idlocal = detalle.localres INNER JOIN materia ON materia.idmat = detalle.materiares
	 where fecha like '%$fechas%'";
	   $results=$conn->query($sql);
     $i = 0;
     while($fila=$results->fetch_assoc()){
		$idequipo = $fila["equipores"];
		$sqlE = "select idequipo, equipo, marcaeq, marca, modelo, numerodeserie from equipoav inner join marca on marca.idmarca = equipoav.idequipo where idequipo = '$idequipo'";
		$resultsE=$conn->query($sqlE);
		$filaE=$resultsE->fetch_assoc();
     	   if($i%2==0)
     	   {
     	   	 $color = "style=\"background-color: rgb(217,226,243);\"";
     	   }
     	   else
     	   {
     	   	 $color = "";
     	   }
           $doc.= "<tr>";
           $doc.= "<td $color >$fila[nombre] $fila[apellido] </td>";
           $doc.= "<td $color >$fila[equipo] </td>";
           $doc.= "<td $color >$filaE[marca] - $filaE[modelo]</td>";
           $doc.= "<td $color >$fila[local] </td>";
           $doc.= "<td $color >$fila[horai] </td>";
           $doc.= "<td $color >$fila[horaf] </td>";
           $doc.= "<td $color >$fila[fecha] </td>";
           $doc.= "<td $color >$fila[grupo] $fila[seccion] </td>";
           $doc.= "<td $color >$fila[ciclo] </td>";
           $doc.= "<td $color >$fila[materia] </td>";
           $doc.= "<td $color >$fila[estadores] </td>";
           $doc.= "</tr>";
           $i++;
         }
    $doc.="</table>";
	// create new PDF document
	class MYPDF extends TCPDF
	{
	    //Page header
	    public function Header() {
	        // Logo
	        $image_file = K_PATH_IMAGES.'logo_itca.jpg';
	        $this->Image($image_file, 60, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        // Set font
	        $this->SetFont('helvetica', 'B', 16);
	        // Title
	        $this->MultiCell(150,0,"ESCUELA ESPECIALIZADA EN INGENIERÍA<br>ITCA-FEPADE",0,"C",false,1,'','',true,0,true,true,0,'T',false);
	    }

	    // Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	        // Set font
	        $this->SetFont('helvetica', 'I', 8);
	        // Page number
	        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}

	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Escuela especializada en Ingeniería ITCA FEPADE');
	$pdf->SetTitle('Reporte de Reservaciones Completo');
	$pdf->SetSubject('Reporte de Reservaciones');
	$pdf->SetKeywords('Horario,docentes,itca');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	    require_once(dirname(__FILE__).'/lang/eng.php');
	    $pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('dejavusans', '', 8);

	// add a page
	$pdf->AddPage('L');

	// writeHTML($doc, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
	// writeHTMLCell($w, $h, $x, $y, $doc='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
	// output the HTML content
	$pdf->writeHTML($doc, true, false, true, false, '');

	//Close and output PDF document
	$pdf->Output('ReporteReservas.pdf', 'I');
}
