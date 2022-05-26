<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    }
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Cognito - Kết nối gia sư trực tuyến</title>
    <style>

    </style>
</head>
<body>


    <!-- Navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav"> -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow  bg-transparent p-0 "  id="gtco-main-nav">
    
        <a href="home.php" class="navbar-brand d-flex align-items-center px-3 px-lg-5">
            <h2 class="m-0 text-primary" style="font-family: Lato-Black; font-size:36px"><i class="fa fa-book me-3"></i> COGNITO.VN</h2>
        </a>
        <button type="button" class="navbar-toggler me-4 btn" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" >
            <div class="navbar-nav ms-auto p-lg-0 mr-auto">
				<li class="nav-item"><a class="nav-link active" href="home.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="findtutor.php">Profile cố vấn</a></li>
                <li class="nav-item"><a class="nav-link " href="course.php">Tìm lớp học</a></li>
                <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mr-3">Xin chào
                <i style="font-size:24px" class="far fa-user-circle"></i> 
                </a> 
            </form>
        </div>
    </nav>
    <!-- Navbar End -->
<div class="container-fluid gtco-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="margin-top:50px">
                <!-- <h2> Về chúng tôi </h2> -->
                <h3>Cognito là một nền tảng học tập trực tuyến giúp cho học sinh lớp 12 kết nối với các cố vấn học tập là các sinh viên ngành sư phạm.</h3>
                <p style="font-style:italic">Để lớp 12 của bạn không cô đơn</p> 

                <a href="faq.php">Tìm hiểu thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-2">
               
            </div>
            <div class="col-md-5">
                <div class="card"><img class="card-img-top img-fluid" src="images/image-3.png" alt=""></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid gtco-feature" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cover">
                    <div class="card">
                        <svg
                                class="back-bg"
                                width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                        <!-- *************-->

                        <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <image clip-path="url(#clip-path)" xlink:href="images/online-edu.png" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2> Sứ mệnh giáo dục </h2>
                <p style="text-align: justify;"> Tiên phong đổi mới giáo dục, là nền tảng công nghệ tiên tiến kết nối người dạy và người học cùng nguồn tài 
                    liệu học thuật phong phú, chúng tôi, đội ngũ Cognito hy vọng tạo nên đột phá mới trong cách dạy và học nhằm đem 
                    đến những trải nghiệm học tập tối ưu cho học sinh THPT. </p>
                <p>Đội ngũ gia sư được chắt lọc kỹ càng, đem tới tới cho học sinh những phương pháp học tập mới, 
                    hiệu quả và tạo cảm hứng học sâu.</p>
                <a href="faq.php">Tìm hiểu thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>
