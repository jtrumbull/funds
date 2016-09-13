  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this-><%= $pluralName %>;
    $<%= $singularVar %> = $table->get($id);
    $<%= $singularVar %> = $table->patchEntity($<%= $singularVar %>, $data);
    $success = $table->save($<%= $singularVar %>);
    
    if (!$success) {
      $this->set('error', 'Could not save <%= $singularWord %>');  
    }
    
    $this->set('<%= $singularVar %>', $<%= $singularVar %>);
    $this->set('_serialize', ['<%= $singularVar %>', 'error']);
    
  }
  