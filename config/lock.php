<?php

return [
    'ttl_minutes' => env('LOCK_TTL_MINUTES', '5'),   // 排他保持期間（分）
    'refresh_interval_minutes' => env('LOCK_REFRESH_INTERVAL_MINUTES', '3'),   // 排他保持更新間隔(分)
];
