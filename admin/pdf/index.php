
<?php 
  require_once('../../config.php');
  require_once('TCPDF/tcpdf.php');
  require_once('readNumber.php');

 
  $order = $conn->query("SELECT o.*,concat(c.firstname,' ',c.lastname) as client,c.contact as contact, c.email as email FROM `orders` o inner join clients c on c.id = o.client_id where o.id = '{$_GET['id']}' ");

  if($order->num_rows > 0){
    foreach($order->fetch_assoc() as $k => $v){
        $$k = $v;
    }
  }
  
  $olist = $conn->query("SELECT o.*,p.product_name FROM order_list o inner join products p on o.product_id = p.id where o.order_id = '{$id}' ");
  if ($olist->num_rows > 0) {
      $products_info = array();
      while ($row = $olist->fetch_assoc()) {
          $products_info[] = array(
              "name" => $row["product_name"],
              "price" => number_format($row['price'])  . " vnđ",
              "qty" => $row["quantity"],
              "total" => number_format($row['price'] * $row['quantity']) . " vnđ",
             
          );
      }
  } else {
      echo "Không có dữ liệu";
  }

$info = [
    "customer" => $client,
    "address" => $delivery_address,
    "contact" => $contact ,
    "invoice_no" => $id,
    "invoice_date" => date("d-m-Y",strtotime($data_created)) ,
    "total_amt" => number_format($amount) . " vnđ",
    "words" =>  readNumber($amount),
];

// Invoice Products


class MYPDF extends TCPDF
{
    function Header()
    {
       
        // Display Company Info
        $this->SetX(10);
        $this->SetFont('dejavusans', 'B', 14);
        $this->Cell(50, 10,"Shop Pet", 0, 1);
        $this->SetFont('dejavusans', '', 10);
        $this->SetX(10);
        $this->Cell(50, 7, "Của hàng thú cưng và phụ kiện", 0, 1);
        $this->SetX(10);
        $this->Cell(50, 7, "Địa chỉ : P1 Tp. Vĩnh Long", 0, 1);
        $this->SetX(10);
        $this->Cell(50, 7, "SĐT : 0912312345", 0, 1);

        // Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('dejavusans', 'B', 18);
        $this->Cell(50, 10, "Hóa đơn", 0, 1);

        // Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }

    function body($info, $products_info)
    {
        // Billing Details
        $this->SetY(55);
        $this->SetX(10);
        $this->SetFont('dejavusans', 'B', 12);
        $this->Cell(50, 10, "Thông tin hóa đơn: ", 0, 1);
        $this->SetFont('dejavusans', '', 12);
        $this->SetX(10);
        $this->Cell(50, 7, "Họ tên: " . $info["customer"], 0, 1);
        $this->SetX(10);
        $this->Cell(50, 7, "Địa chỉ: " . $info["address"], 0, 1);
        $this->SetX(10);
        $this->Cell(50, 7,"Số điện thoại: ". $info["contact"], 0, 1);

        // Display Hóa đơn no
        $this->SetY(55);
        $this->SetX(-60);
        $this->Cell(50, 7,  $info["invoice_no"].": Id hóa đơn" ,'','',"R");

        // Display Invoice date
        $this->SetY(63);
        $this->SetX(-58);
        $this->Cell(50, 7,  $info["invoice_date"].": Ngày ",'','',"R");

        // Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('dejavusans', 'B', 12);
        $this->Cell(80, 9, "Tên sản phẩmm", 1, 0);
        $this->Cell(40, 9, "Giá", 1, 0, "C");
        $this->Cell(30, 9, "Số lượng", 1, 0, "C");
        $this->Cell(40, 9, "Tổng cộng", 1, 1, "C");
        $this->SetFont('dejavusans', '', 12);

        // Display table product rows
      
        foreach ($products_info as $row) {
            $this->SetX(10);
            $this->Cell(80, 9, $row["name"], "LR", 0);
            $this->Cell(40, 9, $row["price"], "R", 0, "R");
            $this->Cell(30, 9, $row["qty"], "R", 0, "C");
            $this->Cell(40, 9, $row["total"], "R", 1, "R");
        }

        // Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->SetX(10);
            $this->Cell(80, 9, "", "LR", 0);
            $this->Cell(40, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 1, "R");
        }

        // Display table total row
        $this->SetX(10);
        $this->SetFont('dejavusans', 'B', 12);
        $this->Cell(150, 9, "Tổng cộng", 1, 0, "R");
        $this->Cell(40, 9, $info["total_amt"], 1, 1, "R");

        // Display amount in words
        $this->SetY(225);
        $this->SetX(10);
        $this->SetFont('dejavusans', 'B', 12);
        $this->Cell(0, 9, "Tiền bằng chữ ", 0, 1);
        $this->SetFont('dejavusans', '', 12);
        $this->Cell(0, 9, $info["words"], 0, 1);
    }

    function Footer()
    {
        // Set footer position
        $this->SetY(-50);
        $this->SetFont('dejavusans', 'B', 12);
        $this->Cell(0, 10, "Shop Pet", 0, 1, "R");
        $this->Ln(15);
        $this->SetFont('dejavusans', '', 12);
        $this->Cell(0, 10, "Admin", 0, 1, "R");
        $this->SetFont('dejavusans', '', 10);

        // Display Footer Text
        $this->Cell(0, 10, "Mọi thắc mắc xin liên hệ", 0, 1, "C");
    }
}
define ('PDF_PAGE_FORMAT', 'LETTER');
// Create A4 Page with Portrait
$pdf =  new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

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
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();
$pdf->body($info, $products_info);



// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('hoadonID'.$id.'.pdf', 'I');
?>