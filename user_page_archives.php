<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])) {
    header('location:error.php');
}

$user_id = $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Archive Profile</title>
        <link href="css/styles_profile.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
        .form-group {
            float: right;
        }

        .form-select {
            width: 80px;
        }

        .icon {
            width: 80px;
            text-align: center;
        }
        </style>
    </head>
    <body class="sb-nav-fixed" ng-controller="myCtrl">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Intramuros</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    </a>    
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="user_page.php">Profile</a></li>
                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Profile</div>
                            <a class="nav-link" href="user_page.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-tachometer" aria-hidden="true"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="user_page_archives.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                                Archive
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="sched.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                Book
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo("{$_SESSION['user_name']}");?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?php echo("{$_SESSION['user_name']}");?>'s Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome <?php echo("{$_SESSION['user_name']}");?> to your Profile!</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                List of Archived Reservations
                            </div>
                            <div class="card-body">
                                <br>
                                <div class="form-group mb-3 w-100">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" style="height: 37px;">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select class="form-select" id="displayPages" ng-model="pageSize" ng-options="size for size in pageSizes" ng-change="resetPage()">
                                        </select>
                                        <div class="w-25 px-3"></div> <!-- add gap -->
                                        <input type="text" class="form-control" id="search" ng-model="searchText">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>   
                                        </div>  
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th>
                                                <a href="#" ng-click="sortData('id')">#
                                                <span class="{{getSortClass('id')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('destination')">Destination
                                                <span class="{{getSortClass('destination')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('phone')">Phone
                                                <span class="{{getSortClass('phone')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('current_status')">Current Status
                                                <span class="{{getSortClass('current_status')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('email')">Email
                                                <span class="{{getSortClass('email')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('time_in_time_out')">Time In Time Out
                                                <span class="{{getSortClass('time_in_time_out')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('expected_date')">Expected Date
                                                <span class="{{getSortClass('expected_date')}}"></span>
                                                </a>
                                            </th>
                                            <th>
                                                <a href="#" ng-click="sortData('price')">Price
                                                <span class="{{getSortClass('price')}}"></span>
                                                </a>
                                            </th>
                                            <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <tr ng-repeat="person in filteredData = (people | filter:searchText) | orderBy:sortColumn:reverseSort | limitTo: pageSize : (currentPage - 1) * pageSize">
                                                <td>{{ person.id }}</td>
                                                <td>{{ person.destination }}</td>
                                                <td>{{ person.phone }}</td>
                                                <td>{{ person.current_status }}</td>
                                                <td>{{ person.email }}</td>
                                                <td>{{ person.time_in_time_out }}</td>
                                                <td>{{ person.expected_date }}</td>
                                                <td>{{ person.price }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#personModal" ng-click="openModal(person)">
                                                    View
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div ng-hide="filteredData.length">
                                        <center>No results match your search query</center>
                                    </div>
                                    <br>
                                    <div ng-show="filteredData.length">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item">
                                                    <a class="page-link" ng-disabled="currentPage == 1" ng-click="currentPage=1">First</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" ng-disabled="currentPage == 1" ng-click="currentPage > 1 ? currentPage=currentPage-1 : null">Previous</a>
                                                </li>
                                                <li class="page-item disabled">
                                                    <a class="page-link">Page {{currentPage}} of {{numberOfPages()}}</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" ng-disabled="currentPage >= numberOfPages()" ng-click="currentPage < numberOfPages() ? currentPage=currentPage+1 : null">Next</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" ng-disabled="currentPage >= numberOfPages()" ng-click="currentPage=numberOfPages()">Last</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                 <!-- Modal -->
                <div class="modal fade" id="personModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="personModalLabel">Entry Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <img ng-src="{{selectedPerson.destination == 'Casa Manila' ? 'assets/img/portfolio/5.jpg' : 
                                    selectedPerson.destination == 'Baluarte' ? 'assets/img/portfolio/2.jpg' :
                                    selectedPerson.destination == 'Fort Santiago' ? 'assets/img/portfolio/1.jpg' :
                                    selectedPerson.destination == 'Manila Cathedral' ? 'assets/img/portfolio/3.jpg' :
                                    selectedPerson.destination == 'Barbaras Restaurant' ? 'assets/img/portfolio/4.jpg' :
                                    'assets/img/portfolio/6.jpg'}}"
                                    alt="Default Profile" width="300" height="300"><br><br>
                                    <b><u>ID:</u></b> {{ selectedPerson.id }}<br>
                                    <b><u>Destination:</u></b> {{ selectedPerson.destination }}<br>
                                    <b><u>Phone:</u></b> {{ selectedPerson.phone }}<br>
                                    <b><u>Current Status:</u></b> {{ selectedPerson.current_status }}<br>
                                    <b><u>Email:</u></b> {{ selectedPerson.email }}<br>
                                    <b><u>Time In Tme Out:</u></b> {{ selectedPerson.time_in_time_out }}<br>
                                    <b><u>Expected Date:</u></b> {{ selectedPerson.expected_date }}<br>
                                    <b><u>Price:</u></b> {{ selectedPerson.price }}<br>
                                    <br>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Intramuros 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/scripts_profile.js"></script>
        <!-- AngularJS script -->
        <script>
        var app = angular.module("myApp", []);
        app.controller("myCtrl", function($scope, $http) {

            $http.get("getPeopleUserArchive.php?user_id=<?php echo json_encode($user_id); ?>")
                .then(function(response) {
                    $scope.people = response.data.records;
                });

            $scope.openModal = function(person) {
                $scope.selectedPerson = person;
                $('#personModal').modal('show');
            };

            $scope.sortColumn = "action";
            $scope.reverseSort = false;

            $scope.sortData = function (column) {
                $scope.reverseSort = ($scope.sortColumn == column) ?
                !$scope.reverseSort : false;
                $scope.sortColumn = column;
            }

            $scope.getSortClass = function (column) {
                if ($scope.sortColumn == column) {
                return $scope.reverseSort ? 'fa fa-caret-down' : 'fa fa-caret-up';
                }
                return '';
            }

            $scope.searchPerson = function() {
                $scope.currentPage = 1;
            };        

            $scope.searchText = "";
            $scope.currentPage = 1;
            $scope.pageSizes = [5, 10, 15, 20, 25];
            $scope.pageSize = $scope.pageSizes[0];

            $scope.numberOfPages = function() {
                return Math.ceil($scope.filteredData.length / $scope.pageSize);
            }

            $scope.$watch("searchText", function() {
                $scope.currentPage = 1;
            });

            $scope.resetPage = function() {
                $scope.currentPage = 1;
            };
        });
        </script>
    </body>
</html>
