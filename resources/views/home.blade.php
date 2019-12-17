<?php
    $title = "Home";
    $page_title = "Dashboard";
?>
@extends('layouts.app')

@section('content')
    <!-- BEGIN SUMMARY CARDS -->
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-primary animated fadeInDown">
                <div class="card-body">
                    <h4 class="card-title">SALES OVERVIEW</h4>
                    <div class="d-flex flex-row">
                        <div class="align-self-center">
                            <span class="display-6 text-white"><span>RS </span>{{ number_format($today_sales, 2) }}</span>
                            <h6 style="color: rgba(255,255,255,.6) !important; font-size:11px;">
                                @if(floatval($sales_increase) < 0)<i class="mdi mdi-arrow-down-bold"></i>@else <i class="mdi mdi-arrow-up-bold"></i>@endif{{ number_format($sales_increase, 2) }}% higher than yesterday
                            </h6>
                            <h5 class="text-white">Total Sales for Today</h5>
                        </div>
                        <div class="ml-auto">
                            <i class="mdi mdi-sale" style="font-size:5em; color: rgba(255,255,255,.6) !important;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-success animated fadeInDown">
                <div class="card-body">
                    <h4 class="card-title">PROFIT/LOSS SUMMARY</h4>
                    <div class="d-flex flex-row">
                        <div class="align-self-center">
                            <span class="display-6 text-white"><span >RS </span>{{ number_format($today_profit, 2) }}</span>
                            <h6 style="color: rgba(255,255,255,.6) !important; font-size:11px;">
                                @if(floatval($profit_increase) < 0)<i class="mdi mdi-arrow-down-bold"></i>@else <i class="mdi mdi-arrow-up-bold"></i>@endif{{ number_format($profit_increase, 2) }}% higher than yesterday
                            </h6>
                            <h5 class="text-white">Profit on Sales for Today</h5>
                        </div>
                        <div class="ml-auto">
                            <i class="mdi mdi-chart-line" style="font-size:5em; color: rgba(255,255,255,.6) !important;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-danger animated fadeInDown">
                <div class="card-body">
                    <h4 class="card-title">INVENTORY SUMMARY</h4>
                    <div class="d-flex flex-row">
                        <div class="align-self-center">
                            <span class="display-6 text-white"><span>RS </span>{{ number_format($inventory_summary, 2) }}</span>
                            <h6 style="color: rgba(255,255,255,.6) !important; font-size:11px;">For {{ $total_items }} items in stock</h6>
                            <h5 class="text-white">Total Value of Inventory Stock</h5>
                        </div>
                        <div class="ml-auto">
                            <i class="mdi mdi-store-24-hour" style="font-size:5em; color: rgba(255,255,255,.6) !important;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SUMMARY CARDS -->

    <!-- BEGIN TABLES -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card animated zoomIn">
                    <div class="card-body">
                        <h4 class="card-title">
                            LOW STOCK @if(count($low_stock) > 5)<a href="" class="pull-right btn btn-outline btn-outline-inverse">See More</a>@endif
                        </h4>
                        <div class="table-responsive m-t-20">
                            <table class="table stylish-table">
                                <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Threshold</th>
                                    <th>Available</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($low_stock) > 0)
                                        @foreach($low_stock as $value)
                                            <tr>
                                                <td>{{ $value->sku }}</td> <!-- LIQUID | SOFT DRINK | - COKE | Bigger Boy -->
                                                <td>{{ $value->variation_name }}</td>
                                                <td>{{ $value->stock_threshold }}</td>
                                                <td>{{ $value->stock }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">We're doing a good job!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END TABLES -->
@endsection

@push("extra-js")
@endpush
