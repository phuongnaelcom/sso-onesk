<?php

namespace phuongna\onesk\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\JWTGuard;

class SSOAuthGuard extends JWTGuard
{
    public function check()
    {
        // TODO: Implement check() method.
    }

    public function guest()
    {
        // TODO: Implement guest() method.
    }

    public function id()
    {
        // TODO: Implement id() method.
    }

    public function validate(array $credentials = [])
    {
        // TODO: Implement validate() method.
    }

    public function setUser(Authenticatable $user)
    {
        // TODO: Implement setUser() method.
    }

    /**
     * Check xem có quyền vào ứng dụng không, nếu có và token đúng thì xác nhận auth
     * @return Authenticatable|null
     */
    public function user()
    {
        if ($this->user !== null) {
            return $this->user;
        }
        if ($this->jwt->setRequest($this->request)->getToken() &&
            ($payload = $this->jwt->check(true)) &&
            $this->validateSubject()
        ) {
            $checkAccess = $this->provider->checkAuthorizedApp($payload);
            if($checkAccess) {
                return $this->user = $this->provider->setUserFromJWT($payload);
            }
        }
    }
}

