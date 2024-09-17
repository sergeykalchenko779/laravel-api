<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SubmissionControllerTest extends TestCase
{
    #[DataProvider('shouldPassData')]
    public function test_endpoint_pass(array $data): void
    {
        $response = $this->postJson(route('submission.store'),$data);

        $response->assertStatus(Response::HTTP_OK);
    }

    #[DataProvider('shouldNotPassData')]
    public function test_endpoint_not_pass(array $data): void
    {
        $response = $this->postJson(route('submission.store'),$data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function shouldPassData()
    {
        return [[
           ['name' => 'test1', 'email' => 'test1@gmail.com', 'message' => 'Message 1'],
           ['name' => 'test2', 'email' => 'test2@gmail.com', 'message' => 'Message 2'],
           ['name' => 'test3', 'email' => 'test3@gmail.com', 'message' => 'Message 3'],
        ]];
    }

    public static function shouldNotPassData()
    {
        return [[
            ['name' => 1, 'email' => 'test1@gmail.com', 'message' => 'Message 1'],
            ['name' => 'test2', 'email' => 2, 'message' => 'Message 2'],
            ['name' => 'test3', 'email' => 'test3@gmail.com', 'message' => 3],
        ]];
    }
}
