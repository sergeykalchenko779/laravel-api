<?php

namespace App\Dto;

final readonly class SubmissionDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $message
    ) {}
}
