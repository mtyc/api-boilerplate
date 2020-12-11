<?php

declare(strict_types=1);

namespace App\User\API\Controller;

use App\CQRS\MessengerCommandBus;
use App\User\Command\CreateUserCommand;
use App\User\Doctrine\Entity\User;
use App\User\Model\UserId;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Annotations as OA;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

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
     * @param MessengerCommandBus $commandBus
     * @return JsonResponse
     */
    public function register(Request $request, MessengerCommandBus $commandBus): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userId = new UserId(Uuid::uuid4());
        $createUser = new CreateUserCommand($userId, $data['email'], $data['password']);

        $commandBus->dispatch($createUser);

        return new JsonResponse(['userId' => $userId->toString()], 201);
    }
}