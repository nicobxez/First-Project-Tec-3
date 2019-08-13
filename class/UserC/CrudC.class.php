<?php
/**
 *
 */
class CrudC
{
  protected $insert;
  protected $select;
  protected $update;
  protected $delete;

  public function __construct(InsertC $insertC, SelectC $selectC,
    UpdateC $updateC, DeleteC $deleteC)
  {
    $this->insert = $insertC;
    $this->select = $selectC;
    $this->update = $updateC;
    $this->delete = $deleteC;
  }

  public function insert()
  {
    return $this->insert->exec();
  }

  public function select()
  {
    return $this->select->exec();
  }

  public function update()
  {
    return $this->update->exec();
  }

  public function delete()
  {
    return $this->delete->exec();
  }
}
 ?>
