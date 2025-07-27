<?php
// 包含并加载配置文件
// The script will look for a file named 'config.php' in the same directory.
$config_path = __DIR__ . '/config.php';

if (file_exists($config_path)) {
    $config = include $config_path;
} else {
    // Fallback if config file is missing
    $config = [
        'page_title' => '导航页配置错误',
        'links' => [
            ['name' => '错误', 'url' => '#', 'description' => '找不到 config.php 文件。请确保它与 index.php 在同一个目录下。']
        ]
    ];
}

$page_title = htmlspecialchars($config['page_title'] ?? '导航页');
$links = $config['links'] ?? [];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* CSS Reset and Basic Setup */
        :root {
            --bg-color: #121212;
            --card-color: #1e1e1e;
            --text-color: #e0e0e0;
            --text-muted-color: #888888;
            --border-color: #333333;
            --accent-color: #ffffff;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Noto Sans SC', 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        /* Main Container */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 6rem 2rem;
            text-align: center;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Title */
        .main-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem); /* Responsive font size */
            font-weight: 500;
            margin-bottom: 1rem;
            animation: fadeInDown 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        .subtitle {
            font-size: 1.1rem;
            font-weight: 300;
            color: var(--text-muted-color);
            margin-bottom: 5rem;
            animation: fadeInDown 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.2s forwards;
            opacity: 0; /* Start hidden for animation */
            animation-fill-mode: both; /* Retain state after animation */
        }
        
        /* Links Grid Layout */
        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.75rem;
            text-align: left;
        }

        /* Card Styling */
        .card {
            background: var(--card-color);
            border-radius: 12px;
            text-decoration: none;
            color: inherit;
            border: 1px solid var(--border-color);
            display: block;
            overflow: hidden;
            position: relative;
            
            /* Animation setup */
            opacity: 0;
            transform: translateY(25px);
            animation: fadeInUp 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;

            /* Smooth transition for hover effects */
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
            border-color: var(--accent-color);
        }

        .card-content {
            padding: 1.75rem;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .card-description {
            font-size: 0.95rem;
            font-weight: 300;
            color: var(--text-muted-color);
            line-height: 1.6;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 4rem 1rem;
            }
            .main-title {
                margin-bottom: 3rem;
            }
            .links-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <main class="container">
        <header>
            <h1 class="main-title"><?php echo $page_title; ?></h1>
            <p class="subtitle">请选择你要前往的站点</p>
        </header>

        <div class="links-grid">
            <?php foreach ($links as $index => $link): ?>
                <a href="<?php echo htmlspecialchars($link['url']); ?>" target="_blank" rel="noopener noreferrer" class="card" style="animation-delay: <?php echo $index * 120 + 400; ?>ms;">
                    <div class="card-content">
                        <h2 class="card-title"><?php echo htmlspecialchars($link['name']); ?></h2>
                        <p class="card-description"><?php echo htmlspecialchars($link['description']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>
