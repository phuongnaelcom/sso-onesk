<?php

namespace phuongna\onesk;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use \Illuminate\Support\ServiceProvider as OriginServiceProvider;

class OneSKAuthServiceProvider extends OriginServiceProvider implements UserProvider
{
    /**
     * OneSKAuthServiceProvider constructor.
     * @param $app
     */
    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function retrieveById($identifier)
    {
        // TODO: Implement retrieveById() method.
    }

    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }

    public function retrieveByCredentials(array $credentials)
    {
        // TODO: Implement retrieveByCredentials() method.
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // TODO: Implement validateCredentials() method.
    }

    /**
     * @param $payload
     * @return bool
     */
    public function checkAuthorizedApp($payload): bool
    {
        $can_access = $payload->get('can_access');
        if(!is_null($can_access)) {
            foreach ($can_access as $access) {
                if ($access['code'] == trim(config('onesk.unique_code'))) return true;
            }
        }
        return false;
    }

    /**
     * @param $payload
     * @return Customer|User|array
     */
    public function setUserFromJWT($payload)
    {
        $user = null;
        $model_type = $payload->get('model_type');
        $model_id = $payload->get('model_id');
        if ($model_type == Customer::class) {
            $user = new Customer();
            $user->id = $model_id;
        }
        if ($model_type == User::class) {
            $user = new User();
            $user->id = $model_id;
        }
        return $user;
    }
}
