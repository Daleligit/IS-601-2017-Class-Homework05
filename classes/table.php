<?php
    class table {
        static public function createTable($inputArray) {
            $table = htmlTags::tableHead('displayTable');
            foreach ($inputArray as $key => $line) {
                foreach ($line as $columns => $value) {
                    $table .= htmlTags::tableLineStart();
                    if ($key == 0) {
                        $table .= htmlTags::tableTitle($value);
                    } else {
                        $table .= htmlTags::tableDetail($value);
                    }
                    $table .= htmlTags::tableLineEnd();
                }
            }
            $table = htmlTags::tableEnd();
            return $table;
        }
}