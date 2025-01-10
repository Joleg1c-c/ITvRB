CREATE TABLE IF NOT EXISTS users (
    uuid TEXT PRIMARY KEY,
    username TEXT NOT NULL,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS posts (
    uuid TEXT PRIMARY KEY,
    author_uuid TEXT NOT NULL,
    title TEXT NOT NULL,
    text TEXT NOT NULL,
    FOREIGN KEY (author_uuid) REFERENCES users(uuid)
);

CREATE TABLE IF NOT EXISTS comments (
    uuid TEXT PRIMARY KEY,
    post_uuid TEXT NOT NULL,
    author_uuid TEXT NOT NULL,
    text TEXT NOT NULL,
    FOREIGN KEY (post_uuid) REFERENCES posts(uuid),
    FOREIGN KEY (author_uuid) REFERENCES users(uuid)
);

CREATE TABLE IF NOT EXISTS likes (
    uuid TEXT PRIMARY KEY,
    post_uuid TEXT NOT NULL,
    author_uuid TEXT NOT NULL,
    FOREIGN KEY (post_uuid) REFERENCES posts(uuid),
    FOREIGN KEY (author_uuid) REFERENCES users(uuid)
);

CREATE TABLE IF NOT EXISTS likes_comments (
    uuid TEXT PRIMARY KEY,
    comment_uuid TEXT NOT NULL,
    author_uuid TEXT NOT NULL,
    FOREIGN KEY (comment_uuid) REFERENCES comments(uuid),
    FOREIGN KEY (author_uuid) REFERENCES users(uuid)
);