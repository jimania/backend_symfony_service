<?php
namespace App\Controller;

use App\Interfaces\Services\ShoutServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ShoutController extends AbstractController
{

    private $shout_service;

    public function __construct(ShoutServiceInterface $shout_service)
    {
        $this->shout_service = $shout_service;
    }

    public function getShout(Request $request, string $name) : JsonResponse
    {

        $limit = (int)$request->query->get('limit', false);
        //even though the description doesn't say so I assumed numbers greater than 0
        if(!$limit || $limit<0 || $limit>=10)
        {
            throw new BadRequestHttpException('Limit paramater must an integer between 1 and 10');
        }

        return $this->json(
            $this->shout_service->getShouts($name, $limit)
        );
    }
}