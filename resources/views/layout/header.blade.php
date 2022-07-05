<!--Header Upper-->
<section class="header-uper">
    <div class="container clearfix">
        <div class="logo">
            <figure>
                <a href="index.html">
                    <img src="{{ asset('assets/logo/logo-rs-nu-bwi.png')}}" width="100" style="margin: 16px" alt="">
                </a>
            </figure>
        </div>
    </div>
    {{--  <div class="container clearfix">

        <div class="left-side">
            <ul class="contact-info">
                <li class="item">
                    <div class="icon-box">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <strong>Email</strong>
                    <br>
                    <a href="#">
                        <span>info@medic.com</span>
                    </a>
                </li>
                <li class="item">
                    <div class="icon-box">
                        <i class="fa fa-phone"></i>
                    </div>
                    <strong>Call Now</strong>
                    <br>
                    <span>+ (88017) - 123 - 4567</span>
                </li>
            </ul>
            <div class="link-btn">
                <a href="#" class="btn-style-one">Appoinment</a>
            </div>
        </div>
    </div>  --}}
</section>
<!--Header Upper-->


<!--Main Header-->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::segment(1) == '' || Request::segment(1) == 'beranda'  ? 'active' : '' }}">
                    <a href="beranda">Beranda</a>
                </li>
                <li>
                    <a href="#">Profil Rumah Sakit</a>
                </li>
                <li>
                    <a href="#">Informasi</a>
                </li>
                <li>
                    <a href="#">Fasilitas</a>
                </li>
                <li>
                    <a href="#">Konsultasi</a>
                </li>
                <li>
                    <a href="#">Homecare</a>
                </li>
                <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                                    <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#">One more separated link</a>
                                    </li>
                            </ul>
                        </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!--End Main Header -->
