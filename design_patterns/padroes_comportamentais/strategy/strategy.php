<?php

/**
 * Strategy - Intenção:
 *
 * Define uma família de algoritmos, encapsula cada algoritmo,
 * e faz com que o mesmo se torne intercambiável.
 *
 * Permite o algoritmo variar independente dos clientes que o utilizam.
 * 
 * Conceito Original:
 * http://imasters.com.br/artigo/17673/php/design_patterns_e_o_desenvolvimento_em_php_strategy/
 */

/**
 *
 * 01 - Algorithm Interface
 *
 * Define uma interface comum para todos os algoritimos suportados.
 *
 */
interface InterfaceStrategyTransporte
{
    public function transportar();
}


/**
 *
 * 02 - Concrete Strategy
 *
 * Implementa o algoritmo usando a interface de Strategy
 *
 */
class Aviao implements InterfaceStrategyTransporte
{

    public function transportar()
    {
        echo "voando nos céus... \n";
    }

}

/**
 *
 * 02 - Concrete Strategy
 * ...
 *
 */
class Carro implements InterfaceStrategyTransporte
{

    public function transportar()
    {
        echo "andando sobre a estrada... \n";
    }

}


/**
 * 03 - Classe abstrata que será extendida pelos Objetos 'Context'
 *
 * Define uma interface comum para todos os algoritimos suportados.
 * 'Context' usa esta interface para chamar o algoritmo definido por uma
 * 'ConcreteStrategy'
 *
 */
abstract class AbstractStrategyTransporte
{

    private $meioTransporte;

    public function setMeioTransporte( InterfaceStrategyTransporte $meioTransporte )
    {
       $this->meioTransporte = $meioTransporte;
    }

    public function transportar()
    {
        $this->meioTransporte->transportar();
    }

}

/**
 * 04 - Context
 *
 * É configurado como um objeto ConcreteStrategy.
 * Mantém uma referência para um objeto Strategy.
 * Pode definir uma interface que permite a Strategy acessar seus dados.
 *
 */
class ContextFusca extends AbstractStrategyTransporte
{

    public function __construct()
    {
        $this->setMeioTransporte( new Carro() );
    }

}

/**
 * 04 - Context
 * ...
 *
 */
class ContextAviao extends AbstractStrategyTransporte
{

    public function __construct()
    {
        $this->setMeioTransporte( new Aviao() );
    }

}


/**
 * Teste de Uso
 */

$fusca	= new ContextFusca();
$fusca->transportar();

$boing	= new ContextAviao();
$boing->transportar();