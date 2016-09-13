  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this-><%= $pluralName %>;
    $<%= $singularVar %> = $table->get($id);
    
    $this->set('<%= $singularVar %>', $<%= $singularVar %>);
    $this->set('_serialize', ['<%= $singularVar %>']);
    
  }
  