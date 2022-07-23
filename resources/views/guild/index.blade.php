@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        @if (session('message'))
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('guild.create') }}" class="btn btn-primary">สร้างกิล</a>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th class="text-start">ชื่อ</th>
                    <th>หัวหน้ากิล</th>
                    <th class="text-end">เลเวล</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guilds as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">{{ $item->host_name }}</td>
                        <td class="text-end">{{ $item->level }}</td>
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
