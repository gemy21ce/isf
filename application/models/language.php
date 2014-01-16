<?php
class Language extends DataMapper {
    var $table = 'languages';
    var $model = 'language';
    var $has_many = array("content");
    function __construct() {

        parent::__construct();

    }
}
?>