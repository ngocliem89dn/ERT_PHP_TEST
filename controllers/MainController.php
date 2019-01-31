<?php
class MainController
{
    protected $folder;
  
    // Function show result
    function render($file, $data = array())
    {
        // Check view file
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();
            require_once('views/layouts/main.php');
        } else {
            header('Location: index.php?controller=works&action=error');
        }
    }
}
?>