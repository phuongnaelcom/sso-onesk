<?php

namespace phuongna\onesk\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\JWTGuard;

class SSOAuthGuard extends JWTGuard
{
    public function check()
    {
        // TODO: Implement check() method.
        return ! is_null($this->user());
    }

    public function guest()
    {
        // TODO: Implement guest() method.
        parent::guest();
    }

    public function id()
    {
        // TODO: Implement id() method.
        parent::id();
    }

    public function validate(array $credentials = [])
    {
        // TODO: Implement validate() method.
        parent::validate($credentials);
    }

    public function setUser(Authenticatable $user)
    {
        // TODO: Implement setUser() method.
        parent::setUser($user);
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