<div class="container-fluid gtco-features" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2> Những ưu điểm <br/>
                    nổi bật của Cognito </h2>
                <p> Nhằm giúp cho việc học tập trực tuyến đạt được hiệu quả cao nhất, chúng tôi luôn không ngừng cải thiện và phát triển sản phẩm ngày càng tối ưu và đem đến cho người dùng những trải nghiệm tốt nhất </p>
                <a href="#">Các dịch vụ <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
            <div class="col-lg-8">
                <svg id="bg-services"
                     width="100%"
                     viewBox="0 0 1000 800">
                    <defs>
                        <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                            <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                            <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                        </linearGradient>
                    </defs>
                    <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)"
                          d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z"/>
                </svg>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/web-design.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Học trực tuyến</h3>
                                <p class="card-text">Chỉ cần thuyết bị kết nối mạng internet, bạn có thể học bất kỳ môn học nào bạn muốn để cải thiện và nâng cao điểm số.</p>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/marketing.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Tìm gia sư yêu thích</h3>
                                <p class="card-text">Bắt đầu gắn bó và học tập cùng gia sư bạn cảm thấy phù hợp, chúng tôi ưu tiên và tôn trọng sự lựa chọn của bạn.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/seo.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Kết nối nhanh - Hiệu quả</h3>
                                <p class="card-text">Nhanh chóng giúp các bạn học sinh kết nối tới những gia sư tâm huyết, dày dặn kinh nghiệm giảng dạy.</p>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/graphics-design.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Thời gian linh hoạt</h3>
                                <p class="card-text">Lựa chọn môn học và sắp xếp trên 1 thời khoá biểu giúp các bạn linh hoạt, chủ động tham gia lớp học.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid gtco-numbers-block"> 
    <div class="container">
        <svg width="100%" viewBox="0 0 1600 400">
            <defs>
                <linearGradient id="PSgrad_03" x1="80.279%" x2="0%"  y2="0%">
                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />

                </linearGradient>

            </defs>
            <!-- <clipPath id="clip-path3">

                                      </clipPath> -->

            <path fill-rule="evenodd"  fill="url(#PSgrad_03)"
                  d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>

            <clipPath id="ctm" fill="none">
                <path
                        d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>
            </clipPath>

     
            <image  clip-path="url(#ctm)" xlink:href="images/word-map.png" height="800px" width="100%" class="svg__image">
            </image>

        </svg>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                                        <h5 class="card-title">     4      </h5>
                    <p class="card-text">Founder trẻ </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">10+</h5>
                        <p class="card-text">Tuần nghiên cứu và phát triển</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">500+</h5>
                        <p class="card-text">Là mục tiêu users trải nghiệm đầu tiên</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">100+</h5>
                        <p class="card-text">Phản hồi tích cực</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="container-fluid gtco-testimonials"> 
     <div class="container">
        <h2>Đội ngũ Cognito.</h2>
        
        <div class="owl-carousel owl-carousel1 owl-theme">
            <div>
                <div class="card text-center">
                <img class="card-img-top " src="images/caoduong.jpg" alt="">
                    <div class="card-body">
                        <h5>Cao Dương <br/>
                        <p class="card-text"> Dương hiện đang là sinh viên năm thứ nhất - Chuyên ngành Điện tử Viễn Thông - 
                            Đại học Bách Khoa Hà Nội ” </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card text-center">
                    <img class="card-img-top" src="https://scontent.fhan5-8.fna.fbcdn.net/v/t1.6435-1/62588257_904100809922563_1322421564309766144_n.jpg?stp=dst-jpg_s320x320&_nc_cat=110&ccb=1-5&_nc_sid=7206a8&_nc_ohc=Blg-pLdd4xAAX8Qb1g5&_nc_ht=scontent.fhan5-8.fna&oh=00_AT8HQGa-FcrVgxry5HP6Bc2hv1vz-ihKjgzN3PdNMUA7gQ&oe=6248A7E7" alt="">
                    <div class="card-body">
                        <h5>Nguyễn Khánh Linh<br/>
                        <p class="card-text">
                            Hiện đang là sinh viên năm nhất, theo học ngành Quản trị kinh doanh của đại học Ngoại Thương </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card text-center">
                <img class="card-img-top " src="images/lengocbinh.png" alt="">
                      <div class="card-body">
                        <h5>Lê Ngọc Bình<br/>
                        <p class="card-text">“ Bình cũng đang là sinh viên năm thứ nhất - Chuyên ngành Khoa học dữ liệu và Trí tuệ nhân tạo - Đại học Bách Khoa Hà Nội ” </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card text-center">
                <img class="card-img-top" src="images/thanhthy1.jpg" alt="">
                     <div class="card-body">
                        <h5>Huỳnh Thanh Thy<br/>
                        <p class="card-text">“ Thy hiện đang là sinh viên năm nhất, theo học chuyên ngành IT tại đại học Swinburne Hồ Chí Minh ” </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container-fluid gtco-features-list">
    <div class="container">
        <div class="row">
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/quality-results.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Các buổi học chất lượng</h5>
                    Chúng tôi luôn đảm bảo những buổi học kèm cùng gia sư sẽ đem lại hiệu quả cho người học.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/analytics.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Kết nối nhanh - hiệu quả</h5>
                    Nhanh chóng kết nối tới lớp học, dễ dàng sử dụng với giao diện thân thiện.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/affordable-pricing.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Chi phí hợp lý</h5>
                    Vấn đề tài chính sẽ được thu hẹp lại ngay tại Cognito nên bạn hãy cố gắng học tập thật tốt nha.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/easy-to-use.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Nền tảng dễ sử dụng</h5>
                    Hoạt động dựa trên những thuật toán công nghệ giúp cho người dùng dễ dàng truy cập bất cứ nguồn thông tin, tài liệu học tập tại Cognito.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/free-support.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Hỗ trợ trực tuyến</h5>
                   Sẵn sàng giải đáp mọi thắc mắc của phụ huynh, học sinh.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/effectively-increase.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Cải thiện và nâng cao điểm số</h5>
                    Đăng ký để bắt đầu hành trình nào!
                              </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid gtco-news" id="news">
    <div class="container">
        <h2>Thông tin mới nhất về tuyển sinh</h2>
        <div class="owl-carousel owl-carousel2 owl-theme">
            <div>
                <div class="card text-center"><img class="card-img-top" src="https://file1.dangcongsan.vn/data/0/images/2021/10/15/anhdv/dh-bach-khoa-15-10.jpg" alt="">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5>Đại học Bách Khoa Hà Nội dự kiến dùng 10-15% chỉ tiêu xét tuyển bằng điểm THPTQG. </h5>
                        <p class="card-text">Điều kiện đảm bảo chất lượng: thí sinh có điểm trung bình chung 6 học kỳ mỗi môn học THPT trong tổ hợp xét tuyển đạt từ 7,0 trở lên (hoặc tổng điểm trung bình 6 học kỳ của 3 môn học từ 42,0 trở lên), được công nhận tốt nghiệp THPT và có điểm thi tốt nghiệp THPT đạt ngưỡng điểm nhận hồ sơ đăng ký xét tuyển do Trường quy định.
                            . . . </p>
                        <a href="https://www.hust.edu.vn/tin-tuc/-/asset_publisher/AKFI5qRls1e8/content/du-kien-phuong-thuc-tuyen-sinh-2022">Đọc thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            <div>
                <div class="card text-center"><img class="card-img-top" src="data:image/jpeg;base64,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" alt="">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5> Các mục tiêu phát triển bền vững - SDGs. </h5>
                        <p class="card-text">Việt Nam là quốc gia cam kết mạnh mẽ trong thực hiện các mục tiêu phát triển bền vững thông qua việc ban hành Định hướng chiến lược phát triển bền vững Việt Nam năm 2004, Chiến lược phát triển bền vững Việt Nam giai đoạn 2011-2020 và gần đây nhất là Kế hoạch hành động quốc gia thực hiện Chương trình nghị sự (CTNS) 2030 vì sự phát triển bền vững.
                            . . . </p>
                        <a href="https://www.facebook.com/ThanhHoaYouthChangeMakers/photos/a.172286824165174/791621005565083/">Đọc thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            <div>
                <div class="card text-center"><img class="card-img-top" src="https://www.hust.edu.vn/documents/59786/0/20220224-DSC_2398.jpg/7bf3aca5-885d-4ad3-9b0a-040d5d8001c5?t=1645768689059" alt="">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5>Bách khoa Hà Nội tiếp Đặc phái viên của Tổng thống Hoa Kỳ. </h5>
                        <p class="card-text">Tại Hà Nội, Đặc phái viên lựa chọn Đại học Bách khoa Hà Nội để đến thăm và làm việc. Trong buổi tiếp đón, ông John Kerry được nghe các nhà khoa học Bách khoa Hà Nội trình bày về các dự án về chủ đề môi trường. 
                            . . . </p>
                        <a href="https://www.hust.edu.vn/tin-tuc/-/asset_publisher/AKFI5qRls1e8/content/bach-khoa-ha-noi-tiep-ac-phai-vien-cua-tong-thong-hoa-ky?fbclid=IwAR3r3IJQyhc474uYGwbVRpGL6fjPtu_Lex0wrSyFnC_rS21hCqeTW7d9i-o">Đọc thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            <div>
                <div class="card text-center"><img class="card-img-top" src="https://giasuvietedu.com.vn/uploads/edu11.jpg" alt="">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5>Phụ huynh cần biết gì khi con mình học Gia sư Online?. </h5>
                        <p class="card-text">Gia sư Online là hình thức học mới đang được nhiều phụ huynh và học sinh thực hiện học tập và quan tâm. Học Gia sư Online sao cho hiệu quả, học vào khung giờ nào cho phù hợp với cả gia đình, học sinh và Gia sư là một điều khó khăn với nhiều gia đình. Thông qua bài viết dưới đây trung tâm Gia sư VietEdu xin mời các bậc phụ huynh tham khảo để làm sao giúp con em mình học tập một cách hiệu quả nhất.
                            . . . </p>
                        <a href="https://giasuvietedu.com.vn/gia-su-online">Đọc thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            <div>
                <div class="card text-center"><img class="card-img-top" src="https://www.kienguru.vn/hs-fs/hubfs/Annotation%202020-04-17%20184713.png?width=1391&name=Annotation%202020-04-17%20184713.png" alt="">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5> Học tập tại nhà hiệu quả. </h5>
                        <p class="card-text">Tình trạng dịch bệnh đang hoành hành như hiện nay cũng sẽ ảnh hưởng rất nhiều đến việc học tập của học sinh chúng mình. Bằng chứng lại chúng mình phải nghỉ học và tự học tại nhà. 

                            Nhưng vấn đề tự học tại nhà lại là một vấn đề khá nan giải và không đem lại hiệu quả cao. Các bạn có biết vì sao không? Bởi vì có hàng tỉ thứ chi phối, tuy nhiên để dễ hình dung, Kiến sẽ chia thành 2 loại tác nhân: tác nhân khách quan và tác nhân chủ quan
                            . . . </p>
                        <a href="https://www.kienguru.vn/blog/cach-hoc-tai-nha-hieu-qua">Đọc thêm<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            <div>
                <div class="card text-center"><img class="card-img-top" src="https://cdn.tgdd.vn/Files/2021/08/21/1376834/Nhung-cach-giup-ban-hoc-online-hieu-qua-1.png" alt="">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5>10 cách giúp bạn học online hiệu quả. </h5>
                        <p class="card-text">Học online là hình thức học tập với tinh thần thoải mái, không phải chịu sự giám sát của giáo viên. Cũng chính vì thế mà tinh thần tự giác học tập của các bạn sẽ dễ bị sao nhãng. Để khắc phục được việc này bạn cần xây dựng tinh thần tự giác cao độ và động lực vững vàng cho việc học online
                            . . . </p>
                        <a href="https://www.dienmayxanh.com/kinh-nghiem-hay/nhung-cach-giup-ban-hoc-online-hieu-qua-1376834">Đọc thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid" id="gtco-footer">
    <div class="container">
    <p class="footer">Cognito.vn</p>
           
                        <!-- <ul class="nav company-nav col-12">
                            <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Tìm gia sư</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Tìm lớp học</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                        </ul> -->
                        
                        <ul class="nav follow-us-nav">
                            <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook"aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-instagram"aria-hidden="true"></i></a></li>
                        </ul>
                     
                    <div class="col-12">
                        <p>&copy; 2022. All Rights Reserved. Cognito.vn.</p>
                    </div>
        </div>
    </div>
</footer>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- owl carousel js-->
<script src="owl-carousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

   <!-- <form class="form-inline my-2 my-lg-0">
                <a href="index.php" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">Đăng nhập</a> 
                <a href="register.php" class="btn btn-info my-2 my-sm-0 text-uppercase">Đăng ký</a>
            </form> -->