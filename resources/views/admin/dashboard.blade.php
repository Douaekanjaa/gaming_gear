<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            
        .card {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            width: 170%;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 10px 20px;
        }

        .card-footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .card-footer a:hover {
            color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        h1 {
            color: #343a40;
        }
    </style>
</head>
<body>
    @extends('admin.admindash')

    @section('content')
    
    <div class="main-content">
        <h1 class="mt-4" style="color: #6A2895 !important;">Admin Dashboard</h1>
    
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h5 mb-0">Total Products</div>
                            <i class="fas fa-cube fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="#" style="color: #6A2895 !important;">View Details</a>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h5 mb-0">Total Sales</div>
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="#" style="color: #6A2895 !important;">View Details</a>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
    
    
        </div>
    
        <div class="card">
            <div class="card-header" style="background-color: #6A2895 !important;">
                <i class="fas fa-table mr-1 recent-order"></i>
                Recent Orders
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>