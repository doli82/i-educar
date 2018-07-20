<?php

namespace Tests\unit\Educacenso;

use iEducar\Modules\Educacenso\Model\DependenciaAdministrativaEscola;
use iEducar\Modules\Educacenso\Model\ModalidadeTurma;
use iEducar\Modules\Educacenso\Model\TipoAtendimentoTurma;
use iEducar\Modules\Educacenso\Model\TipoMediacaoDidaticoPedagogico;
use iEducar\Modules\Educacenso\ValueTurmaMaisEducacao;
use Tests\SuiteTestCase\TestCase;

class ValueTurmaMaisEducacaoTest extends TestCase
{
    public function testTurmaNaoPresencialValueNull()
    {
        $value = $this->getValueObject();
        $value->setTipoMediacao(2);
        $this->assertEquals(null, $value->getValue());
    }

    public function testDependenciaAdministrativaInvalidoValueNull()
    {
        $value = $this->getValueObject();
        $value->setDependenciaAdministrativa(1);
        $this->assertEquals(null, $value->getValue());
    }

    public function testTipoAtendimentoInvalidoValueNull()
    {
        $value = $this->getValueObject();
        $value->setTipoAtendimento(TipoAtendimentoTurma::CLASSE_HOSPITALAR);
        $this->assertEquals(null, $value->getValue());
    }

    public function testTipoAtendimentoValidoModalidadeInvalidaValueNull()
    {
        $value = $this->getValueObject();
        $value->setTipoAtendimento(3);
        $value->setModalidade(ModalidadeTurma::EJA);
        $this->assertEquals(null, $value->getValue());
    }

    public function testTipoAtendimentoValidoModalidadeValidaEtapaEnsinoInvalidaValueNull()
    {
        $value = $this->getValueObject();
        $value->setTipoAtendimento(3);
        $value->setEtapaEnsino(3);
        $this->assertEquals(null, $value->getValue());
    }

    public function testValueNaoNulo()
    {
        $value = $this->getValueObject();
        $this->assertEquals(1, $value->getValue());

        $value->setTurmaMaisEducacao(0);
        $this->assertEquals(0, $value->getValue());
    }

    /**
     * @return ValueTurmaMaisEducacao
     */
    private function getValueObject()
    {
        $valueObject = new ValueTurmaMaisEducacao();
        $valueObject->setDependenciaAdministrativa(DependenciaAdministrativaEscola::MUNICIPAL);
        $valueObject->setTipoAtendimento(TipoAtendimentoTurma::ATIVIDADE_COMPLEMENTAR);
        $valueObject->setModalidade(1);
        $valueObject->setEtapaEnsino(4);
        $valueObject->setTipoMediacao(TipoMediacaoDidaticoPedagogico::PRESENCIAL);
        $valueObject->setTurmaMaisEducacao(1);

        return $valueObject;
    }
}