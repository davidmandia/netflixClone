<?php

class EntityProvider
{
    //getting entities within a limit
    public static function getEntities($con, $categoryId, $limit)
    {
        $sql = "SELECT * FROM entities ";

        if ($categoryId != null) {
            $sql .= "WHERE categoryId=:categoryId ";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $con->prepare($sql);

        if ($categoryId != null) {
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            //put the item in the next available space
            $result[] = new Entity($con, $row);
        }

        return $result;
    }

    public static function getTVShowEntities($con, $categoryId, $limit)
    {
        $sql = "SELECT DISTINCT (entities.id) FROM entities 
        inner join videos on entities.id = videos.entityId
        where videos.isMovie = 0 ";

        if ($categoryId != null) {
            $sql .= "AND categoryId=:categoryId ";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $con->prepare($sql);

        if ($categoryId != null) {
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            //put the item in the next available space
            $result[] = new Entity($con, $row["id"]);
        }

        return $result;
    }

    public static function getMoviesEntities($con, $categoryId, $limit)
    {
        $sql = "SELECT DISTINCT (entities.id) FROM entities 
        inner join videos on entities.id = videos.entityId
        where videos.isMovie = 1 ";

        if ($categoryId != null) {
            $sql .= "AND categoryId=:categoryId ";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $con->prepare($sql);

        if ($categoryId != null) {
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            //put the item in the next available space
            $result[] = new Entity($con, $row["id"]);
        }

        return $result;
    }


    public static function getSearchEntities($con, $term)
    {
        $sql = "SELECT * FROM entities WHERE name LIKE CONCAT('%', :term '%') LIMIT 30";



        $query = $con->prepare($sql);



        $query->bindValue(":term", $term);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            //put the item in the next available space
            $result[] = new Entity($con, $row);
        }

        return $result;
    }
}
