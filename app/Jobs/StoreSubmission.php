<?php

namespace App\Jobs;

use App\Dto\SubmissionDto;
use App\Events\SubmissionSaved;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StoreSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private SubmissionDto $dto)
    {}

    /**
     * Execute the job.
     */
    public function handle(\App\Services\StoreSubmission $storeSubmission, Dispatcher $dispatcher): void
    {
        try {
            $storeSubmission->store($this->dto);
            $dispatcher->dispatch(new SubmissionSaved(dto: $this->dto));
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
        }
    }
}
