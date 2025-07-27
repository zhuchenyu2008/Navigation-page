<?php
// config.php
// 导航页面的配置文件

return [
    // 在这里修改页面的主标题
    'page_title' => 'AI - ChenYu',

    // 在下方的 'links' 数组中管理您的网站链接
    // 格式: ['name' => '网站名称', 'url' => '网站地址', 'description' => '简短描述'],
    // 只需要复制这个格式并修改内容，就可以添加一个新的网站卡片。
    'links' => [
        [
            'name' => 'Open WebUI',
            'url' => 'https://openwebui.zhuchenyu.cn',
            'description' => '已开放注册，使用请向zhuchenyu2008@foxmail.com寻求激活'
        ],
        [
            'name' => 'next chat',
            'url' => 'https://nextchat.zhuchenyu.cn',
            'description' => '简洁小巧，快速启动，支持自带API使用'
        ],
        // [
        //     'name' => '添加更多网站',
        //     'url' => '#',
        //     'description' => '请在 config.php 文件中添加更多网站链接。'
        // ],
        // 在这里继续添加更多网站...
        // 例如:
        // [
        //     'name' => 'Google Gemini',
        //     'url' => 'https://gemini.google.com/',
        //     'description' => '谷歌开发的多模态大型语言模型家族。'
        // ],
    ]
];

