<?php

namespace App\Services;

use App\Agent;
use App\ApacheLog;
use App\CpuLog;
use App\DbLog;
use App\DomainLog;
use App\HddLog;
use App\RamLog;
use App\Site;
use App\SshLog;
use Carbon\Carbon;

class LoggerService
{

    public function Log(array $log, Agent $agent): bool
    {
        $time = !empty($log['timestamp']) ?
            Carbon::createFromTimestamp($log['timestamp']) : Carbon::now();
        $timezone = !empty($log['timezone']) ?
            $log['timezone'] : 'utc-0';

        if (!empty($log['apache'])) {
            ApacheLog::create([
                'agent_id' => $agent->id,
                'date' => $time,
                'timezone' => $timezone,
                'details' => json_encode(!empty($log['apache']['requests']) ? $log['apache']['requests'] : [])
            ]);
        }

        if (!empty($log['hdd'])) {
            HddLog::create([
                'summary' => $log['hdd']['summary'],
                'agent_id' => $agent->id,
                'used' => $log['hdd']['used'],
                'date' => $time,
                'timezone' => $timezone
            ]);
        }
        if (!empty($log['cpu'])) {
            CpuLog::create([
                'summary' => $log['cpu']['summary'],
                'agent_id' => $agent->id,
                'date' => $time,
                'timezone' => $timezone
            ]);
        }
        if (!empty($log['ram'])) {
            RamLog::create([
                'summary' => $log['ram']['summary'],
                'agent_id' => $agent->id,
                'used' => $log['ram']['used'],
                'date' => $time,
                'timezone' => $timezone
            ]);
        }
        if (!empty($log['db'])) {
            DbLog::create([
                'agent_id' => $agent->id,
                'status' => ($log['db']['status'] === 'active') ? 1 : 0,
                'connections' => (!empty($log['db']['connections']) ? $log['db']['connections'] : null),
                'date' => $time,
                'timezone' => $timezone
            ]);
        }
        if (!empty($log['ssh'])) {
            foreach ($log['ssh'] as $ssh) {
                SshLog::create([
                    'agent_id' => $agent->id,
                    'ip' => (!empty($ssh['ip']) ? $ssh['ip'] : null),
                    'user' => (!empty($ssh['user']) ? $ssh['user'] : null),
                    'date' => $time,
                    'timezone' => $timezone
                ]);

            }
        }
        if (!empty($log['domains'])) {
            foreach ($log['domains'] as $domain) {
                $cd = Site::where('domain', $domain['name'])->where('agent_id', $agent->id)->first();
                if($cd) {
                    DomainLog::create([
                        'agent_id'=>$agent->id,
                        'site_id'=>$cd->id,
                        'status' => $domain['status']==='active'?1:0,
                        'p80'=>(!empty($domain['requests']) && !empty($domain['requests']['p80']))?$domain['requests']['p80']:null,
                        'p443'=>(!empty($domain['requests']) && !empty($domain['requests']['p443']))?$domain['requests']['p443']:null,
                        'date'=>$time,
                        'timezone'=>$timezone
                    ]);
                }
            }
        }
        return true;
    }

}
