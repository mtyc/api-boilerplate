<?php

declare(strict_types=1);

namespace App\User\API\Controller;

use App\Http\Payload;
use App\Http\Response;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ResettingPasswordController extends AbstractController
{
    /**
     * @Route("/api/users/passwor-change/request", methods={"POST"})
     * @OA\Tag(name="Users")
     * @OA\RequestBody()
     *
     * @param Request $request
     * @param Response $response
     * @param Payload $payload
     * @return JsonResponse
     */
    public function passwordChangeRequest(Request $request, Response $response, Payload $payload): JsonResponse
    {
        $payload = $payload->fromRequest($request);

        return new JsonResponse($payload);
    }
}