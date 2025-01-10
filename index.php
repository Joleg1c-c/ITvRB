<?php

class Autoloader
{
    private $baseDir;

    public function __construct($baseDir)
    {
        $this->baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        spl_autoload_register([$this, 'loadClass']);
    }

    public function loadClass($className): void
    {
        $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $filePath = str_replace('_', DIRECTORY_SEPARATOR, $filePath);
        $filePath .= '.php';
        
        $fullPath = $this->baseDir . $filePath;

        if (file_exists($fullPath)) {
            require_once $fullPath;
        }
    }
}
require_once './vendor/autoload.php';
use Faker\Factory;
use App\Article;

$faker = Factory::create();

$autoloader = new Autoloader('src');
$autoloader->loadClass('User');

$user = new User();
$user->firstName = $faker->firstName;
echo $user->firstName;
echo "User: {$user->firstName}\n";


$article = new Article(1, $user->id, $faker->sentence, $faker->paragraph);
$article->title = $faker->sentence;
echo "Article: {$article->title}\n";