<?php
include "conn.php";
include_once("fpdf/fpdf.php");

// Invoice date 
$id = $_GET['invoice_id'];
$sql = "SELECT *  FROM invoice WHERE invoice_no=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Invoice Detail data 
// $sql2 = "SELECT *  FROM invoice_details WHERE invoice_no=$id";
// $result2 = mysqli_query($conn, $sql2);
// $row2 = fetchAll($result2);

    $pdf = new FPDF();
	$pdf->AddPage();

    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,10,"Tax Invoice",0,1,"C");
    // $pdf->Cell(190,10,"XYZ Pvt. Ltd.",0,1,"C");
    $pdf->SetFont("Arial",null,12);

    $pdf->Cell(192,10,"M H Consultants",1,1,"C");
    $pdf->Cell(192,10,"Near Bela Mode Rahua, Mushari, Muzaffarpur Bihar 842002",1,1,"C");
    $pdf->Cell(192,10,"(www.mhariconsult.in), Mob: 8383930805, Email ID: mhaiconsult2020@gmail.com",1,1,"C");
    $pdf->Cell(95,10,"BILL TO",1,0);
    $pdf->Cell(97,10,"         DATE:  ".$row["order_date"],1,1);
    $pdf->Cell(95,10,"Customer Name:  ".$row["customer_name"],1,0);
    $pdf->Cell(97,10,"         INVOICE:  ".$row["invoice_no"],1,1);
    $pdf->Cell(95,10,"CIN/GSTIN/LLPIN:  " .$row["gst_no"] ,1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(95,10,$row["address"],1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(95,10,"MOBILE NO.:  "."+91 " .$row["phone"] ,1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(95,10,"EMAIL ID:  " .$row["email"],1,0);
    $pdf->Cell(97,10,"",1,0);
    $pdf->Cell(95,10,"",0,1);


    $pdf->Cell(12,5,"S.No.",1,0,"C");
	$pdf->Cell(47,5,"Item Name",1,0,"C");
    $pdf->Cell(14,5,"HSN",1,0,"C");
    $pdf->Cell(11,5,"Qty",1,0,"C");
	$pdf->Cell(19,5,"Amount",1,0,"C");
	$pdf->Cell(13,5,"SGST",1,0,"C");
	$pdf->Cell(12,5,"Value",1,0,"C");
    $pdf->Cell(13,5,"CGST",1,0,"C");
    $pdf->Cell(12,5,"Value",1,0,"C");
    $pdf->Cell(13,5,"IGST",1,0,"C");
    $pdf->Cell(12,5,"Value",1,0,"C");
    $pdf->Cell(14,5,"Total",1,1,"C");


   
    include('database_connection.php');

    

    $statement = $connect->prepare(
        "SELECT * FROM invoice_details 
        WHERE invoice_no = :invoice_no"
       );
       $statement->execute(
        array(
         ':invoice_no'       =>  $_GET['invoice_id']
        )
       );
       $item_result = $statement->fetchAll();
       $count = 0;
       foreach($item_result as $sub_row)
       {
        $count++;
		$pdf->Cell(12,5, ($count) ,1,0,"C");
		$pdf->Cell(47,5,$sub_row["product_name"],1,0,"C");
        $pdf->Cell(14,5, $sub_row["hsn"],1,0,"C");
        $pdf->Cell(11,5, $sub_row["qty"],1,0,"C");
		$pdf->Cell(19,5, $sub_row["amount"],1,0,"C");
		$pdf->Cell(13,5, $sub_row["sgst"]."%",1,0,"C");
        $pdf->Cell(12,5, $sub_row["v_sgst"],1,0,"C");
        $pdf->Cell(13,5, $sub_row["cgst"]."%",1,0,"C");
        $pdf->Cell(12,5, $sub_row["v_cgst"],1,0,"C");
        $pdf->Cell(13,5, $sub_row["igst"]."%",1,0,"C");
        $pdf->Cell(12,5, $sub_row["v_igst"],1,0,"C");
		$pdf->Cell(14,5,(round(($sub_row["amount"] +  $sub_row["v_sgst"] + $sub_row["v_cgst"]  + $sub_row["v_igst"]))) ,1,1,"C");
	}


    
    $pdf->Cell(95,10,"Payment Details:  ",1,0);
    $pdf->Cell(97,10,"      Total Amount:  ".(round ($row["net_total"])),1,1);
    $pdf->Cell(95,10,"PAN:  PQXYZ5626G",1,0);
    $pdf->Cell(97,10,"      Discount:  ".$row["discount"],1,1);
    $pdf->Cell(95,10,"Account Type:  Current",1,0);
    $pdf->Cell(97,10,"      Net Amount:  ".($row["net_total"] - $row["discount"]),1,1);
    $pdf->Cell(95,10,"Name:  M H Consultats",1,0);
    $pdf->Cell(97,10,"      Paid:  ".$row["paid"],1,1);
    $pdf->Cell(95,10,"IFSC Code:  BOINOxxxxx",1,0);
    $pdf->Cell(97,10,"      Due:  ".(round ($row["due"])),1,1);
    $pdf->Cell(95,10,"A/C NO.:  xxxxxxxxxxxxxx",1,0);
    $pdf->Cell(97,10,"      Payment Methode:  ".$row["payment_type"],1,1);
    $pdf->Cell(95,10,"Phone Pay/ Google Pay:  xxxxxxxxxx",1,0);
    $pdf->Cell(97,10,"",1,1);
    $pdf->Cell(192,12,"       Signature:  _________________________",1,1,"C");
    $pdf->Cell(192,5,"If you have any question about this invoice, please contact",1,1,"C");
    $pdf->Cell(192,5,"Thank You For Your Business!",1,0,"C");



    $pdf->Output();	


?>