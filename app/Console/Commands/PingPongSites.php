<?php

namespace App\Console\Commands;

use App\Site;
use App\SitesPingPong;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\ErrorHandler\Exception\SilencedErrorContext;

class PingPongSites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sites:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking sites availability';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sites = Site::all();

        foreach ($sites as $site) {
            $url = empty($site->check_word) ? "http://{$site->domain}/{$site->hearth_bit}" : "http://{$site->domain}";
            // TODO - need to keep in mind, that there is no timeout for request,
            //  so possible case when requests will be crossed and will be wait for previous one
            // Make request
            $client = new Client();
            $response = $client->get($url);

            // check by heartbeat
            if (empty($site->check_word)) {
                SitesPingPong::create([
                    'agent_id' => $site->agent_id,
                    'site_id' => $site->id,
                    'method_hearth' => true,
                    'response_code' => $response->getStatusCode(),
                    'is_success' => $response->getStatusCode() === 200
                ]);
            } else { // Check by key word
                SitesPingPong::create([
                    'agent_id' => $site->agent_id,
                    'site_id' => $site->id,
                    'method_hearth' => true,
                    'response_code' => $response->getStatusCode(),
                    'is_success' => strpos($response->getBody(), $site->check_word) !== false
                ]);
            }
        }
    }
}
