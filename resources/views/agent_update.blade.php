@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Գործակալ: {{$agent->name}}</div>
                <div class="ard-body">
                    <div class="col-md-6">
                    <form href="{{route('agent_update', ['id'=>$agent->id])}}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="agentName" class="form-label">Գործակալի անվանում</label>
                            <input type="text" class="form-control" id="agentName" aria-describedby="agent Name"
                                   value="{{$agent->name}}" name="agent_name">
                            <div id="agentName" class="form-text">Գործակալի թարմեցված անվանում</div>
                        </div>
                        <div class="mb-3">
                            <label for="agentDescription" class="form-label">Գործակալի նկարագրություն</label>
                            <textarea class="form-control" name="agent_description" id="agentDescription"
                                      aria-describedby="agent Description">{{$agent->description}}</textarea>
                            <div id="agentDescription" class="form-text">2 բառով նկարագրեք ձեր գործակալին</div>
                        </div>
                        <div class="mb-3">
                            <label for="agentToken" class="form-label">Գործակալի տոկեն</label>
                            <input type="text" class="form-control" id="agentToken" aria-describedby="agent Name"
                                   value="{{$agent->token}}" disabled>
{{--                            <div id="agentToken" class="form-text">Թարմեցված գործակալի տոկեն</div>--}}
                        </div>
                        <button type="submit" class="btn btn-primary">Թարմեցնել</button>
                    </form>
                </div>
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="ard-body">
                    <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div>Կայքեր</div>
                        </div>

                        <div class="ard-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Անուն</th>
                                    <th scope="col">Կայքի հասցե</th>
                                    <th scope="col">Hearth bit</th>
                                    <th scope="col">Հասանելիություն</th>
                                    <th scope="col">Ստեղծվել է</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($agent->sites as $site)
                                    <tr>
                                        <td>{{$site->name}}</td>
                                        <td>{{$site->domain}}</td>
                                        <td>{{$site->hearth_bit}}</td>
                                        <td>Active</td>
                                        <td>{{$site->created_at}}</td>
                                        <td>
                                            <a href="{{route('site_update_form', ['id' => $site->id])}}" class="nav_link"> <i class='bx bx-edit nav_icon'></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
