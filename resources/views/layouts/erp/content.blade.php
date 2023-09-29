@extends('layouts.erp.app')
@section('page')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Salessa </a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales</li>
                        </ol>
                    </div>
                    <a href="#" class="white_btn3">Create Report</a>
                </div>
            </div>
        </div>
        <div class="row ">
         
            <div class="col-lg-4 card_height_100 mb_20">
                <div class="white_card">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Daily Sales Unit</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body p-0">
                        <div class="card_container">
                            <div id="platform_type_dates_donut" style="height:280px"></div>
                        </div>
                    </div>
                </div>
                <div class="sales_unit_footer d-flex justify-content-between">
                    <div class="single_sales">
                        <p>Today's Revenue</p>
                        <h3></h3>

                    </div>

                </div>
            </div>
            <div class="col-lg-4 card_height_100 mb_20">
                <div class="white_card">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Monthly Sales Unit</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body p-0">
                        <div class="card_container">
                            <div id="platform_type_dates_donut" style="height:280px"></div>
                        </div>
                    </div>
                </div>
                <div class="sales_unit_footer d-flex justify-content-between">
                <div class="single_sales">
                                <p>This Month Revenue</p>
                                <h3></h3>

                            </div>

                </div>
            </div>
          
            <div class="col-lg-4">
                <div class="white_card card_height_100 mb_20">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Summary</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body mt_30">
                        <div id="bar1" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="25"></span>
                        </div>
                        <div id="bar2" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="75"></span>
                        </div>
                        <div id="bar3" class="barfiller mb-0">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="34"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_20">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Total order</h3>
                            </div>
                            <div class="float-lg-right float-none sales_renew_btns justify-content-end">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">This week</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body d-flex align-items-center" style="height:140px">


                    </div>
                </div>
            </div>
          
         
          
          
        </div>
    </div>
</div>

@endsection