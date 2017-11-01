<?php
    class homepage extends page {
        public function get() {
            global $errorMas;
            $getRes = accounts::homeworkSearch();
            if (empty($errorMas)) {
                $this->html .= htmlTags::changeRow(htmlTags::headingOne("Connected Successfully"));
                $this->html .= print_r($getRes,true);
            } else {
                $this->html .= htmlTags::changeRow($errorMas);
            }
        }
    }
?>