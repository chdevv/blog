<?php

namespace src\view;

class ViewBase{
  private string $srcTemplate;
  private string $srcFolderTemplate;
  private $loader;
  private $twig;

  private function initTemplate(){
    $template  = $this->twig->load($this->srcTemplate);
    return $template;
  }

  private function initView(string $srcTemplate,string $srcFolderTemplate){
    $this->srcTemplate = $srcTemplate;
    $this->srcFolderTemplate = $srcFolderTemplate;
    $this->loader = new \Twig\Loader\FilesystemLoader($srcFolderTemplate);
		$this->twig = new \Twig\Environment($this->loader);
  }

  private function viewDynamics(string $srcTemplate, string $srcFolderTemplate, string $typeTemplateDinamico, array $dados, string $fileCSS){
    $this->initView($srcTemplate,$srcFolderTemplate);
    $template = $this->initTemplate();
    $this->initView($typeTemplateDinamico,"../src/templates/");
    $templateDinamico = $this->initTemplate();
    $dadosReverse = array_reverse($dados);
    $conteudoDinamicoRenderizado = $templateDinamico->render(["postagens" =>  $dadosReverse]);
    $conteudoDinamicoRenderizado = html_entity_decode($conteudoDinamicoRenderizado);
    $conteudoHtmlRenderizado = $template->render(["typeTemplateDinamico" => $conteudoDinamicoRenderizado, "fileCSS" => $fileCSS]);
    echo html_entity_decode($conteudoHtmlRenderizado);
  }


  private function viewStatic(string $srcTemplate, string $srcFolderTemplate, string $typeTemplateDinamico, string $fileCSS){
    $this->initView($srcTemplate,$srcFolderTemplate);
    $template = $this->initTemplate();
    $conteudoHtml = file_get_contents("../src/templates/" . $typeTemplateDinamico);
    $conteudoHtmlRenderizado = $template->render(["typeTemplateDinamico" => $conteudoHtml, "fileCSS" => $fileCSS]);
    echo html_entity_decode($conteudoHtmlRenderizado);
  }

  public function view(string $srcTemplate,string $srcFolderTemplate, string $typeTemplateDinamico, array $dados, string $fileCSS){
    if($dados == []){ 
      $this->viewStatic($srcTemplate, $srcFolderTemplate, $typeTemplateDinamico, $fileCSS);
    }else{
      $this->viewDynamics($srcTemplate, $srcFolderTemplate, $typeTemplateDinamico, $dados, $fileCSS);
    }
  }
}


