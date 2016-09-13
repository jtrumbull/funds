<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Component: Attachment component
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Component;

use Exception;
use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

class AttachmentComponent extends Component {
  
  public function upload ($file) {
    $dest = UPLOADS . $file['name'];
    $success = move_uploaded_file($file['tmp_name'], $dest);
    if (!$success) {
      die('Upload error');
      //return false;
    }
    $attachment = new File($dest);
    die(json_encode($attachment->info()));
    die($attachment->mime());
    die(json_encode($type));
    die(json_encode([$file, $this->_randomPath($file['name'])]));
  }
  
  protected function _randomPath ($string, $level = 3) {
    if (!$string) {
      throw new Exception('First argument is not a string!', true);
    }
    $string = crc32($string);
    $decrement = 0;
    $path = null;
    for ($i = 0; $i < $level; $i++) {
      $decrement = $decrement -2;
      $path .= sprintf("%02d" . DS, substr('000000' . $string, $decrement, 2));
    }
    return $path;
  }
  
}
