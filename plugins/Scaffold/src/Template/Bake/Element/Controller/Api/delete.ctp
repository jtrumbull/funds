  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this-><%= $pluralName %>;
    $<%= $singularVar %> = $table->get($id);
    $success = $table->delete($<%= $singularVar %>);
    
    if (!$success) {
      $this->set('error', 'Could not delete <%= $singularWord %>');  
    }
    
    $this->set('<%= $singularVar %>', $<%= $singularVar %>);
    $this->set('_serialize', ['<%= $singularVar %>', 'error']);
    
  }
  