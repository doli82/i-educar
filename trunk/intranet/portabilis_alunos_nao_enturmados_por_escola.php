<?php

#error_reporting(E_ALL);
#ini_set("display_errors", 1);

require_once("include/portabilis/report.php");

class PortabilisRelacaoAlunosNaoEnturmados extends Report
{
  function setForm()
  {
    $this->inputsHelper()->dynamicInput(array('ano', 'instituicao'));
    $this->inputsHelper()->dynamicInput(array('escola', 'curso'), array('required' => false));
  }

  function onValidationSuccess()
  {

    if (! isset($_POST['ref_cod_escola']))
      $this->addArg('escola', 0);
    else
      $this->addArg('escola', (int)$_POST['ref_cod_escola']);
    $this->addArg('ano', (int)$_POST['ano']);
    $this->addArg('instituicao', (int)$_POST['ref_cod_instituicao']);
  }
}

$report = new PortabilisRelacaoAlunosNaoEnturmados($name = 'Rela��o de Alunos n�o Enturmados por Escola', $templateName = 'portabilis_alunos_nao_enturmados_por_escola');

$report->addRequiredField('ano','ano');
$report->addRequiredField('ref_cod_instituicao', 'instituicao');

$report->render();
?>
