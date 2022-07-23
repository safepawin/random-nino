@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        <h1 class=" bg-info p-3">
            ระบบสุ่ม ใช้สูตรคำนวนแบบการ "สุ่มแบบถ่วงน้ำหนัก"(Random with weight)
            โดยการสุ่มจะนำแต้ม บริจาคกิล มาเป็นตัวคำนวน
            บริจาคมาก ก็มีเปอเซ็นชนะมาก
        </h1>
        <h2 class="bg-warning p-3">
            วิธีใช้งาน
            <ul>
                <li>
                    สมัครสมาิก
                </li>
                <li>
                    สร้างกิล
                </li>
                <li>
                    เพิ่มสมาชิก
                </li>
                <li>
                    กดสุ่ม
                </li>
            </ul>
        </h2>
        <h3>
            ตัวอย่างการคำนวน
        </h3>
        <div class="d-flex justify-content-center">
            <img class="d-inline-block mx-auto" src="{{ asset('image/code-random.png') }}" alt="">
        </div>
        <a class="d-block text-center"
            href="https://nonthakon.medium.com/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B8%E0%B9%88%E0%B8%A1%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%96%E0%B9%88%E0%B8%A7%E0%B8%87%E0%B8%99%E0%B9%89%E0%B8%B3%E0%B8%AB%E0%B8%99%E0%B8%B1%E0%B8%81-random-with-weight-%E0%B9%83%E0%B8%99-smart-contracts-b65ac2bdca19">credit</a>
    </div>
@endsection
