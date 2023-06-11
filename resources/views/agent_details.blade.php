@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/agent_details.js')}}" defer></script>
    <div style="text-align: center"><h2>Գործակալի մասին վիճակագրություն</h2></div>
    <div class="row justify-content-center" id="details_owner" data-id="{{$agent->id}}">
        <div class="row">
            <div class="flex-container" style="display: flex">
                <div class="ard-body">
                    <div class="row">Կոշտ սկավառակի օգտագործում
                        <div style="width: 100%">
                            <canvas id="hddLog" height="450px" width="600px"></canvas>
                        </div>

                        <div class="row">Օպերատիվ հիշողության օգտագործում
                            <div style="width: 100%">
                                <canvas id="ramLog" height="450px" width="600px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ard-body">
                    <div class="row">Պրոցեսորի օգտագործում
                        <div style="width: 100%">
                            <canvas id="cpuLog" height="450px" width="600px"></canvas>
                        </div>
                        <div class="row">Տվյալների բազայի օգտագործում
                            <div style="width: 100%">
                                <canvas id="dbLog" height="450px" width="600px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">SSH օգտագործում
                <div style="width: 100%">
                <div class="ard-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Գործակալի ID</th>
                            <th scope="col">IP</th>
                            <th scope="col">Օգտատեր</th>
                            <th scope="col">Ամսաթիվ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sshLogs as $sshLog)
                            <tr>
                                <td>{{$sshLog->agent_id}}</td>
                                <td>{{$sshLog->ip}}</td>
                                <td>{{$sshLog->user}}</td>
                                <td>{{$sshLog->date}}</td>
                        @endforeach
                        </tbody>
                    </table>
                 </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
