@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" id="random">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success" v-bind:disabled="randoming" v-on:click="runRandom()">Random
                            @{{ totalPoint }}</button>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 mb-2">
                        <input type="text" class="form-control" v-model="random_name" placeholder="ชื่อการสุ่ม">
                    </div>
                </div>
                <h3>รายชื่อผู้มีสิทธ์สุ่มทั้งหมด</h3>
                <hr>
                <template v-for="(member,i) in members">
                    <div class="col-md-3 mb-4">
                        <div class="card random-card" v-bind:id="i">
                            {{-- <img src="..." class="card-img-top" alt="..."> --}}
                            <div class="card-body">
                                <label for="">ชื่อ</label>
                                <p>@{{ member.name }}</p>
                            </div>
                        </div>
                    </div>
                </template>
                <h3>ตั้งค่า</h3>
                <hr>
                <template v-for="(member,i) in members">
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            {{-- <img src="..." class="card-img-top" alt="..."> --}}
                            <div class="card-body">
                                <label for="">ชื่อ</label>
                                <input class="form-control form-control-sm mb-2" type="text" v-model="member.name">
                                <label for="">แต้ม</label>
                                <input class="form-control form-control-sm mb-2 text-end" type="text"
                                    v-model="member.point">
                                <label for="">พลัง</label>
                                <input class="form-control form-control-sm mb-2 text-end" type="text"
                                    v-model="member.power">
                                <label for="">เปอเซ็น</label>
                                <input type="text" readonly class="form-control text-end form-control-sm mb-2 bg-info"
                                    v-bind:value="(member.point / totalPoint *100).toFixed(2) +'%' ">
                                <button class="btn btn-danger btn-sm" v-bind:disabled="randoming"
                                    v-on:click="removeMember(i)">ตัดสิทธิ</button>
                            </div>
                        </div>
                    </div>
                </template>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ชื่อการสุ่ม</th>
                                <th>เวลา</th>
                                <th>ผู้ชนะ</th>
                                <th>แต้ม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="random_transaction in random_transactions">
                                <tr>
                                    <td>@{{ random_transaction.random_name }}</td>
                                    <td>@{{ random_transaction.updated_at }}</td>
                                    <td>@{{ random_transaction.member_name }}</td>
                                    <td>@{{ random_transaction.point }}</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        const random = new Vue({
            el: "#random",
            data() {
                return {
                    members: @json($members),
                    randoming: false,
                    random_name: '',
                    random_transactions: []
                }
            },
            mounted() {
                this.getRandomTransaction()
            },
            computed: {
                totalPoint() {
                    let totalPoint = 0;
                    this.members.forEach(member => {
                        totalPoint += parseInt(member.point)
                    });
                    return totalPoint;
                },
            },
            methods: {
                async runRandom() {
                    let cards = document.querySelectorAll('.random-card')
                    cards.forEach(element => {
                        element.classList.remove('bg-success')
                    });
                    let res = await axios.post("{{ route('random.random') }}", {
                        members: this.members,
                        random_name: this.random_name
                    });
                    this.randoming = true;
                    let delayInMilliseconds = 300;
                    res.data.mix_result.forEach((result, i) => {
                        delayInMilliseconds += 200
                        setTimeout(() => {
                            document.getElementById(result).classList.add('bg-success')
                            setTimeout(() => {
                                document.getElementById(result).classList.remove(
                                    'bg-success')
                            }, 200);
                        }, delayInMilliseconds + 500);

                        if (res.data.mix_result.length == i + 1) {
                            setTimeout(() => {
                                document.getElementById(result).classList.add('bg-success')
                                this.randoming = false
                                this.getRandomTransaction()
                            }, 5500);
                        }
                    });
                },
                async getRandomTransaction() {
                    let res = await axios.get("{{ route('random.get-random-transaction') }}");
                    this.random_transactions = res.data.random_transactions
                },
                removeMember(index) {
                    let newMemers = this.members.splice(index, 1);
                }
            }
        })
    </script>
@endpush
