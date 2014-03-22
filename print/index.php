<?php	
	require_once 'tcpdf_include.php';
	
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, "List of Products", array(0,0,0), array(0,0,0));
	$pdf->setFooterData(array(0,64,0), array(0,64,128));
	
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
	
	// set font
	$pdf->SetFont('helvetica', 9);
	// add a page
	$pdf->AddPage();
	
	try
	{
		$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
	}
	catch(Exception $ex)
	{
		echo $ex->getMessage(); 
		die;
	}
	
	$html = '<html>
		<head>
		</head>
		<body>
		<table style="width: 100%; border: 2px 2px 2px 2px; border-style:dotted;">
			<tr>
				<th style="text-align: center; width: 20%; border: 2px 2px 2px 2px; padding: 10px 10px 10px 10px;">Categories</th>
				<th style="text-align: center; width: 10%; border: 2px 2px 2px 2px; padding: 5px 5px 5px 5px;">Product IDs</th>
				<th style="text-align: center; width: 20%; border: 2px 2px 2px 2px; padding: 5px 5px 5px 5px;">Product Names</th>
				<th style="text-align: center; width: 10%; border: 2px 2px 2px 2px; padding: 5px 5px 5px 5px;">Prices</th>
				<th style="text-align: center; width: 10%; border: 2px 2px 2px 2px; padding: 5px 5px 5px 5px;">Sizes</th>
				<th style="text-align: center; width: 30%; border: 2px 2px 2px 2px; padding: 5px 5px 5px 5px;">Description</th>
			</tr>';
		
		
		$query = sprintf("select * from products inner join categories on products.cat_id=categories.cat_id order by cat_name");
		$result = pg_query($query);
		
		while($row = pg_fetch_assoc($result))
		{
			$html .= '<tr>
					<td style="text-align: center; border: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;">' . $row["cat_name"] .'</td>
					<td style="text-align: center; border: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;">' . $row["prod_id"] .'</td>
					<td style="text-align: left; border: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;">' . $row["prod_name"] .'</td>
					<td style="text-align: center; border: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;">' . $row["prod_price"] .'</td>
					<td style="text-align: left; border: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;">' . $row["sizes"] .'</td>
					<td style="text-align: left; border: 2px 2px 2px 2px; padding: 2px 2px 2px 2px;">' . $row["prod_desc"] .'</td>
				 </tr>';
		}
	
	$html .='</table>
		  </body>
		  <html>';
		  
	$pdf->writeHTML($html, true, false, false, false, '');
	$pdf->Output('prod_list.pdf', 'I');
?>