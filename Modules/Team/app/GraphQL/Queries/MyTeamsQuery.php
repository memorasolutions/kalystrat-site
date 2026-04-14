<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Team\GraphQL\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Modules\Team\Models\Team;

final class MyTeamsQuery
{
    /**
     * @return Collection<int, Team>
     */
    public function __invoke(mixed $root, array $args): Collection
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var Collection<int, Team> $teams */
        $teams = $user->teams;

        return $teams;
    }
}
