  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny();
    $this->Auth->allow([]);
  }
  