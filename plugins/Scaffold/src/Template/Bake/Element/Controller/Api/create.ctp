  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this-><%= $pluralName %>;
    $<%= $singularVar %> = $table->newEntity($data);
    $success = $table->save($<%= $singularVar %>);
    
    if (!$success) {
      $this->set('error', 'Could not save <%= $singularWord %>');  
    }
    
    $this->set('<%= $singularVar %>', $<%= $singularVar %>);
    $this->set('_serialize', ['<%= $singularVar %>', 'error']);
    
  }
  