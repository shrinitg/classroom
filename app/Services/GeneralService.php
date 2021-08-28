<?php


namespace App\Services;


use Illuminate\Support\Facades\Hash;
use App\ModelRepo\IUserRepo;
use Illuminate\Http\JsonResponse;

class GeneralService {

    /**
     * @var $userRepo
     */
    private $userRepo;
    /**
     * GeneralService constructor.
     * @param IUserRepo $userRepo
     */
    public function __construct(IUserRepo $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function prepareRegisterData($data): array {
        return [
            'username'    => $data->username,
            'name'        => $data->name,
            'email'       => $data->email,
            'password'    => Hash::make($data->password),
            'profile_pic' => null
        ];
    }

    public function findUserByEmail($email): bool {
        $user = $this->userRepo->findEmail($email);
        return (bool)$user;
    }

    public function createUser($data): bool {
        $user = $this->userRepo->insertUser($data);
        return (bool)$user;
    }

    public function internalServerException($e): JsonResponse {
            return response()->json([
                'status' => false,
                'msg'    => 'Internal server error' . $e->getMessage(),
                'error'  => $e->getTrace(),
            ], 500);
    }

    public function getHashed($email): string {
        return $this->userRepo->getHashed($email);
    }
}
