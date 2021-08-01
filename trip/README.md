# trip

# アプリ名
旅行アプリ

## アプリの概要
旅行に関する記事閲覧やレストラン・ホテルを探して予約できるアプリ

## データベースのセットアップ

```sql
-- データベースの作成
CREATE DATABASE trip;

-- ユーザーとパスワードの設定
CREATE USER trip_admin IDENTIFIED BY '1010';

-- すべての権限を付与
GRANT ALL ON trip.* TO trip_admin;

-- テーブルの作成
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE KEY,
    phone_number VARCHAR(11) NOT NULL UNIQUE KEY,
    password VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL,
    sex TINYINT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE restaurants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    address VARCHAR(255) NOT NULL,
    prefecture_id INT NOT NULL,
    restaurant_type_id INT NOT NULL,
    phone_number VARCHAR(11) NOT NULL,
    opening_time CHAR(4) NOT NULL,
    closing_time CHAR(4) NOT NULL,
    closing_day VARCHAR(50) NOT NULL,
    main_img VARCHAR(255),
    contents TEXT NOT NULL,
    food_img VARCHAR(255) NOT NULL,
    interior_img VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_restaurants_prefecture_id
        FOREIGN KEY (prefecture_id)
        REFERENCES prefectures(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_restaurants_type_id
        FOREIGN KEY (type_id)
        REFERENCES restaurant_types(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE hotels (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    address VARCHAR(255) NOT NULL,
    prefecture_id INT NOT NULL,
    hotel_type_id INT NOT NULL,
    phone_number VARCHAR(11) NOT NULL,
    minimum_amount INT NOT NULL,
    main_img VARCHAR(255),
    contents TEXT NOT NULL,
    interior_img VARCHAR(255) NOT NULL,
    room_img VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_hotels_prefecture_id
        FOREIGN KEY (prefecture_id)
        REFERENCES prefectures(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_hotels_type_id
        FOREIGN KEY (type_id)
        REFERENCES hotel_types(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE restaurant_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    restaurant_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    contents TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_plan_restaurant_id
        FOREIGN KEY (restarurant_id)
        REFERENCES restaurants(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE hotel_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hotel_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    m_n_o_p INT NOT NULL,
    contents TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_plan_hotel_id
        FOREIGN KEY (hotel_id)
        REFERENCES hotels(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE restaurant_reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    plan_id INT NOT NULL,
    user_id INT NOT NULL,
    reserve_day DATE NOT NULL,
    reserve_time TIME NOT NULL,
    people INT NOT NULL,
    price INT NOT NULL,
    total_amount INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_resevation_restaurant_id
        FOREIGN KEY (plan_id)
        REFERENCES restaurant_plans(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_resevation_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE hotel_reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    plan_id INT NOT NULL,
    user_id INT NOT NULL,
    first_day DATE NOT NULL,
    last_day DATE NOT NULL,
    people INT NOT NULL,
    price INT NOT NULL,
    total_amount INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_resevation_hotel_id
        FOREIGN KEY (plan_id)
        REFERENCES hotel_plans(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_hotel_resevation_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE areas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE prefectures (
    id INT PRIMARY KEY AUTO_INCREMENT,
    area_id INT NOT NULL,
    name VARCHAR(10) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_prefectures_area_id
        FOREIGN KEY (area_id)
        REFERENCES areas(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE restaurant_types (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE hotel_types (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE favorite_restaurants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_favorite_restaurants_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_favorite_restaurant_id
        FOREIGN KEY (restaurant_id)
        REFERENCES restaurants(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE favorite_hotels (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    hotel_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_favorite_hotels_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_favorite_hotel_id
        FOREIGN KEY (hotel_id)
        REFERENCES hotels(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    prefecture_id INT NOT NULL,
    restaurant_id INT,
    hotel_id INT,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    main_img VARCHAR(255),
    paragraph1 TEXT NOT NULL,
    sub_img2 VARCHAR(255),
    paragraph2 TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_articles_prefecture_id
        FOREIGN KEY (prefecture_id)
        REFERENCES prefectures(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_articles_restaurant_id
        FOREIGN KEY (restaurant_id)
        REFERENCES restaurants(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_articles_hotel_id
        FOREIGN KEY (hotel_id)
        REFERENCES hotels(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- 初期データ設定
INSERT INTO
    areas (name)
VALUES
    ('北海道・東北'),
    ('関東'),
    ('北陸'),
    ('甲信越'),
    ('東海'),
    ('近畿'),
    ('中国地方'),
    ('四国'),
    ('九州・沖縄')
;

INSERT INTO
    prefectures (area_id, name)
VALUES
    (1, '北海道'),
    (1, '青森'),
    (1, '岩手'),
    (1, '宮城'),
    (1, '秋田'),
    (1, '山形'),
    (1, '福島'),
    (2, '茨城'),
    (2, '栃木'),
    (2, '群馬'),
    (2, '埼玉'),
    (2, '千葉'),
    (2, '東京'),
    (2, '神奈川'),
    (4, '新潟'),
    (3, '富山'),
    (3, '石川'),
    (3, '福井'),
    (4, '山梨'),
    (4, '長野'),
    (5, '岐阜'),
    (5, '静岡'),
    (5, '愛知'),
    (5, '三重'),
    (6, '滋賀'),
    (6, '京都'),
    (6, '大阪'),
    (6, '兵庫'),
    (6, '奈良'),
    (6, '和歌山'),
    (7, '鳥取'),
    (7, '島根'),
    (7, '岡山'),
    (7, '広島'),
    (7, '山口'),
    (8, '徳島'),
    (8, '香川'),
    (8, '愛媛'),
    (8, '高知'),
    (9, '福岡'),
    (9, '佐賀'),
    (9, '長崎'),
    (9, '熊本'),
    (9, '大分'),
    (9, '宮崎'),
    (9, '鹿児島'),
    (9, '沖縄')
;

INSERT INTO
    restaurant_types (name)
VALUES
    ('和食'),
    ('中華'),
    ('フレンチ'),
    ('イタリアン'),
    ('スイーツ'),
    ('B級グルメ'),
    ('その他')
;

INSERT INTO
    hotel_types (name)
VALUES
    ('シティホテル'),
    ('ビジネスホテル'),
    ('温泉旅館'),
    ('リゾートホテル'),
    ('高級ホテル・旅館'),
    ('ドミトリー'),
    ('キャンプ・グランピング'),
    ('ペット同伴OK')
;

```