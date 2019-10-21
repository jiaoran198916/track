<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support1@example.com',
    'doubanurl' => 'https://movie.douban.com/subject/',
    'cdnHost' => 'http://cdn.jiaoran.net/',
    'user.passwordResetTokenExpire' => 3600,
    'movieStatus' => ['0' =>'待审核','1' => '已发布'],
    'resourceStatus' => ['0' =>'下线','1' => '已发布','2' => '已删除'],
    'resourceType' => ['0' =>'歌曲','1' => '电影','2' => '其他'],
    'awardsItems' => [
        '1' => '最佳原创歌曲',
        '2' => '最佳配乐',
        //奥斯卡金像奖
        '3' => '最佳原创配乐',
        '4' => '最佳原创歌曲',
    ],
    'qiniu' => [
        'accessKey' => 'nGQY8IhK9TlB1P6n_jxZltkiiGPorSO7z1E3OLtE',
        'secretKey' => 'YRrAQonHa1XSc6iG6do7f_KgZ41uHOii3HRaQj5J',
        'domain' => 'http://cdn.jiaoran.net/',
        'bucket' => 'track',
    ],
];
