@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h4>Agents/Servers page adding</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="ard-body">
                    <form href="{{route('create_agent')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="agentName" class="form-label">Agent name</label>
                            <input type="text" class="form-control" id="agentName" aria-describedby="agent Name"
                                   value="" name="agent_name">
                            <div id="agentName" class="form-text">Current agent name</div>
                        </div>
                        <div class="mb-3">
                            <label for="agentDescription" class="form-label">Agent Description</label>
                            <textarea class="form-control" name="agent_description" id="agentDescription"
                                      aria-describedby="agent Description"></textarea>
                            <div id="agentDescription" class="form-text">In short word describe your agent</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
