@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Staff Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Overview</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Donasi</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> 
                            <span class="counter text-success">{{ number_format($total_donations ?? 0) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Relawan</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> 
                            <span class="counter text-purple">{{ $total_volunteers ?? 0 }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Pesan Baru</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> 
                            <span class="counter text-info">{{ $total_contacts ?? 0 }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Donasi Kategori Terbaru</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>KATEGORI</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL</th>
                                    <th>NOMINAL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_donations as $key => $donation)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="txt-oflo">{{ ucfirst($donation->category) }}</td>
                                    <td>
                                        @if($donation->status == 'pending')
                                            <span class="label label-warning">PENDING</span>
                                        @else
                                            <span class="label label-success">SUCCESS</span>
                                        @endif
                                    </td>
                                    <td class="txt-oflo">{{ $donation->created_at->format('d M, Y') }}</td>
                                    <td><span class="text-success">Rp {{ number_format($donation->amount) }}</span></td>
                                    <td>
                                        <a href="{{ route('staff.donations.index') }}" class="btn btn-sm btn-default btn-outline">Detail</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada donasi masuk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-8 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Pesan Kontak Terbaru</h3>
                    <div class="comment-center p-t-10">
                        @forelse($recent_contacts as $contact)
                        <div class="comment-body" style="display: flex; width: 100%;">
                            <div class="user-img"> 
                                <img src="{{ asset('asset-staff/plugins/images/users/ritesh.jpg') }}" alt="user" class="img-circle">
                            </div>
                            <div class="mail-contnet" style="padding-left: 20px;">
                                <h5>{{ $contact->name }}</h5>
                                <span class="time">{{ $contact->created_at->diffForHumans() }}</span>
                                <br/><span class="mail-desc">{{ Str::limit($contact->message, 150) }}</span> 
                                <a href="mailto:{{ $contact->email }}" class="btn btn btn-rounded btn-default btn-outline m-r-5">
                                    <i class="ti-email text-success m-r-5"></i> Balas Email
                                </a>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">Tidak ada pesan terbaru.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="panel">
                    <div class="sk-chat-widgets">
                        <div class="panel panel-default">
                            <div class="panel-heading">RELAWAN TERBARU</div>
                            <div class="panel-body">
                                <ul class="chatonline">
                                    @forelse($recent_volunteers as $volunteer)
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('asset-staff/plugins/images/users/varun.jpg') }}" alt="user-img" class="img-circle"> 
                                            <span>{{ $volunteer->name }} <small class="text-success">{{ $volunteer->event_title }}</small></span>
                                        </a>
                                    </li>
                                    @empty
                                    <li class="text-center small">Belum ada relawan terdaftar.</li>
                                    @endforelse
                                </ul>
                                <div class="text-center p-t-20">
                                    <a href="{{ route('staff.volunteers.index') }}" class="btn btn-info btn-block">Lihat Semua Relawan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center"> {{ date('Y') }} &copy; GIVEHOPE Foundation - Ample Admin </footer>
</div>
@endsection