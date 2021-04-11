<?php
    class Entity{

        //data from database or the entity id
        private $con, $sqlData;

       public function __construct($con, $input) {
        $this->con = $con;

        //means we didnt pass an entity id but we passed a sql data
        if(is_array($input)){
            $this->sqlData = $input;

        }
        else {
            $query = $this->con->prepare("SELECT * FROM entities WHERE id=:id");
            $query->bindValue(":id", $input);
            $query->execute();


            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }
       }

       public function getId() {
           return $this->sqlData["id"];
       }


       public function getName() {
        return $this->sqlData["name"];
    }

    public function getThumbnail() {
        return $this->sqlData["thumbnail"];
    }

    public function getPreview() {
        return $this->sqlData["preview"];
    }

    public function getCategoryId() {
        return $this->sqlData["categoryId"];
    }

    public function getSeasons(){
        $query = $this->con->prepare("SELECT * FROM videos WHERE entityId=:id 
        AND isMovie=0 ORDER BY season, episode ASC");
        $query->bindValue(":id", $this->getId());
        $query->execute();

        //when seasons change we start a new video array
        $seasons = array();
        $videos = array();
        $currentSeason = null;

        //each season will have prop to split  videos array
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            if($currentSeason != null && $currentSeason != $row["season"] ) {
                //if season is different it creates another videos array
                $seasons[] = new Season($currentSeason, $videos);
                $videos = array();
            }
            //if not it adds the video in the videos array
            $currentSeason = $row["season"];
            $videos[] = new Video($this->con, $row);
        }

        if(sizeof($videos) != 0) {
            $seasons[] = new Season($currentSeason, $videos);

        }

        return $seasons;
    }
      
    }

?>