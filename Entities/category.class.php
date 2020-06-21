<?php //IDEA:
require_once("config/db.class.php");


class Category
{
    public $cateID;
    public $CategoryName;
    public $description;

    public function __construc($cate_name, $desc)
    {
        $this->categoryName = $cate_name;
        $this->description = $desc;
    }
    public static function list_category()
    {
        $db = new Db();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>