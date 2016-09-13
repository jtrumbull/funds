  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this-><%= $pluralName %>;
    $<%= $pluralVar %> = $table->find();
    
    $this->set('<%= $pluralVar %>', $<%= $pluralVar %>);
    $this->set('_serialize', ['<%= $pluralVar %>']);
    
  }
  