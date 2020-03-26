<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 10.05.18
 * Time: 22:57.
 */

namespace App\Service\GatewayFactory\Enett\Api;

use App\Service\SignManager;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 * Class DigestCalculator
 * Calculate Enett Message Digest from required fields marked by annotations.
 */
class DigestCalculator
{
    /**
     * @var SignManager
     */
    protected $signManager;

    /**
     * DigestCalculator constructor.
     *
     * @param SignManager $signManager
     */
    public function __construct(SignManager $signManager)
    {
        $this->signManager = $signManager;
    }

    /**
     * @param $paramsDTO
     * @param string $clientAccessKey
     *
     * @return string
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function calculateDigest($paramsDTO, string $clientAccessKey)
    {
        $messageDigestStr = $clientAccessKey . implode('', array_values($this->signManager->prepareDTO($paramsDTO)));

        return base64_encode(sha1($messageDigestStr, true));
    }
}
