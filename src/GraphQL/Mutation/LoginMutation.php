<?php


namespace App\GraphQL\Mutation;


use App\Entity\User;
use App\Service\Api\UserApiService;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface as AliasedInterfaceAlias;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class LoginMutation implements MutationInterface, AliasedInterfaceAlias
{
    /**
     * @var EntityManager $em
     */
    private $em;
    /**
     * @var UserApiService $userApiService
     */
    private $userApiService;
    public function __construct(EntityManager $em, UserApiService $userApiService)
    {
        $this->em = $em;
        $this->userApiService = $userApiService;
    }

    public function login(Argument $argument)
    {
        return $this->userApiService->login($argument);
    }

    public static function getAliases(): array
    {
        return [
            'login' => 'login'
        ];
    }

}