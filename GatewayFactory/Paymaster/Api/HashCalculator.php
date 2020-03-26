<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 13:13.
 */

namespace App\Service\GatewayFactory\Paymaster\Api;


use App\Service\SignManager;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class HashCalculator
{
    /**
     * @var SignManager
     */
    protected $signManager;

    /**
     * HashCalculator constructor.
     *
     * @param SignManager $signManager
     */
    public function __construct(SignManager $signManager)
    {
        $this->signManager = $signManager;
    }

    /**
     * @param $DTO
     * @param string $password
     *
     * @return string
     * @throws ExceptionInterface
     *
     * @throws ReflectionException
     */
    public function calculateHash($DTO, string $password): string
    {
        $sorted = array_values($this->signManager->prepareDTO($DTO));
        array_splice($sorted, 1, 0, $password);

        return base64_encode(sha1(implode(';', $sorted), true));
    }
}
