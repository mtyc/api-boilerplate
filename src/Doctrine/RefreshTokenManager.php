<?php

declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\Persistence\ObjectManager;
use Gesdinet\JWTRefreshTokenBundle\Doctrine\RefreshTokenManager as RefreshTokenManagerBase;

class RefreshTokenManager extends RefreshTokenManagerBase
{
    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);
        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }}