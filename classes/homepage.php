<?php
    class homepage extends page {
        public function get() {
            $this->html .= accounts::findAll();
        }
    }
?>