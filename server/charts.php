<?php
session_start();
?>
<?php

if (!isset($_SESSION['admin_id'])) {
    header("index.php");
}
?>

<?php include "./connections/config.php" ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Recipe Management System</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />

    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png" />

    <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet" />

    <link href="./dist/css/style.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="./assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="./assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="./assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <ul class="navbar-nav float-start me-auto">

                    </ul>

                    <ul class="navbar-nav float-end">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>

                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="./assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" />
                                </div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium">
                                            <?= $_SESSION['username'] ?> <i class="fa fa-angle-down"></i>
                                        </h5>
                                        <span class="op-5 user-email"><?= $_SESSION['email'] ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>


                                        <a class="dropdown-item" href="../server/process/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10">
                            <a href="addRecipes.php" class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i>
                                <span class="hide-menu m-l-5">Add New Recipes</span>
                            </a>
                        </li>
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="recipes.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Recipes</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.html" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h3 class="text-center">Pupularity</h2>
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h3 class="text-center">Average Ratings</h2>
                                <canvas id="myCharts" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>



                </div>


            </div>

            <div class="row"></div>

            <div class="row"></div>

        </div>

        <footer class="footer text-center">
            Recipe Management System <strong>copy right &copy 2022</strong>
        </footer>

    </div>

    <?php ?>
    <script>
        function AjaxCallWithPromise() {
            return new Promise(function(resolve, reject) {
                const objXMLHttpRequest = new XMLHttpRequest();

                objXMLHttpRequest.onreadystatechange = function() {
                    if (objXMLHttpRequest.readyState === 4) {
                        if (objXMLHttpRequest.status == 200) {
                            resolve(objXMLHttpRequest.responseText);
                        } else {
                            reject('Error Code: ' + objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }

                objXMLHttpRequest.open('GET', '../server/process/averageRatings.php');
                objXMLHttpRequest.send();
            });
        }

        AjaxCallWithPromise().then(
            data => {
                // console.log('Success Response: ' + data)
                // console.log(JSON.parse(data))
                let parses = JSON.parse(data);
                let yValuess = parses.map((value) => {
                    return value.averageRatings;
                })
                let xValuess = parses.map((value) => {
                    return value.title;
                })
                console.log(xValuess);
                console.log(yValuess);

                // var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
                // var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

                new Chart("myCharts", {
                    type: "line",
                    data: {
                        labels: xValuess,
                        datasets: [{
                            fill: false,
                            lineTension: 0,
                            backgroundColor: "rgba(0,0,255,1.0)",
                            borderColor: "rgba(0,0,255,0.1)",
                            data: yValuess
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        // scales: {
                        //     yAxes: [{
                        //         ticks: {
                        //             min: 6,
                        //             max: 16
                        //         }
                        //     }],
                        // }
                    }
                });

            },

            error => {
                console.log(error)
            }
        );
    </script>
    <script>
        function AjaxCallWithPromise() {
            return new Promise(function(resolve, reject) {
                const objXMLHttpRequest = new XMLHttpRequest();

                objXMLHttpRequest.onreadystatechange = function() {
                    if (objXMLHttpRequest.readyState === 4) {
                        if (objXMLHttpRequest.status == 200) {
                            resolve(objXMLHttpRequest.responseText);
                        } else {
                            reject('Error Code: ' + objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }

                objXMLHttpRequest.open('GET', '../server/process/user.php');
                objXMLHttpRequest.send();
            });
        }

        AjaxCallWithPromise().then(
            data => {
                // console.log('Success Response: ' + typeof data)
                // console.log(JSON.parse(data))
                let parse = JSON.parse(data);
                let yValues = parse.map((value) => {
                    return value.averageRatings;
                })
                let xValues = parse.map((value) => {
                    return value.title;
                })
                // console.log(x);
                // console.log(y);

                var barColors = [
                    "#06BFE8",
                    "#FBBA7E",
                    "#5885F9",
                    "#FFCD4B",
                    "#1e7145"
                ];

                new Chart("myChart", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            // text: "Total recipe base on popularity"
                        }
                    }
                });

            },

            error => {
                console.log(error)
            }
        );
    </script>
    <script>
        // var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        // var yValues = [55, 49, 44, 24, 15];
        // var barColors = [
        //     "#b91d47",
        //     "#00aba9",
        //     "#2b5797",
        //     "#e8c3b9",
        //     "#1e7145"
        // ];

        // new Chart("myChart", {
        //     type: "pie",
        //     data: {
        //         labels: xValues,
        //         datasets: [{
        //             backgroundColor: barColors,
        //             data: yValues
        //         }]
        //     },
        //     options: {
        //         title: {
        //             display: true,
        //             text: "World Wide Wine Production 2018"
        //         }
        //     }
        // });
    </script>
    </div>

    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="./dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="./dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="./assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="./dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>