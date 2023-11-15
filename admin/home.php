
<style>

:root {
	--dk-gray-100: #F3F4F6;
	--dk-gray-200: #E5E7EB;
	--dk-gray-300: #D1D5DB;
	--dk-gray-400: #9CA3AF;
	--dk-gray-500: #6B7280;
	--dk-gray-600: #4B5563;
	--dk-gray-700: #374151;
	--dk-gray-800: #1F2937;
	--dk-gray-900: #111827;
	--dk-dark-bg: #313348;
	--dk-darker-bg: #2a2b3d;
	--navbar-bg-color: #6f6486;
	--sidebar-bg-color: #252636;
	--sidebar-width: 250px;
}





/** --------------------------------
 -- welcome
-------------------------------- */
.welcome {
	color: var(--dk-gray-300);
}

.welcome .content {
	background-color: var(--dk-dark-bg);
}

.welcome p {
	color: var(--dk-gray-400);
}




/** --------------------------------
 -- Statistics
-------------------------------- */
.statistics {
	color: var(--dk-gray-200);
}

.statistics .box {
	background-color: var(--dk-dark-bg);
}

.statistics .box i {
	width: 60px;
	height: 60px;
	line-height: 60px;
}

.statistics .box p {
	color: var(--dk-gray-400);
}







/** --------------------------------
 -- users
-------------------------------- */
.admins .box .admin {
	background-color: var(--dk-dark-bg);
}

.admins .box h3 {
	color: var(--dk-gray-300);
}

.admins .box p {
	color: var(--dk-gray-400)
}




/** --------------------------------
 -- statis
-------------------------------- */
.statis {
	color: var(--dk-gray-100);
}

.statis .box {
	position: relative;
	overflow: hidden;
	border-radius: 3px;
}

.statis .box h3:after {
	content: "";
	height: 2px;
	width: 70%;
	margin: auto;
	background-color: rgba(255, 255, 255, 0.12);
	display: block;
	margin-top: 10px;
}

.statis .box i {
	position: absolute;
	height: 70px;
	width: 70px;
	font-size: 22px;
	padding: 15px;
	top: -25px;
	left: -25px;
	background-color: rgba(255, 255, 255, 0.15);
	line-height: 60px;
	text-align: right;
	border-radius: 50%;
}
/** --------------------------------
 -- Charts
-------------------------------- */
.charts .chart-container {
	background-color: var(--dk-dark-bg);
}

.charts .chart-container h3 {
	color: var(--dk-gray-400)
}

</style>
<div class="container">
  <?php 
// Truy vấn MySQL để lấy số đơn hàng mỗi tháng
    $sql = "SELECT MONTH(date_created) as month, YEAR(date_created) as year, COUNT(*) as order_count FROM orders GROUP BY YEAR(date_created), MONTH(date_created) ORDER BY YEAR(date_created), MONTH(date_created)";
    $result = $conn->query($sql);

    $dataPoints = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $timestamp = strtotime($row["year"] . '-' . $row["month"] . '-01');
            $dataPoints[] = array("x" => $timestamp * 1000, "y" => $row["order_count"]);
        }
    }

    $products = $conn->query("SELECT * FROM `products`")->num_rows;
    $orders = $conn->query("SELECT * FROM `orders`")->num_rows;
    $clients = $conn->query("SELECT * FROM `clients`")->num_rows;
    $users = $conn->query("SELECT * FROM `users`")->num_rows;

    $o1 = $conn->query("SELECT * FROM `orders` WHERE STATUS = '0'")->num_rows;
    $o2 = $conn->query("SELECT * FROM `orders` WHERE STATUS = '1'")->num_rows;
    $o3 = $conn->query("SELECT * FROM `orders` WHERE STATUS = '2'")->num_rows;
    $o4 = $conn->query("SELECT * FROM `orders` WHERE STATUS = '3'")->num_rows;
  ?>
  <div class="welcome">
      <div class="content rounded-3 p-3">
        <h2 class="fs-2"> <?php echo $_settings->info('name') ?></h2>

        <p class="mb-0">Xin chào <?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?>, chào mừng bạn đến với bảng điều khiển tuyệt vời của bạn!</p>
      </div>
    </div>
   <section class="statistics mt-4">
    
      <div class="row">
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-envelope-shield text-center bg-primary rounded-circle"><i class="fa fa-cube fa-2x" aria-hidden="true"></i></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0 px-2"><?php echo $products?></h3> <span class="d-block ms-2 px-2">Sản phẩm</span>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-file fs-2 text-center bg-danger rounded-circle"><i class="fa fa-user fa-2x" aria-hidden="true"></i> </i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
              <h3 class="mb-0 px-2"><?php echo $clients?></h3> <span class="d-block ms-2 px-2">Người dùng</span>

              </div>
            
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center p-3">
            <i class="uil-users-alt fs-2 text-center bg-warning rounded-circle "><i class="fa fa-shopping-bag fa-2x" aria-hidden="true"></i></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
              <h3 class="mb-0 px-2"><?php echo $orders?></h3> <span class="d-block ms-2 px-2">Đơn hàng</span>

              </div>
            
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center p-3">
            <i class="uil-users-alt fs-2 text-center bg-success rounded-circle"><i class="fa fa-address-card fa-2x" aria-hidden="true"></i></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
              <h3 class="mb-0 px-2"><?php echo $users?></h3> <span class="d-block ms-2 px-2">Nhân viên</span>

              </div>
         
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="statis mt-4 text-center">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-primary p-3">
          <i class="fas fa-hourglass-start"></i>
            <h3><?php echo $o1?> Đơn hàng</h3>
            <p class="lead">Chờ xác nhận</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-danger p-3">
            <i class="fas fa-clock"></i>
            <h3><?php echo $o2?> Đơn hàng</h3>
            <p class="lead">Chuẩn bị đơn hàng</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <div class="box bg-warning p-3">
      <i class="fas fa-truck"></i>
            <h3><?php echo $o3?> Đơn hàng</h3>
            <p class="lead">Đang giao hàng</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box bg-success p-3">
          <i class="fas fa-box-open"></i>
            <h3><?php echo $o4?> Đơn hàng</h3>
            <p class="lead">Đã giao hàng</p>
          </div>
        </div>
      </div>
    </section>
    <section class="charts mt-4">
      <div class="chart-container p-3">
        
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
      </div>
    </section>
  
</div>

<script>
window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                backgroundColor: "transparent",

                title:{
                    text: "SỐ LƯỢNG ĐƠN HÀNG MỖI THÁNG",
                    fontFamily:"tahoma",
                    fontColor: "white"
                },
                axisY: {
                    title: "Số lượng đơn đặt hàng",
                    valueFormatString: "#0",
                    suffix: "",
                    titleFontColor: "white",
                  labelFontColor: "white"

                },
                axisX: {
                  valueFormatString: "MM-YYYY",
                  titleFontColor: "white",
                  labelFontColor: "white"
                },
                data: [{
                  lineTension: 0.2,
                  lineColor: '#5cb85c',
                 color: "black",
                    type: "spline",
                    markerSize: 5,
                    xValueFormatString: "MM YYYY",
                    yValueFormatString: "#,##0",
                    xValueType: "dateTime",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });

            chart.render();
        }
</script>
