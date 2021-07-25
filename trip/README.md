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
    adress VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL,
    sex TINYINT(1) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE restaurants {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    prefecture_id INT NOT NULL,
    type_id INT NOT NULL,
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
        REFERENCES restaurant_type(id)
        ON DELETE CASCADE ON UPDATE CASCADE
};

CREATE TABLE hotels {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    prefecture_id INT NOT NULL,
    type_id INT NOT NULL,
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
        REFERENCES hotel_type(id)
        ON DELETE CASCADE ON UPDATE CASCADE
};

CREATE TABLE restaurant_plans {
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
};

CREATE TABLE hotel_plans {
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
}

CREATE TABLE restaurant_reservation {
    id INT PRIMARY KEY AUTO_INCREMENT,
    plan_id INT NOT NULL,
    user_id INT NOT NULL,
    day DATE NOT NULL,
    time TIME NOT NULL,
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
        ON DELETE CASCADE ON UPDATE CASCADE,
};

CREATE TABLE hotel_reservation {
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
    CONSTRAINT fk_resevation_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
};

CREATE TABLE areas {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
};

CREATE TABLE prefectures {
    id INT PRIMARY KEY AUTO_INCREMENT,
    area_id INT NOT NULL,
    name VARCHAR(10) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_prefectures_area_id
        FOREIGN KEY (area_id)
        REFERENCES areas(id)
        ON DELETE CASCADE ON UPDATE CASCADE
};

CREATE TABLE restaurant_type {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
};

CREATE TABLE hotel_type {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
};

CREATE TABLE favorite_restaurants {
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_favorite_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_favorite_restaurant_id
        FOREIGN KEY (restaurant_id)
        REFERENCES restaurants(id)
        ON DELETE CASCADE ON UPDATE CASCADE
};

CREATE TABLE favorite_hotels {
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    hotel_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_favorite_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_favorite_hotel_id
        FOREIGN KEY (hotel_id)
        REFERENCES hotels(id)
        ON DELETE CASCADE ON UPDATE CASCADE
};

CREATE TABLE articles {
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
};

```