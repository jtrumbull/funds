  protected function _prepare ($data) {
    
    // System generated fields
    
    $blacklist = [ 
      'created',
      'modified',
      'created_by',
      'modified_by' 
    ];
    
    foreach ($blacklist as $key) {
      if (array_key_exists($key, $data)) {
        unset($data[$key]);
      }
    }
    
    // Datetime formatting
    
    $datetimes = [
      'created',
      'modified' 
    ];
    
    foreach ($datetimes as $key) {
      if (array_key_exists($key, $data) && $data[$key]) {
        $data[$key] = date("Y-m-d H:i:s", $data[$key]);
      }
    }
    
    // Date formatting
    
    $dates = [
    ];
    
    foreach ($dates as $key) {
      if (array_key_exists($key, $data) && $data[$key]) {
        $data[$key] = date("Y-m-d H:i:s", $data[$key]);
      }
    }
    
    return $data;
    
  }
  