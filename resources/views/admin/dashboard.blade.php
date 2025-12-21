@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">

    {{-- TOTAL DONASI --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-sm mb-0 text-uppercase">Total Donasi</p>
                        <h5 class="mb-0">{{ $totalDonations }}</h5>
                    </div>
                    <div class="icon icon-shape bg-gradient-primary shadow rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TOTAL NOMINAL --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-sm mb-0 text-uppercase">Total Nominal</p>
                        <h5 class="mb-0">Rp {{ number_format($totalAmount) }}</h5>
                    </div>
                    <div class="icon icon-shape bg-gradient-success shadow rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- PENDING --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-sm mb-0 text-uppercase">Pending</p>
                        <h5 class="mb-0">{{ $pendingDonations }}</h5>
                    </div>
                    <div class="icon icon-shape bg-gradient-warning shadow rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- APPROVED --}}
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-sm mb-0 text-uppercase">Approved</p>
                        <h5 class="mb-0">{{ $approvedDonations }}</h5>
                    </div>
                    <div class="icon icon-shape bg-gradient-info shadow rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6>Donasi per Kategori</h6>
            </div>
            <div class="card-body">
                <canvas id="donationChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('donationChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($donationsByCategory->pluck('name')) !!},
            datasets: [{
                label: 'Total Donasi (Rp)',
                data: {!! json_encode($donationsByCategory->pluck('total_amount')) !!},
                backgroundColor: '#5e72e4'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
