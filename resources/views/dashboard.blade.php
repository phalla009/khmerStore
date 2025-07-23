@extends('layouts.master')
@section('pageTitle')
    Admin Sales Dashboard
@endsection


@section('rightTitle')
    Admin Sales Dashboard
@endsection

@section('headerBlock')
    <script src="{{ URL::asset('js/form.js')}}"></script>
     <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('toolbar')
    <a href="{{ route('products.index') }}">&lt;&nbsp;Back</a>
@endsection

@section('content')
        <div class="report-container">
            <div class="report-card">
                <h3>Total Sales</h3>
                <p>$60,600</p>
            </div>
            <div class="report-card">
                <h3>Total Units Sold</h3>
                <p>590</p>
            </div>
            <div class="report-card">
                <h3>Top Category</h3>
                <p>Electronics</p>
            </div>
        </div>
        <div class="chart-container">
            <h2>Sales by Category</h2>
            <canvas id="salesChart"></canvas>
        </div>
        <div class="sales-table-container">
            <h2>Product Sales Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Units Sold</th>
                        <th>Revenue ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Smartphone X</td>
                        <td>Electronics</td>
                        <td>120</td>
                        <td>36,000</td>
                    </tr>
                    <tr>
                        <td>Wireless Headphones</td>
                        <td>Electronics</td>
                        <td>80</td>
                        <td>12,000</td>
                    </tr>
                    <tr>
                        <td>Denim Jacket</td>
                        <td>Clothing</td>
                        <td>100</td>
                        <td>5,000</td>
                    </tr>
                    <tr>
                        <td>Sneakers Pro</td>
                        <td>Clothing</td>
                        <td>60</td>
                        <td>3,600</td>
                    </tr>
                    <tr>
                        <td>Fiction Novel</td>
                        <td>Books</td>
                        <td>90</td>
                        <td>1,350</td>
                    </tr>
                    <tr>
                        <td>Cookbook</td>
                        <td>Books</td>
                        <td>60</td>
                        <td>900</td>
                    </tr>
                    <tr>
                        <td>Garden Planter</td>
                        <td>Home & Garden</td>
                        <td>50</td>
                        <td>1,000</td>
                    </tr>
                    <tr>
                        <td>LED Lamp</td>
                        <td>Home & Garden</td>
                        <td>30</td>
                        <td>750</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Electronics', 'Clothing', 'Books', 'Home & Garden'],
                datasets: [{
                    label: 'Sales by Category',
                    data: [48000, 8600, 2250, 1750],
                    backgroundColor: [
                        '#f57c00',
                        '#ff9800',
                        '#ffcc80',
                        '#e65100'
                    ],
                    borderColor: '#fff3e0',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Sales Distribution by Category (Revenue $)',
                        font: {
                            size: 18
                        }
                    }
                }
            }
        });
    </script>
@endsection
