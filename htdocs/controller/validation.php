<?php
class Validation
{
    private $error = array();

    public function empty_check($value)
    {
        if (empty($value)) {
            $error = "この項目は入力必須です。";
            return $error;
        }
    }
}
?>
