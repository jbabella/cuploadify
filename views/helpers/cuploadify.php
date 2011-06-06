<?php
App::import('Helper', 'Html');
class CuploadifyHelper extends AppHelper {
  
  var $helpers = array('Html');
  
  public function __construct($options = array()) {
    $this->View =& ClassRegistry::getObject('view');
    if(!isset($this->Html)){
      $this->Html = new HtmlHelper();
    }
    return parent::__construct($options);
  }
  
  private function get_script($include_scripts, $key, $default_script) {
    $script = null;

    if (in_array($key, $include_scripts)) {
      $script = $default_script;
    } else if (array_key_exists($key, $include_scripts)) {
      $script = $include_scripts[$key];
    }

    return $script;
  }
  
  function loadScripts($include_scripts){
    if (isset($include_scripts)) {
      $script = null;
      if (($script = $this->get_script($include_scripts, "jquery", "/cuploadify/js/jquery.js")) != null) 
        echo $this->Html->script($script);

      if (($script = $this->get_script($include_scripts, "uploadify_css", "/cuploadify/css/uploadify.css")) != null)
        echo $this->Html->css($script, null, array("inline"=>false));

      if (($script = $this->get_script($include_scripts, "swfobject", "/cuploadify/js/swfobject.js")) != null)
        echo $this->Html->script($script);

      if (($script = $this->get_script($include_scripts, "uploadify", "/cuploadify/js/jquery.uploadify.min.js")) != null)
        echo $this->Html->script($script);
    }
  }
}
?>
