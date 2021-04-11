<?php

class SeasonProvider
{
    private $con;
    private $username;

    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }

    public function create($entity)
    {
        $seasons = $entity->getSeasons();

        if (sizeof($seasons) == 0) {
            //if movie or no season
            return;
        }

        $seasonHtml = "";

        foreach ($seasons as $season) {
            $seasonNumber = $season->getSeasonNumber();

            $videoHtml = "";

            foreach ($season->getVideos() as $video) {
                $videoHtml .= $this->createVideoSquare($video);
            }

            $seasonHtml .= "<div class='season'>
                                    <h3>Season $seasonNumber</h3>
                                    <div class='videos'>
                                        $videoHtml
                                    </div>
                                </div>";
        }

        return $seasonHtml;
    }

    private function createVideoSquare($video)
    {
        $id = $video->getId();
        $thumbnail = $video->getThumbnail();
        $name = $video->getTitle();
        $description = $video->getDescription();
        $episodeNumber = $video->getEpisodeNumber();
        $hasSeen = $video->hasSeen($this->username) ? "<i class='fa fa-check-square seen'></i>" : "";

        return "<a href='watch.php?id=$id'>
                        <div class='episodeContainer'>
                            <div class='contents'>

                                <img src='$thumbnail'>

                                <div class='videoInfo'>
                                    <h4>$episodeNumber. $name</h4>
                                    <span>$description</span>
                                </div>
                                $hasSeen


                            </div>


                        </div>
                    </a>";
    }
}
