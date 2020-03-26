<?php

namespace App\Service\GatewayFactory\Enett\DTO\Type;

class UserReference
{
    /**
     * @var string
     */
    private $Identifier;

    /**
     * @var string
     */
    private $Value;

    public function __construct(string $identifier, string $value)
    {
        $this->setIdentifier($identifier);
        $this->setValue($value);
    }

    /**
     * @param string $Identifier
     *
     * @return UserReference
     */
    private function setIdentifier(string $Identifier): self
    {
        $this->Identifier = $Identifier;

        return $this;
    }

    /**
     * @param string $Value
     *
     * @return UserReference
     */
    private function setValue(string $Value): self
    {
        $this->Value = $Value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): ?string
    {
        return $this->Identifier;
    }

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->Value;
    }
}
