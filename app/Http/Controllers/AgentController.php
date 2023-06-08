<?php

namespace App\Http\Controllers;

use App\Agent;
use App\HddLog;
use App\RamLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $owner = Auth::user();
        Agent::create([
            'owner_id' => $owner->id,
            'name' => $request->post('agent_name'),
            'description' => $request->post('agent_description'),
            'token' => hash("sha256", rand())
        ]);
        return redirect(route('agents'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update($id, Request $request)
    {
        Agent::where('id', $id)->update([
            'name' => $request->post('agent_name'),
            'description' => $request->post('agent_description'),
        ]);
        return redirect(route('agents'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $user->agents->load('sites');
        return view('agents')->with('agents', $user->agents);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get($id)
    {
        $agent = Agent::find($id);
        $agent->load('sites');
        return view('agent_update')->with('agent', $agent);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getdetails($id)
    {
        $agent = Agent::find($id);
        $agent->load('sites');
        return view('agent_details')->with('agent', $agent);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function log($id)
    {
        $response = [];

        $agent = Agent::find($id);
        $now = Carbon::now();
        $threeDaysAgo = (clone $now)->subDay(3);

        // HDD statistics
        $hddLogs = HddLog::where('agent_id', $id)->whereBetween('date',[$threeDaysAgo, $now])->get();
        $forHddChart = [];
        $forHddChart['used'][] = 0;
        $forHddChart['labels'][] = "start";
        $forHddChart['summary'][] = 0;
        foreach ($hddLogs as $index => $hddLog) {
            $forHddChart['labels'][] = $hddLog->date;
            $forHddChart['summary'][] = $hddLog->summary;
            $forHddChart['used'][] = $hddLog->used;
        }
        $response['hdd'] = $forHddChart;

        // RAM statistics
        $ramlogs = RamLog::where('agent_id', $id)->whereBetween('date',[$threeDaysAgo, $now])->get();
        $forRamChart = [];
        $forRamChart['used'][] = 0;
        $forRamChart['labels'][] = "start";
        $forRamChart['summary'][] = 0;
        foreach ($ramlogs as $index => $ramlog){
            $forRamChart['labels'][] = $ramlog->date;
            $forRamChart['summary'][] = $ramlog->summary;
            $forRamChart['used'][] = $ramlog->used;
        }
        $response ['ram'] = $forRamChart;

        return new Response($response);
    }
}
