<?php
    class homepage extends page {
        public function get() {
            global $errorMas;
            $getRes = accounts::homeworkSearch();
            if (empty($errorMas)) {
                $this->html .= htmlTags::changeRow(htmlTags::headingOne("Connected Successfully"));
                $this->html .= htmlTags::changeRow('The SQL query is "SELECT * FROM accounts WHERE id < 6"');
                $this->html .= htmlTags::changeRow('There are ' . arrayFunctions::countNumber($getRes, 0) . ' records in the database');
                $this->html .= table::createTable($getRes);
            } else {
                $this->html .= htmlTags::changeRow($errorMas);
            }
        }
    }
?>