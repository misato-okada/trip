# trip

# アプリ名
旅行アプリ

## アプリの概要
旅行に関する記事閲覧やレストラン・ホテルを探して予約できるアプリ

##データベースのセットアップ

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
    phone_number VARCHAR(255) NOT NULL UNIQUE KEY,
    password VARCHAR(255) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL,
    gender VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE restauants {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    area VARCHAR(50) NOT NULL,
    type VARCHAR(50) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    open VARCHAR(50) NOT NULL,
    close VARCHAR(50) NOT NULL,
    main_img VARCHAR(255),
    contents TEXT NOT NULL,
    food_img VARCHAR(255) NOT NULL,
    interior_img VARCHAR(255) NOT NULL,
    favorite VARCHAR(50),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
};

CREATE TABLE hotels {
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    adress VARCHAR(255) NOT NULL,
    area VARCHAR(50) NOT NULL,
    type VARCHAR(50) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    main_img VARCHAR(255),
    contents TEXT NOT NULL,
    interior_img VARCHAR(255) NOT NULL,
    room_img VARCHAR(255) NOT NULL,
    favorite VARCHAR(50),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
    price VARCHAR(255) NOT NULL,
    people INT,
    contents TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_plan_hotel_id
        FOREIGN KEY (hotel_id)
        REFERENCES hotels(id)
        ON DELETE CASCADE ON UPDATE CASCADE
}

CREATE TABLE articles {
    id INT PRIMARY KEY AUTO_INCREMENT,
    area VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    main_img VARCHAR(255),
    paragraph1 TEXT NOT NULL,
    sub_img2 VARCHAR(255),
    paragraph2 TEXT NOT NULL,
    favorite VARCHAR(50),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
};

CREATE TABLE restaurant_reservation {
    id INT PRIMARY KEY AUTO_INCREMENT,
    plan_id INT NOT NULL,
    user_id INT NOT NULL,
    day DATE NOT NULL,
    people INT NOT NULL,
    price INT NOT NULL,
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

CREATE TABLE restaurant_reservation {
    id INT PRIMARY KEY AUTO_INCREMENT,
    plan_id INT NOT NULL,
    user_id INT NOT NULL,
    first_day DATE NOT NULL,
    last_day DATE NOT NULL,
    people INT NOT NULL,
    price INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_resevation_hotel_id
        FOREIGN KEY (plan_id)
        REFERENCES hotel_plans(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_resevation_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
};


```