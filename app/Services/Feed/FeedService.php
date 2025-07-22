<?php

namespace App\Services\Feed;

use App\Models\Combination;

final class FeedService
{
    public function feed(array $parameter)
    {
        $pageSize = $parameter['pageSize'] ?? 10;
        $page     = $parameter['page']     ?? 1;
        return Combination::select()
            ->paginate($pageSize, ['*'], 'page', $page);
    }

}
