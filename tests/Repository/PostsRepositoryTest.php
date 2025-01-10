<?php

declare(strict_types=1);

use App\Exception\PostNotFoundException;
use App\Model\Post;
use App\Repository\Interfaces\PostsRepositoryInterface;
use App\Repository\PostsRepository;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Uid\Uuid;

class PostsRepositoryTest extends TestCase
{
    private PostsRepositoryInterface $postsRepository;

    private static LoggerInterface $logger;

    private static Uuid $uuid;

    private static Uuid $authorUuid;

    public function setUp(): void
    {
        $pdo = new PDO('sqlite:' . './../../my_database.sqlite');
        self::$logger = new Logger('my_logger_test', [new StreamHandler(__DIR__ . '/../../logs/test.log')]);
        $this->postsRepository = new PostsRepository($pdo, self::$logger);
        if (!isset(self::$uuid)) {
            self::$uuid = Uuid::v4();
            self::$authorUuid = Uuid::v4();
        }
    }

    public function test_savePost(): void
    {
        $post = new Post(
            self::$uuid,
            self::$authorUuid,
            'Test title',
            'Test text'
        );
        $this->assertTrue($this->postsRepository->save($post));
    }

    public function test_getPost(): void
    {
        $post = new Post(
            self::$uuid,
            self::$authorUuid,
            'Test title',
            'Test text'
        );

        $postDb = $this->postsRepository->get((string) self::$uuid);
        var_dump($postDb);
        var_dump($post);

        $this->assertEquals($post, $postDb);
    }

    public function test_getPostWithException(): void
    {
        $this->expectException(PostNotFoundException::class);

        $this->postsRepository->get('123');
    }
}
