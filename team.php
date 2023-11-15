<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">

<link rel="stylesheet" href="teams.css">

<body>
    <section id="team" class="team section-bg">
        <div class="container" data- aos="fade-up">
            <div class="section-title">
                <h2>Đội Ngũ Của Chúng Tôi</h2>
                <p>Chúng tôi lắng nghe, thảo luận, tư vấn và phát triển. Chúng tôi đam mê học hỏi và sử dụng những công
                    nghệ mới nhất.</p>

            </div>
            <div class="row">

                <!--2nd-->
                <div class="col-lg-4 col-md-4 d-flex align-items stretch justify-content-center">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="images/kieu.jpg" style="width: 300px;height : 300px" class="img-fluid" alt="">
                            <div class="social">

                                <a href="https://www.facebook.com/shynmuoi?mibextid=ViGcVu">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>

                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Mộng Kiều</h4>
                            <span>Frontend</span>
                        </div>
                    </div>
                </div>
                <!--3rd-->
                <div class="col-lg-4 col-md-4 d-flex align-items stretch justify-content-center">
                    <div class="member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="images/mi.jpg" style="width: 300px;height : 300px" class="img-fluid" alt="">
                            <div class="social">

                                <a href="">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>

                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Trà Mi</h4>
                            <span>Full Stack</span>
                        </div>
                    </div>
                </div>
                <!--4th-->
                <div class="col-lg-4 col-md-4 d-flex align-items stretch justify-content-center">
                    <div class="member" data-aos="fade-up" data-aos-delay="400">
                        <div class="member-img">
                            <img src="images/quan.jpg" style="width: 300px;height : 300px" class="img-fluid" alt="">
                            <div class="social">

                                <a href="">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>

                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Ngọc Phúc</h4>
                            <span>Backend</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    let social = document.querySelector('.navigation');
    navigation.onclick = function() {
        navigation.classList.toggle('active')
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>