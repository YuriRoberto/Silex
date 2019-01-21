<?php 

namespace SON\View;

class ViewRenderer {

    private $pathTemplates;

    public function __contruct($pathTemplates){
        $this->pathTemplates = $pathTemplates;
    }

    public function render($name, array $data = []){
        $content = $this->getOutput($name, $data);
        $layout = __DIR__.'/../../templates/layouts/layout.phtml';
        return $this->getOutput($layout, ['content' => $content]);
        
    }

    protected function getOutput($name, array $data = []){
        $this->templateName = $name;
        extract($data);
        ob_start();
        if(!file_exists($template)){
            include $this->pathTemplates . "/{$this->templateNmae}.phtml";
        }else{
            $this->templateName = $template;
            include $this->templateName;
        }
        $output = ob_get_clean();
        return $output;
    }

}
