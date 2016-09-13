  public function index () {
    $<%= $pluralVar %> = $this-><%= $pluralName %>->find()->contain([
      'Comments',
      'Attachments',
    ]);
    $this->set('<%= $pluralVar %>', $<%= $pluralVar %>);
  }
  