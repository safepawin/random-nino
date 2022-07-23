@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <form action="{{ route('member.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">ชื่อ</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">point</label>
                <input type="text" class="form-control" name="point">
            </div>
            <div class="form-group">
                <label for="">power</label>
                <input type="text" class="form-control" name="power">
            </div>
            <div class="form-group mt-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="{{ \App\Enum\MemberType::HOST }}">
                    <label class="form-check-label">
                        หัวหน้ากิล
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="{{ \App\Enum\MemberType::STAFF }}">
                    <label class="form-check-label">
                        รองกิล
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" checked value="{{ \App\Enum\MemberType::MEMBER }}">
                    <label class="form-check-label">
                        สมาชิก
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">บันทึก</button>
        </form>
    </div>
@endsection
