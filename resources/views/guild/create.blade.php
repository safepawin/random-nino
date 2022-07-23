@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <form action="{{ route('guild.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">ชื่อ</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">ชื่หัวหน้ากิล</label>
                <input type="text" class="form-control" name="host_name">
            </div>
            <div class="form-group">
                <label for="">level</label>
                <input type="text" class="form-control" name="level">
            </div>

            <button type="submit" class="btn btn-primary mt-2">บันทึก</button>
        </form>
    </div>
@endsection
