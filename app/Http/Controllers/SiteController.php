<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
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
    public function createForm()
    {
        $agents = Auth::user()->agents;
        return view('site')->with('agents', $agents);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $owner = Auth::user();
        Site::create([
            'owner_id' => $owner->id,
            'name' => $request->post('site_name'),
            'hearth_bit' => $request->post('site_hearth_bit'),
            'agent_id' => $request->post('agent_id'),
            'domain'=> $request->post('site_domain')
        ]);
        return redirect(route('sites'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update($id, Request $request)
    {
        Site::where('id', $id)->update([
            'name' => $request->post('site_name'),
            'domain' => $request->post('site_domain'),
            'hearth_bit' => $request->post('site_hearth_bit'),
            'agent_id' => $request->post('agent_id')
        ]);
        return redirect(route('sites'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $user->sites->load('agent');
        return view('sites')->with('sites', $user->sites);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get($id)
    {
        $site = Site::find($id);
        $agents = Auth::user()->agents;
        return view('site_update_frm')->with(['site'=>$site, 'agents'=>$agents, 'id'=>$id]);
    }
}
