@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <a class="btn btn-primary" href="{{ route('member.create') }}">เพิ่มสมาชิก</a>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th class="text-start">ชื่อ</th>
                    <th>ตำแหน่ง</th>
                    <th class="text-end">แต้มกิล</th>
                    <th class="text-end">พลัง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">{{ $item->type }}</td>
                        <td class="text-end">{{ number_format($item->point, 2) }}</td>
                        <td class="text-end">{{ number_format($item->power, 2) }}</td>
                        <td class="text-center">
                            <a href="">แก้ไข</a>
                            <a href="">ลบ</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
