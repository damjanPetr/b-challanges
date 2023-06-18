<?php

require_once './Connection.php';

use \Database\Connection;

try {
    $table = "
        CREATE TABLE `temp` (
        `coverImg` varchar(255) NOT NULL,
        `mainPageTitle` varchar(255) NOT NULL,
        `subtitleOfPage` varchar(255) NOT NULL,
        `about` text NOT NULL,
        `telNumber` varchar(255) NOT NULL,
        `Location` varchar(255) NOT NULL,
        `servicesOrProducts` varchar(255) NOT NULL,
        `imgUrl1` varchar(255) NOT NULL,
        `descService1` varchar(255) NOT NULL,
        `imgUrl2` varchar(255) NOT NULL,
        `descService2` varchar(255) NOT NULL,
        `imgUrl3` varchar(255) NOT NULL,
        `descService3` varchar(255) NOT NULL,
        `linkedin` text NOT NULL,
        `facebook` varchar(255) NOT NULL,
        `twitter` varchar(255) NOT NULL,
        `instagram` varchar(255) NOT NULL,
        `id` int(11) NOT NULL
        )
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        ALTER TABLE `temp`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `temp`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
        COMMIT;";

    $conn = new Connection();
    $connection = $conn->getConnection();
    $connection->exec($table);
    $conn->destroy();
} catch (\Throwable $e) {
    echo $e;
}
