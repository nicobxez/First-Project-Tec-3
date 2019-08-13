<?php
/**
*
*/
class ClientC
{
  protected $article;
  protected $crud;
  protected $insert;
  protected $select;
  protected $update;
  protected $delete;

  public function __construct(UserC $article)
  {
    $this->article = $article;
    $this->insert = new InsertC($this->article);
    $this->update = new UpdateC($this->article);
    $this->select = new SelectC($this->article);
    $this->delete = new DeleteC($this->article);
    $this->crud = new CrudC($this->insert, $this->select, $this->update, $this->delete);
  }
  public function operate($action)
  {
    switch ($action) {
      case 'insert':
        return $this->crud->insert();
        break;
      case 'update':
        return $this->crud->update();
        break;
      case 'select':
        return $this->crud->select();
        break;
      case 'delete':
        return $this->crud->delete();
        break;
      default:
        throw new Exception("Error Processing Request", 1);
        break;
    }
  }
}
?>
