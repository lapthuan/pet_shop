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
 <!-- Header-->
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

    </div>
    <div class="carousel-item">
    <img class=" w-100 " src="./uploads/Blue.png"  style="height: 500px" alt="First slide">
    <div class="overlay"></div>
   
  
    </div>
    <div class="carousel-item">
    <img class=" w-100 " src="./uploads/Grey.png"  style="height: 500px" alt="First slide">
    <div class="overlay"></div>
   
   
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
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
$products = $conn->query("SELECT * FROM `products` where status = 1 order by rand() limit 8 ");
while ($row = $products->fetch_assoc()):
    $upload_path = base_app . '/uploads/product_' . $row['id'];
    $img = "";
    if (is_dir($upload_path)) {
        $fileO = scandir($upload_path);
        if (isset($fileO[2])) {
            $img = "uploads/product_" . $row['id'] . "/" . $fileO[2];
        }

        // var_dump($fileO);
    }
    $inventory = $conn->query("SELECT * FROM inventory where product_id = " . $row['id']);
    $inv = array();
    while ($ir = $inventory->fetch_assoc()) {
        $inv[$ir['size']] = number_format($ir['price']);
    }
    ?>
									            <div class="col mb-5">
									                <div class="card h-100 product-item">
									                    <!-- Product image-->
									                    <img class="card-img-top w-100" src="<?php echo validate_image($img) ?>" alt="..." />
									                    <!-- Product details-->
									                    <div class="card-body p-4">
									                        <div class="text-center">
									                            <!-- Product name-->
									                            <h5 class="fw-bolder"><?php echo $row['product_name'] ?></h5>
									                            <!-- Product price-->
									                            <?php foreach ($inv as $k => $v): ?>
									                                <span><b><?php echo $k ?>: </b><?php echo $v ?></span>
									                            <?php endforeach;?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat rounded-1" style="background-color: #F5DEA8" href=".?p=view_product&id=<?php echo md5($row['id']) ?>">Xem chi tiết</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>