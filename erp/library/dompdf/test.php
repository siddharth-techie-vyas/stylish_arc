

<?php
include('autoload.inc.php');
//echo $_POST['html'];
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

if(empty($_POST['page']))
{$page='A4';}else{$page=$_POST['page'];}

if(empty($_POST['orientation']))
{$orientation='portrait';}else{$orientation=$_POST['orientation'];}


//------ html
$html  ='<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .='<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">';
$html .='<style>@font-face {  font-family:Hind-Regular;  src: url(Hind-Regular.ttf);} 
table {
				width: 100%;
				border-collapse: collapse;
                
                font-size:12px;
                vertical-align: top;
			}
			table,
			table th,
			table td {
				border: 1px solid silver;
			}
			table th,
			table td {
				text-align: left;
				padding: 2px;
			}
            h3{font-size:17px; margin:1px; display:block;}    
            h4{font-size:14px; margin:1px; display:block;}    
            h5{font-size:13px; margin:1px; display:block;}    
            h6{font-size:12px; margin:1px; display:block;}    
            </style>';
$html .='</head><body>';
$html .= $_POST['html'];
$html .='</body></html>';

$options = new Options();
$options->set('defaultFont', 'DejaVuSans');
$dompdf = new Dompdf($options);

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper($page, $orientation);

//echo $html;

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($_POST['filename']);


//---------- short code


// $dompdf = new DOMPDF();
// $dompdf->set_paper('A4', 'portrait');
// $dompdf->load_html($_POST['html']);
// $dompdf->render();
// $dompdf->stream();
?>