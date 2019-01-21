<?php 

namespace SON\View;

class ViewRenderer {

    private $pathTemplates;

    public function __contruct($pathTemplates){
        $this->pathTemplates = $pathTemplates;
    }

    public function render($name, array $data){
        extract($data);
        ob_start();
        include $this->pathTemplates . '/$name.phtml';
        $saida = ob_get_clean();
        return $saida;
    }

}
