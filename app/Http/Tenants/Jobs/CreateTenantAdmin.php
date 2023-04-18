<?php

namespace Gurulabs\Http\Tenants\Jobs;

use Illuminate\Bus\Queueable;
use Gurulabs\Domain\Users\User;
use Gurulabs\Domain\Tenants\Tenant;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateTenantAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Tenant $tenant)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function ($tenant) {
            User::create($tenant->only('name', 'email', 'password'));
        });
    }
}
