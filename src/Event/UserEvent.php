<?php

declare(strict_types=1);

namespace Bolt\Event;

use Bolt\Entity\User;
use Tightenco\Collect\Support\Collection;

class UserEvent
{
    public const ON_EDIT = 'bolt.users_pre_edit';

    /** @var User */
    private $user;

    /** @var Collection */
    private $rolesOptions;

    public function __construct(User $user, ?Collection $roleOptions = null)
    {
        $this->user = $user;

        if (! $roleOptions) {
            $this->rolesOptions = collect([]);
        } else {
            $this->rolesOptions = $roleOptions;
        }
    }

    public function getContent(): User
    {
        return $this->user;
    }

    public function getRoleOptions(): Collection
    {
        return $this->rolesOptions;
    }

    public function setRoleOptions(Collection $roleOptions): void
    {
        $this->rolesOptions = $roleOptions;
    }
}
