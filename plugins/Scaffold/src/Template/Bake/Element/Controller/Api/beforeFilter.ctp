  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allow();
  }
  