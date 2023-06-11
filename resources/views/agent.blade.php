@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h4>Գործակալների ավելացում</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="ard-body">
                    <div class="col-md-5">
                    <form href="{{route('create_agent')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="agentName" class="form-label">Գործակալի անվանում</label>
                            <input type="text" class="form-control" id="agentName" aria-describedby="agent Name"
                                   value="" name="agent_name">
                            <div id="agentName" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="agentDescription" class="form-label">Գործակալի նկարագրություն</label>
                            <textarea class="form-control" name="agent_description" id="agentDescription"
                                      aria-describedby="agent Description"></textarea>
                            <div id="agentDescription" class="form-text">2 բառով նկարագրեք ձեր գործակալին</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ավելացնել</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
