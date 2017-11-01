<?php
    class homepage extends page {
        public function get() {
            $getRes = accounts::homeworkSearch();
            $this->html = print_r($getRes);
        }
    }
?>