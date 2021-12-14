<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                    </form>
                </div>
                <h4 class="aria-current="page>Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Members</h5>
                            <h3 class="mt-3 mb-3">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-email-open-outline widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Newsletters Opened</h5>
                            <h3 class="mt-3 mb-3">5,543</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-book-open-variant widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Page Views</h5>
                            <h3 class="mt-3 mb-3">26,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Growth</h5>
                            <h3 class="mt-3 mb-3">+ 30.56%</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end col -->
<!--Site Visitors Chart here-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Site Visitors Over Time</h4>
                    <div class="toolbar">
                        <button id="one_month" class="btn btn-sm btn-light">1M</button>
                        <button id="six_months" class="btn btn-sm btn-light">6M</button>
                        <button id="one_year" class="btn btn-sm btn-light active">1Y</button>
                        <button id="ytd" class="btn btn-sm btn-light">YTD</button>
                        <button id="all" class="btn btn-sm btn-light">ALL</button>
                    </div>
                    <div id="area-chart-datetime" class="apex-charts"></div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Visitor Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Page Views</h4>
                    <div class="pull-in chart-content-bg">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Previous Week</p>
                                <h2 class="font-weight-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-primary align-middle mr-1"></small>
                                    <span>26,254</span>
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Current Week</p>
                                <h2 class="font-weight-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-success align-middle mr-1"></small>
                                    <span>69,524</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="dash-item-overlay d-none d-md-block">
                        <h5>Today's Views: 2,562.30</h5>
                        <p class="text-muted font-13 mb-3 mt-2">These are unique pageviews by visitors over time.</p>
                        <a href="javascript: void(0);" class="btn btn-outline-primary">View Trends
                            <i class="mdi mdi-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <div class="mt-3 chartjs-chart" style="height: 364px;">
                        <canvas id="revenue-chart"></canvas>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Total Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Uniques</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title">Visitor Map</h4>
                    <div class="mb-4 mt-4">
                        <div id="world-map-markers" style="height: 224px"></div>
                    </div>
                    <h5 class="mb-1 mt-0 font-weight-normal">New York</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value font-weight-bold">72k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <h5 class="mb-1 mt-0 font-weight-normal">San Francisco</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value font-weight-bold">39k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <h5 class="mb-1 mt-0 font-weight-normal">Sydney</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value font-weight-bold">25k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <h5 class="mb-1 mt-0 font-weight-normal">Singapore</h5>
                    <div class="progress-w-percent mb-0">
                        <span class="progress-value font-weight-bold">61k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Messages-->
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Messages</h4>

                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Tom S</p>
                            <p class="inbox-item-text">I've finished the .pdf, uploaded in Documents.</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">S.Burton</p>
                            <p class="inbox-item-text">I've just written a new blog post.</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">K.Laughlin</p>
                            <p class="inbox-item-text">I'm looking for some help with...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">V.Garcia</p>
                            <p class="inbox-item-text">Hey! Love the new events section.</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-7.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">M.Chang</p>
                            <p class="inbox-item-text">I uploaded photos from our event in the Media...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-8.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">J.Coyier</p>
                            <p class="inbox-item-text">Looking for suggestions for my newest article...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                            <p>&nbsp;</p>
                        </div>

                    </div> <!-- end inbox-widget -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Open Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Users Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Total Opens</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Active Users</a>
                        </div>
                    </div>
                    <h4 class="header-title">Emails Opened</h4>
                    <div class="mb-5 mt-4 chartjs-chart" style="height: 201px; max-width: 180px;">
                        <canvas id="average-sales"></canvas>
                    </div>
                    <div class="chart-widget-list">
                        <p>
                            <i class="mdi mdi-square text-primary"></i> January
                            <span class="float-right">33,000</span>
                        </p>
                        <p>
                            <i class="mdi mdi-square text-danger"></i> February
                            <span class="float-right">15,000</span>
                        </p>
                        <p>
                            <i class="mdi mdi-square text-success"></i> March
                            <span class="float-right">48,000</span>
                        </p>
                        <p class="mb-0">
                            <i class="mdi mdi-square"></i> E-mail YTD Totals
                            <span class="float-right">96,000</span>
                        </p>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-5">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Social Media + Website Engagement</h4>
                    <div id="line-column-mixed" class="apex-charts"></div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- container -->
