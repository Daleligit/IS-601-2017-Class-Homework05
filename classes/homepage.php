<?php
    class homepage extends page {
        public function get() {
            $connErr = '';
            $sqlErr = '';
            $getRes = accounts::homeworkSearch($connErr, $sqlErr);
            if (empty($connErr)) {
                $this->html .= htmlTags::changeRow(htmlTags::headingOne("Connected Successfully"));
                if (empty($sqlErr)) {
                    $this->html .= htmlTags::changeRow('The SQL query is "SELECT * FROM accounts WHERE id < 6"');
                    $this->html .= htmlTags::changeRow('There are ' . arrayFunctions::countNumber($getRes, 0) . ' records in the database');
                    $this->html .= table::createTable($getRes);
                } else {
                    $this->html .= htmlTags::changeRow($sqlErr);
                }
            } else {
                $this->html .= htmlTags::changeRow($connErr);
            }
        }
    }
?>