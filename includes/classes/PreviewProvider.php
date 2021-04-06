<?php

class PreviewProvider
{
    private $con;
    private $username;

    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }

    public function createPreviewVideo($entity)
    {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        }

        //by when we get here we will have an entity object random or not

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();

        //To set SubTitle



        return "<div class='previewContainer'>
                  <img src='$thumbnail' class='previewImage' hidden >
                  <video autoplay muted class='previewVideo' onended='previewEnded()'>
                        <source src='$preview' type='video/mp4'>
                    </video>

                    <div class='previewOverlay'>
                        <div class='mainDetails'>
                            <h3>$name</h3>

                            <div class='button'>
                                <button><i class='fa fa-play' aria-hidden='true'></i> Play</button>
                                <button onClick='volumeToggle(this)'><i class='fa fa-volume-off' aria-hidden='true'></i></button>

                            </div>

                        <div>

                    </div>

                <div>";
    }

    private function getRandomEntity()
    {
        //get random entity

        $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        //put the data in a entity object
        return new Entity($this->con, $row);
    }
}
