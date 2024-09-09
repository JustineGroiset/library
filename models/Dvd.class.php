<?php
    class Dvd{
        private string $titleDvd;
        private string $imageDvd;

        public function __construct($titleDvd, $imageDvd){
            $this->titleDvd = $titleDvd;
            $this->imageDvd = $imageDvd;
        }

        public function getTitleDvd(){
            return $this->titleDvd;
        }
        public function setTitleDvd(string $titleDvd){
            $this->titleDvd = $titleDvd;
        }

        public function getImageDvd(){
            return $this->imageDvd;
        }
        public function setImageDvd(string $imageDvd){
            $this->imageDvd = $imageDvd;
        }



    }
?>