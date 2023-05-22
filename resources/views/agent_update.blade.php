@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Agent: {{$agent->name}}</div>
                <div class="ard-body">
                    <form href="{{route('agent_update', ['id'=>$agent->id])}}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="agentName" class="form-label">agent name</label>
                            <input type="text" class="form-control" id="agentName" aria-describedby="agent Name"
                                   value="{{$agent->name}}" name="agent_name">
                            <div id="agentName" class="form-text">Current agent name</div>
                        </div>
                        <div class="mb-3">
                            <label for="agentDescription" class="form-label">agent Description</label>
                            <textarea class="form-control" name="agent_description" id="agentDescription"
                                      aria-describedby="agent Description">{{$agent->description}}</textarea>
                            <div id="agentDescription" class="form-text">In short word describe your agent</div>
                        </div>
                        <div class="mb-3">
                            <label for="agentToken" class="form-label">agent token</label>
                            <input type="text" class="form-control" id="agentToken" aria-describedby="agent Name"
                                   value="{{$agent->token}}" disabled>
                            <div id="agentToken" class="form-text">Current agent token</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="ard-body">
                    <div class="card">
                        <div class="card-header">
                            <div>Sites</div>
                        </div>

                        <div class="ard-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Site domain</th>
                                    <th scope="col">Hearth bit path</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
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
@endsection
