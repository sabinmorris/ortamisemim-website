<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Anouncement;
use Illuminate\Console\Command;

class AutoDeactivateStatus extends Command
{
    protected $signature = 'status:auto-deactivate';
    protected $description = 'Automatically set status to 0 after one month';

    public function handle()
    {
        $oneMonthAgo = Carbon::now()->subMonth();

        // Update all records older than 1 month
        $updated = Anouncement::where('status', 1)
            ->where('created_at', '<=', $oneMonthAgo)
            ->update(['status' => 0]);

        $this->info(" {$updated} record(s) updated to inactive.");
    }
}
