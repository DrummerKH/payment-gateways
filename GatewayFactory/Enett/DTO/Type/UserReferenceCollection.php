<?php

namespace App\Service\GatewayFactory\Enett\DTO\Type;

class UserReferenceCollection
{
    /**
     * @var UserReference[]
     */
    private $UserReferences = [];

    /**
     * UserReferenceCollection constructor.
     *
     * @param UserReference[] $UserReferences
     */
    public function __construct($UserReferences = [])
    {
        foreach ($UserReferences as $reference) {
            $this->setUserReferences($reference);
        }
    }

    /**
     * @return null|array
     */
    public function getUserReferences(): ?array
    {
        return $this->UserReferences;
    }

    /**
     * @param UserReference $UserReferences
     *
     * @return UserReferenceCollection
     */
    public function setUserReferences(UserReference $UserReferences): self
    {
        $this->UserReferences[] = $UserReferences;

        return $this;
    }
}
