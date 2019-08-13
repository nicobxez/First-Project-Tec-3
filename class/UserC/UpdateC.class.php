<?php
/**
*
*/
class UpdateC implements iCommandC
{
  protected $article;

  public function __construct(UserC $article)
  {
    $this->article = $article;
  }

  public function exec()
  {
    return $this->article->update();
  }
}
?>
