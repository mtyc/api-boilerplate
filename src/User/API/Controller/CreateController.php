<?php

declare(strict_types=1);

namespace App\User\API\Controller;

use App\CQRS\MessengerCommandBus;
use App\User\Command\CreateUserCommand;
use App\User\Doctrine\Entity\User;
use OpenApi\Annotations as OA;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    /**
     * @Route("/api/users/create", methods={"POST"})
     * @OA\Tag(name="Users")
     * @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *             @OA\Property(property="username", example="jdoe@niepodam.pl"),
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
     *     @OA\Property(property="userId", type="string|uuid", example="a019288b-2323-4479-8667-cde863a93be1")
     * )
     * )
     * )
     *
     * @param Request $request
     * @param MessengerCommandBus $commandBus
     * @return JsonResponse
     */
    public function register(Request $request, MessengerCommandBus $commandBus): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userId = Uuid::uuid4()->toString();
        $createUser = new CreateUserCommand($userId, $data['username'], $data['password']);

        $commandBus->dispatch($createUser);

        return new JsonResponse(['userId' => $userId], 201);
    }
}