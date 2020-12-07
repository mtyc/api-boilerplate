<?php

declare(strict_types=1);

namespace App\User\API\Controller;

use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/api/users/register", methods={"POST"})
     * @OA\Tag(name="Users")
     * @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *             @OA\Property(property="email", example="jdoe@niepodam.pl"),
     *             @OA\Property(property="password", example="secretPasswd")
     *         )
     *     )
     * )
     * @OA\Response(
     *     response="201",
     *     description="Creates user",
     *     @OA\MediaType(
     *      mediaType="application/json",
     *     @OA\Schema(
     *     @OA\Property(property="userId", type="UUID", example="a019288b-2323-4479-8667-cde863a93be1")
     * )
     * )
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        return new JsonResponse(['userId' => 'a019288b-2323-4479-8667-cde863a93be1'], 201);
    }
}