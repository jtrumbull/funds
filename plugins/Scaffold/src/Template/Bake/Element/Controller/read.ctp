  public function read ($id = null) {
    
    $table = $this-><%= $pluralName %>;
    $<%= $singularVar %> = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments'
      ]
    ]);
    
    $this->set('<%= $singularVar %>', $<%= $singularVar %>);
    
  }
  