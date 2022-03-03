<?php

include_once("fpdf/fpdf.php");

if ($_GET["order_date"] && $_GET["invoice_no"]){

    $pdf = new FPDF();
	$pdf->AddPage();

    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,10,"Invoice",0,1,"C");
    // $pdf->Cell(190,10,"XYZ Pvt. Ltd.",0,1,"C");
    $pdf->SetFont("Arial",null,12);

    $pdf->Cell(192,10,"M H Consultants",1,1,"C");
    $pdf->Cell(192,10,"Near Bela Mode Rahua, Mushari, Muzaffarpur Bihar 842002",1,1,"C");
    $pdf->Cell(192,10,"(www.mhariconsult.in), Mob: 8383930805, Email ID: mhaiconsult2020@gmail.com",1,1,"C");
    $pdf->Cell(95,10,"BILL TO",1,0);
    $pdf->Cell(97,10,"         DATE:  ".$_GET["order_date"],1,1);
    $pdf->Cell(95,10,"Customer Name:  ".$_GET["customer_name"],1,0);
    $pdf->Cell(97,10,"         INVOICE:  ".$_GET["invoice_no"],1,1);
    $pdf->Cell(95,10,"CIN/GSTIN/LLPIN:  " .$_GET["customer_gst"] ,1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(95,10,$_GET["customer_address"],1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(95,10,"MOBILE NO.:  "."+91 " .$_GET["customer_phone"] ,1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(95,10,"EMAIL ID:  " .$_GET["customer_email"],1,0);
    $pdf->Cell(97,10,"",1,0);
    $pdf->Cell(95,10,"",0,1);


    $pdf->Cell(12,5,"S.No.",1,0,"C");
	$pdf->Cell(50,5,"Item Name",1,0,"C");
    $pdf->Cell(11,5,"HSN",1,0,"C");
    $pdf->Cell(11,5,"Qty",1,0,"C");
	$pdf->Cell(19,5,"Amount",1,0,"C");
	$pdf->Cell(13,5,"SGST",1,0,"C");
	$pdf->Cell(12,5,"Value",1,0,"C");
    $pdf->Cell(13,5,"CGST",1,0,"C");
    $pdf->Cell(12,5,"Value",1,0,"C");
    $pdf->Cell(13,5,"IGST",1,0,"C");
    $pdf->Cell(12,5,"Value",1,0,"C");
    $pdf->Cell(14,5,"Total",1,1,"C");

    for ($i=0; $i < count($_GET["pid"]) ; $i++) { 
		$pdf->Cell(12,5, ($i+1) ,1,0,"C");
		$pdf->Cell(50,5, $_GET["pro_name"][$i],1,0,"C");
        $pdf->Cell(11,5, $_GET["hsn"][$i],1,0,"C");
        $pdf->Cell(11,5, $_GET["qty"][$i],1,0,"C");
		$pdf->Cell(19,5, $_GET["amount"][$i],1,0,"C");
		$pdf->Cell(13,5, $_GET["sgst"][$i]."%",1,0,"C");
        $pdf->Cell(12,5, $_GET["vsgst"][$i],1,0,"C");
        $pdf->Cell(13,5, $_GET["cgst"][$i]."%",1,0,"C");
        $pdf->Cell(12,5, $_GET["vcgst"][$i],1,0,"C");
        $pdf->Cell(13,5, $_GET["igst"][$i]."%",1,0,"C");
        $pdf->Cell(12,5, $_GET["vigst"][$i],1,0,"C");
		$pdf->Cell(14,5, ($_GET["amount"][$i] +  $_GET["vsgst"][$i] + $_GET["vcgst"][$i]  + $_GET["vigst"][$i]),1,1,"C");
	}
    $pdf->Cell(95,10,"Payment Details:  ",1,0);
    $pdf->Cell(97,10,"      Total Amount:  ".$_GET["tamount"],1,1);
    $pdf->Cell(95,10,"PAN:  PQXYZ5626G",1,0);
    $pdf->Cell(97,10,"      Discount:  ".$_GET["discount"],1,1);
    $pdf->Cell(95,10,"Account Type:  Current",1,0);
    $pdf->Cell(97,10,"      Net Amount:  ".$_GET["net_total"],1,1);
    $pdf->Cell(95,10,"Name:  M H Consultats",1,0);
    $pdf->Cell(97,10,"      Paid:  ".$_GET["paid"],1,1);
    $pdf->Cell(95,10,"IFSC Code:  BOINOxxxxx",1,0);
    $pdf->Cell(97,10,"      Due:  ".$_GET["due"],1,1);
    $pdf->Cell(95,10,"A/C NO.:  xxxxxxxxxxxxxx",1,0);
    $pdf->Cell(97,10,"      Payment Methode:  ".$_GET["payment_type"],1,1);
    $pdf->Cell(95,10,"Phone Pay/ Google Pay:  xxxxxxxxxx",1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(192,12,"       Signature:  _________________________",1,1,"C");
    $pdf->Cell(192,5,"If you have any question about this invoice, please contact",1,1,"C");
    $pdf->Cell(192,5,"Thank You For Your Business!",1,0,"C");


    $pdf->Output("PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");

    $pdf->Output();	
}

?>