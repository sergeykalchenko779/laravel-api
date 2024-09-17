<?php

namespace Tests\Unit;

use App\Dto\SubmissionDto;
use App\Services\StoreSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;

class SubmissionServiceTest extends \Tests\TestCase
{
    use RefreshDatabase;


    #[DataProvider('dataShouldPass')]
    public function test_store_pass(
        SubmissionDto $requestData
    ) : void {
        $service = new StoreSubmission();

        try {
            $service->store($requestData);
            $this->assertTrue(true);
        } catch (\Throwable $exception) {
            $this->assertTrue(false);
        }
    }

    #[DataProvider('dataShouldNotPass')]
    public function test_store_not_pass(
        SubmissionDto $requestData
    ) : void {
        $service = new StoreSubmission();

        try {
            $service->store($requestData);
            $this->assertTrue(false);
        } catch (\Throwable $exception) {
            $this->assertTrue(true);
        }
    }

    public static function dataShouldPass()
    {
        return [[
            new SubmissionDto(name: 'test', email: 'email1@gmail.com', message: 'Some message 1'),
            new SubmissionDto(name: 'test', email: 'email2@gmail.com', message: 'Some message 1'),
            new SubmissionDto(name: 'test', email: 'email3@gmail.com', message: 'Some message 1'),
            new SubmissionDto(name: 'test', email: 'email4@gmail.com', message: 'Some message 1'),
        ]];
    }

    public static function dataShouldNotPass()
    {
        return [[
            new SubmissionDto(name: 1, email: 'email1', message: 'Some message 1'),
            new SubmissionDto(name: 'test', email: 'email2@gmail.com', message: 1),
            new SubmissionDto(name: 'test', email: 1, message: 'Some message 1'),
        ]];
    }
}
