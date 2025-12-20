@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Total Donasi</h6>
                <h4>Rp {{ number_format($totalDonation) }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Donasi Pending</h6>
                <h4>{{ $pendingCount }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection
