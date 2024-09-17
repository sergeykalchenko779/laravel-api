<?php

namespace App\Services;

use App\Dto\SubmissionDto;
use App\Models\Submission;

class StoreSubmission
{
    public function store(SubmissionDto $dto) : void
    {
        Submission::query()->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'message' => $dto->message,
        ]);
    }
}
