<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyRequest;
use App\Jobs\StoreSubmission;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SubmissionController extends Controller
{
    public function __construct(private Dispatcher $dispatcher)
    {}

    public function store(VerifyRequest $request): JsonResponse {
        $dto = $request->getDto();
        $this->dispatcher->dispatch(new StoreSubmission($dto));

        return new JsonResponse(
            'success',
            Response::HTTP_OK
        );
    }
}
