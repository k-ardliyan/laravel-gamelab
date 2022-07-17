@extends('layouts.master')

@php
// create today's date
$today = date('Y-m-d H:i:s');
// convert to asia/jakarta
$today = new DateTime($today);
$today->setTimezone(new DateTimeZone('Asia/Jakarta'));
// get today's date
$greeting = $today->format('H:i');
// good morning, afternoon, evening, night
if ($greeting >= '00:00' && $greeting <= '11:59') {
    $greeting = 'Selamat Pagi';
} elseif ($greeting >= '12:00' && $greeting <= '14:59') {
    $greeting = 'Selamat Siang';
} elseif ($greeting >= '15:00' && $greeting <= '18:59') {
    $greeting = 'Selamat Sore';
} elseif ($greeting >= '19:00' && $greeting <= '23:59') {
    $greeting = 'Selamat Malam';
}
@endphp

@section('title')
    {{ $greeting }}, {{ Auth::user()->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-calendar-days"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Booking</h4>
                    </div>
                    <div class="card-body">
                        {{ $issues->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Member</h4>
                    </div>
                    <div class="card-body">
                        {{ $members->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Book</h4>
                    </div>
                    <div class="card-body">
                        {{ $books->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-tag"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Book Status Booked</h4>
                    </div>
                    <div class="card-body">
                        {{ $issues->where('is_booked',1)->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Frequently borrowed</h4>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myChart2" style="display: block; width: 572px; height: 286px;"
                        class="chartjs-render-monitor" width="572" height="286"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Member most borrow</h4>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myChart3" style="display: block; width: 572px; height: 286px;"
                        class="chartjs-render-monitor" width="572" height="286"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script>
        var frequent = @php
            echo json_encode($issue_book);
        @endphp;
        var frequentMember = @php
            echo json_encode($issue_member);
        @endphp;
        var frequentObj = {};
        var frequentMemberObj = {};
        // create obj
        for (var i = 0; i < frequent.length; i++) {
            frequentObj[frequent[i].title] = frequent[i].is_booked;
        }
        for (var i = 0; i < frequentMember.length; i++) {
            frequentMemberObj[frequentMember[i].first_name + ' ' + frequentMember[i].last_name] = frequentMember[i].member_id;
        }

        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(frequentObj),
                datasets: [{
                    label: 'Statistics',
                    data: Object.values(frequentObj),
                    borderWidth: 2,
                    backgroundColor: '#6777ef',
                    borderColor: '#6777ef',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });

        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: Object.values(frequentMemberObj),
                    backgroundColor: [
                        '#191d21',
                        '#63ed7a',
                        '#ffa426',
                        '#fc544b',
                        '#6777ef',
                    ],
                    label: 'Dataset 1'
                }],
                labels: Object.keys(frequentMemberObj)
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });
    </script>
@endpush
