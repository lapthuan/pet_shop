<?php 
$title = "Thú cưng của bạn xứng đáng điều tốt nhất";
$sub_title = "Khám phá sản phẩm của chúng tôi dành cho thú cưng của bạn.";
if(isset($_GET['c']) && isset($_GET['s'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
 $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $sub_title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
elseif(isset($_GET['c'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
}
elseif(isset($_GET['s'])){
    $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
?>
 <style>
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Điều chỉnh mức độ mờ tại đây */
    pointer-events: none; /* Cho phép các sự kiện click và hover truyền qua lớp mờ */
}
 </style>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img class=" w-100 " src="<?php echo validate_image($_settings->info('cover')) ?>" style="height: 500px" alt="First slide">
  <div class="overlay"></div>
  <div class="carousel-caption d-none d-md-block">
  <h1><?php echo $title?></h1>
    <p class="fs-4"><?php echo $sub_title?></p>
  </div>
    </div>
    <div class="carousel-item">
    <img class=" w-100 " src="./uploads/Blue.png"  style="height: 500px" alt="First slide">

    <div class="overlay"></div>
    <div class="carousel-caption d-none d-md-block">
    <h1><?php echo $title?></h1>

    <p class="fs-4"><?php echo $sub_title?></p>

  </div>
  
    </div>
    <div class="carousel-item">
    <img class=" w-100 " src="./uploads/Grey.png"  style="height: 500px" alt="First slide">
    <div class="overlay"></div>
    <div class="carousel-caption d-none d-md-block">
    <h1><?php echo $title?></h1>
    <p class="fs-4"><?php echo $sub_title?></p>

  </div>
   
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Trở về</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Tiếp tục</span>
  </a>
</div>


<!-- Section-->
<section class="py-5">
    <div class="container-fluid px-4 px-lg-5 mt-5">
    <?php 
                if(isset($_GET['search'])){
                    echo "<h4 class='text-center'><b>Tìm kết quả  '".$_GET['search']."'</b></h4>";
                }
            ?>
        
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
           
            <?php 
                $whereData = "";
                if(isset($_GET['search']))
                    $whereData = " and (product_name LIKE '%{$_GET['search']}%' or description LIKE '%{$_GET['search']}%')";
                elseif(isset($_GET['c']) && isset($_GET['s']))
                    $whereData = " and (md5(category_id) = '{$_GET['c']}' and md5(sub_category_id) = '{$_GET['s']}')";
                elseif(isset($_GET['c']))
                    $whereData = " and md5(category_id) = '{$_GET['c']}' ";
                elseif(isset($_GET['s']))
                    $whereData = " and md5(sub_category_id) = '{$_GET['s']}' ";
                $products = $conn->query("SELECT * FROM `products` where status = 1 {$whereData} order by rand() ");
                while($row = $products->fetch_assoc()):
                    $upload_path = base_app.'/uploads/product_'.$row['id'];
                    $img = "";
                    if(is_dir($upload_path)){
                        $fileO = scandir($upload_path);
                        if(isset($fileO[2]))
                            $img = "uploads/product_".$row['id']."/".$fileO[2];
                        // var_dump($fileO);
                    }
                    $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                    $inv = array();
                    while($ir = $inventory->fetch_assoc()){
                        $inv[$ir['size']] = number_format($ir['price']);
                    }
            ?>
            <div class="col mb-5">
            <div class="card h-100 product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100 " src="<?php echo validate_image($img) ?>" loading="lazy" alt="..." />
                    <!-- Product details-->
                    <div  class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder "><?php echo $row['product_name'] ?></h5>
                            <!-- Product price-->
                            <?php foreach($inv as $k=> $v): ?>
                                <span><b><?php echo $k ?>: </b><?php echo $v ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat   rounded-1"  style="background-color: #F5DEA8" href=".?p=view_product&id=<?php echo md5($row['id']) ?>">Xem chi tiết</a>
                        </div>
                        
                    </div>
                            </div>
            </div>
            <?php endwhile; ?>
            <?php 
                if($products->num_rows <= 0){
                    echo "<h4 class='text-center'><b> Không có sản phẩm nào được liệt kê.</b></h4>";
                }
            ?>
        </div>
    </div>
</section>