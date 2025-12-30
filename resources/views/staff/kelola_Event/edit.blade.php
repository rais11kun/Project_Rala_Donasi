@extends('staff.layouts.app')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="white-box">
            <h3 class="box-title">Edit Event</h3>
            <form action="{{ route('staff.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Judul Event</label>
                    <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="date" class="form-control" value="{{ $event->date }}" required>
                </div>
                <div class="form-group">
                    <label>Banner Saat Ini</label><br>
                    <img src="{{ asset('asset-landing/img/'.$event->image) }}" width="150" class="m-b-10">
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-info">Update Event</button>
            </form>
        </div>
    </div>
</div>
@endsection